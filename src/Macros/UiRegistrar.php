<?php

namespace Larabros\Rapidmin\Macros;

/**
 * Registers UI components as macros on :php:class:`HtmlBuilder`.
 *
 * @package    Rapidmin
 * @author     Hassan Khan <contact@hassankhan.me>
 * @author     Cai Leao <cainaleao.uk@gmail.com>
 * @link       https://github.com/larabros/rapidmin
 * @license    MIT
 */
class UiRegistrar extends AbstractRegistrar
{

    /**
     * {@inheritDoc}
     */
    protected $baseViewPath = 'rapidmin::components.ui';

    /**
     * {@inheritDoc}
     */
    public function provides()
    {
        return [
            'alert',
            'callout',
            'carousel',
            'modal',
            'pagination',
            'progress',
            'tabs',
            'timeline',
        ];
    }

    /**
     * Return the data required to create an alert macro.
     *
     * @return array
     */
    public function alert()
    {
        return [
            'name'     => 'alert',
            'callable' => $this->createCallable('alert',
                [
                    'title',
                    'text',
                    'modifier' => 'alert-danger',
                    'isDismissable' => true
                ]
            ),
        ];
    }

    /**
     * Return the data required to create an callout macro.
     *
     * @return array
     */
    public function callout()
    {
        return [
            'name'     => 'callout',
            'callable' => $this->createCallable('callout',
                [
                    'title',
                    'text',
                    'modifier' => 'alert-info'
                ]
            ),
        ];
    }

    /**
     * Return the data required to create an carousel macro.
     *
     * @return array
     */
    public function carousel()
    {
        return [
            'name'     => 'carousel',
            'callable' => $this->createCallable('carousel',
                [
                    'id',
                    'items' => []
                ]
            ),
        ];
    }

    /**
     * Return the data required to create an modal macro.
     *
     * @return array
     */
    public function modal()
    {
        return [
            'name'     => 'modal',
            'callable' => $this->createCallable('modal',
                [
                    'id',
                    'title',
                    'text',
                    'modifier',
                    'save'  => false,
                    'close' => [
                        'label'    => 'Close',
                        'modifier' => 'btn-default pull-left',

                    ],
                ]
            ),
        ];
    }

    public function pagination()
    {
        return [
            'name'      => 'pagination',
            'template'  => 'components.ui.pagination',
            'signature' => ['title', 'text', 'modifier', 'save' => false, 'close' => true,],
        ];
    }

    public function progress()
    {
        return [
            'name'      => 'progress',
            'template'  => 'components.ui.progress',
            'signature' => ['current', 'min' => 0, 'max' => 100, 'isVertical' => false, 'isStriped' => false, 'sizeModifier' => '', 'modifier' => 'progress-bar-primary'],
        ];
    }

    public function tabs()
    {
        return [
            'name'      => 'tabs',
            'template'  => 'components.ui.tabs',
            'signature' => ['tabs' => [], 'tabModifiers' => ''],
        ];
    }

    public function timeline()
    {
        return [
            'name'      => 'timeline',
            'template'  => 'components.ui.timeline',
            'signature' => ['items' => []],
        ];
    }
}
