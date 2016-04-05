<?php

namespace Larabros\Rapidmin;

use Collective\Html\FormBuilder as BaseFormBuilder;

/**
 * Provides convenient methods to build HTML forms quickly.
 *
 * @package    Rapidmin
 * @author     Hassan Khan <contact@hassankhan.me>
 * @author     Cai Leao <cainaleao.uk@gmail.com>
 * @link       https://github.com/larabros/rapidmin
 * @license    MIT
 */
class FormBuilder extends BaseFormBuilder
{
    /**
     * Open up a new HTML form.
     *
     * @param  array   $options
     * @return string
     */
    public function open(array $options = array())
    {
        $method = array_get($options, 'method', 'post');

        // We need to extract the proper method from the attributes. If the method is
        // something other than GET or POST we'll use POST since we will spoof the
        // actual method since forms don't support the reserved methods in HTML.
        $attributes['method'] = $this->getMethod($method);

        $attributes['action'] = $this->getAction($options);

        $attributes['accept-charset'] = 'UTF-8';

        // If the method is PUT, PATCH or DELETE we will need to add a spoofer hidden
        // field that will instruct the Symfony request to pretend the method is a
        // different method than it actually is, for convenience from the forms.
        $append = $this->getAppendage($method);

        if (isset($options['files']) && $options['files'])
        {
            $options['enctype'] = 'multipart/form-data';
        }

        // Finally we're ready to create the final form HTML field. We will attribute
        // format the array of attributes. We will also add on the appendage which
        // is used to spoof requests for this PUT, PATCH, etc. methods on forms.
        $attributes = array_merge(

            $attributes, array_except($options, $this->reserved)

        );

        // Finally, we will concatenate all of the attributes into a single string so
        // we can build out the final form open statement. We'll also append on an
        // extra value for the hidden _method field if it's needed for the form.
        $attributes = $this->html->attributes($attributes);

        return '<form'.$attributes.'>'.$append;
    }

    /**
     * Close the current form.
     *
     * @return string
     */
    public function close()
    {
        $this->labels = array();

        $this->model = null;

        return '</form>';
    }

    /**
     * Create a form label element.
     *
     * @param  string  $name
     * @param  string  $value
     * @param  array   $options
     * @return string
     */
    public function label($name, $value = null, $options = array())
    {
        $this->labels[] = $name;

        $options = $this->html->attributes($options);

        $value = e($this->formatLabel($name, $value));

        return '<label for="'.$name.'"'.$options.'>'.$value.'</label>';
    }

    /**
     * Create a form input field.
     *
     * @param  string  $type
     * @param  string  $name
     * @param  string  $value
     * @param  array   $options
     * @return string
     */
    public function input($type, $name, $value = null, $options = [])
    {
        if ( ! isset($options['name'])) $options['name'] = $name;

        // We will get the appropriate value for the given field. We will look for the
        // value in the session for the value in the old input data then we'll look
        // in the model instance if one is set. Otherwise we will just use empty.
        $id = $this->getIdAttribute($name, $options);

        if ( ! in_array($type, $this->skipValueTypes))
        {
            $value = $this->getValueAttribute($name, $value);
        }

        // Once we have the type, value, and ID we can merge them into the rest of the
        // attributes array so we can convert them into their HTML attribute format
        // when creating the HTML element. Then, we will return the entire input.
        $merge = compact('type', 'value', 'id');
        $options = array_merge($options, $merge, ['class' => 'form-control']);
        
        return '<input'.$this->html->attributes($options).'>';
    }

    /**
     * Create a textarea input field.
     *
     * @param  string  $name
     * @param  string  $value
     * @param  array   $options
     * @return string
     */
    public function textarea($name, $value = null, $options = array())
    {
        if ( ! isset($options['name'])) $options['name'] = $name;

        // Next we will look for the rows and cols attributes, as each of these are put
        // on the textarea element definition. If they are not present, we will just
        // assume some sane default values for these attributes for the developer.
        $options = $this->setTextAreaSize($options);

        $options['id'] = $this->getIdAttribute($name, $options);

        $value = (string) $this->getValueAttribute($name, $value);

        unset($options['size']);

        // Next we will convert the attributes into a string form. Also we have removed
        // the size attribute, as it was merely a short-cut for the rows and cols on
        // the element. Then we'll create the final textarea elements HTML for us.
        $options = $this->html->attributes($options);

        return '<textarea'.$options.'>'.e($value).'</textarea>';
    }

    /**
     * Create a select box field.
     *
     * @param  string  $name
     * @param  array   $list
     * @param  string  $selected
     * @param  array   $options
     * @return string
     */
    public function select($name, $list = array(), $selected = null, $options = array())
    {
        // When building a select box the "value" attribute is really the selected one
        // so we will use that when checking the model or session for a value which
        // should provide a convenient method of re-populating the forms on post.
        $selected = $this->getValueAttribute($name, $selected);

        $options['id'] = $this->getIdAttribute($name, $options);

        if ( ! isset($options['name'])) $options['name'] = $name;

        // We will simply loop through the options and build an HTML value for each of
        // them until we have an array of HTML declarations. Then we will join them
        // all together into one single HTML element that can be put on the form.
        $html = array();

        foreach ($list as $value => $display)
        {
            $html[] = $this->getSelectOption($display, $value, $selected);
        }

        // Once we have all of this HTML, we can join this into a single element after
        // formatting the attributes into an HTML "attributes" string, then we will
        // build out a final select statement, which will contain all the values.
        $options = $this->html->attributes($options);

        $list = implode('', $html);

        return "<select{$options}>{$list}</select>";
    }

    /**
     * Create an option group form element.
     *
     * @param  array   $list
     * @param  string  $label
     * @param  string  $selected
     * @return string
     */
    protected function optionGroup($list, $label, $selected)
    {
        $html = array();

        foreach ($list as $value => $display)
        {
            $html[] = $this->option($display, $value, $selected);
        }

        return '<optgroup label="'.e($label).'">'.implode('', $html).'</optgroup>';
    }

    /**
     * Create a select element option.
     *
     * @param  string  $display
     * @param  string  $value
     * @param  string  $selected
     * @return string
     */
    protected function option($display, $value, $selected)
    {
        $selected = $this->getSelectedValue($value, $selected);

        $options = array('value' => e($value), 'selected' => $selected);

        return '<option'.$this->html->attributes($options).'>'.e($display).'</option>';
    }

    /**
     * Create a button element.
     *
     * @param  string  $value
     * @param  array   $options
     * @return string
     */
    public function button($value = null, $options = array())
    {
        if ( ! array_key_exists('type', $options))
        {
            $options['type'] = 'button';
        }

        return '<button'.$this->html->attributes($options).'>'.$value.'</button>';
    }
}
