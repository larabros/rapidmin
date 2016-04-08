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
     *
     * @return string
     */
    public function open(array $options = [])
    {
        $options = $this->mergeDefaults($options, 'role', 'form');

        return parent::open($options);
    }

    /**
     * Create a form input field.
     *
     * @param  string  $type
     * @param  string  $name
     * @param  string  $value
     * @param  array   $options
     *
     * @return string
     */
    public function input($type, $name, $value = null, $options = [])
    {

        $options = $this->mergeDefaults($options);
        return parent::input($type, $name, $value, $options);
    }

    /**
     * Create a textarea input field.
     *
     * @param  string  $name
     * @param  string  $value
     * @param  array   $options
     *
     * @return string
     */
    public function textarea($name, $value = null, $options = [])
    {
        $options = $this->mergeDefaults($options);

        return parent::textarea($name, $value, $options);
    }

    /**
     * Create a select box field.
     *
     * @param  string  $name
     * @param  array   $list
     * @param  string  $selected
     * @param  array   $options
     *
     * @return string
     */
    public function select($name, $list = [], $selected = null, $options = [])
    {
        $options = $this->mergeDefaults($options);

        return parent::select($name, $list, $selected, $options);
    }

    /**
     * Create a button element.
     *
     * @param  string  $value
     * @param  array   $options
     *
     * @return string
     */
    public function button($value = null, $options = [])
    {
        $options = $this->mergeDefaults($options, 'class', 'btn');

        if (!str_contains($options['class'], 'btn-')) {
            $options['class'] .= ' btn-primary';
        }

        return parent::button($value, $options);
    }

    /**
     * Convenience method for adding custom default attributes to an element.
     *
     * @param array $options
     * @param string $attribute
     * @param string $value
     *
     * @return array
     */
    private function mergeDefaults(array $options, $attribute = 'class', $value = 'form-control')
    {
        $options[$attribute] = trim((array_key_exists($attribute, $options)
                ? $options[$attribute]
                : '').' '.$value);

        return $options;
    }
}
