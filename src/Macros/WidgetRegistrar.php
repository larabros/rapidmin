<?php

namespace Larabros\Rapidmin\Macros;

/**
 * Registers widget components as macros on :php:class:`HtmlBuilder`.
 *
 * @package    Rapidmin
 * @author     Hassan Khan <contact@hassankhan.me>
 * @author     Cai Leao <cainaleao.uk@gmail.com>
 * @link       https://github.com/larabros/rapidmin
 * @license    MIT
 */
class WidgetRegistrar extends AbstractRegistrar
{
    /**
     * {@inheritDoc}
     */
    protected $baseViewPath = 'rapidmin::components.widgets';

    /**
     * {@inheritDoc}
     */
    public function provides()
    {
        return [
            'infobox',
            'statbox',
        ];
    }

    /**
     * Return the data required to create a infobox macro.
     *
     * @return array
     */
    public function infobox()
    {
        return [
            'name'     => 'infobox',
            'callable' => $this->createCallable('boxes.info', [
                'title',
                'value'    => '',
                'icon'     => 'fa fa-envelope-o',
                'modifier' => 'bg-aqua',
            ]),
        ];
    }

    /**
     * Return the data required to create a statbox macro.
     *
     * @return array
     */
    public function statbox()
    {
        return [
            'name'     => 'statbox',
            'callable' => $this->createCallable('boxes.info', [
                'title',
                'value'    => '',
                'icon'     => 'fa fa-shopping-cart',
                'modifier' => 'bg-aqua',
                'footer'   => '',
            ]),
        ];
    }
}
