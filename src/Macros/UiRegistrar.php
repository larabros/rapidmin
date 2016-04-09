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
//            'pagination',
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
            'alert',
            $this->createCallable('alert', [
                'title',
                'text',
                'modifier' => 'alert-danger',
                'isDismissable' => true
            ]),
        ];
    }

    /**
     * Return the data required to create a callout macro.
     *
     * @return array
     */
    public function callout()
    {
        return [
            'callout',
            $this->createCallable('callout', [
                'title',
                'text',
                'modifier' => 'alert-info'
            ]),
        ];
    }

    /**
     * Return the data required to create a carousel macro.
     *
     * @return array
     */
    public function carousel()
    {
        return [
            'carousel',
            $this->createCallable('carousel', [
                'id',
                'items' => []
            ]),
        ];
    }

    /**
     * Return the data required to create a modal macro.
     *
     * @return array
     */
    public function modal()
    {
        return [
            'modal',
            $this->createCallable('modal', [
                'id',
                'title',
                'text',
                'modifier',
                'save'  => false,
                'close' => [
                    'label'    => 'Close',
                    'modifier' => 'btn-default pull-left',

                ],
            ]),
        ];
    }

    /**
     * Return the data required to create a pagination macro.
     *
     * @return array
     */
    public function pagination()
    {
//        return [
//            'naame'      => 'pagination',
//            'template'  => 'components.ui.pagination',
//            'signature' => ['title', 'text', 'modifier', 'save' => false, 'close' => true,],
//        ];
    }

    /**
     * Return the data required to create a progress bar macro.
     *
     * @return array
     */
    public function progress()
    {
        return [
            'progress',
            $this->createCallable('progress', [
                'current',
                'min'         => 0,
                'max'         => 100,
                'isStriped'   => false,
                'isVertical'  => false,
                'modifier'    => '',
                'barModifier' => 'progress-bar-primary',
            ]),
        ];
    }

    /**
     * Return the data required to create a tabs macro.
     *
     * @return array
     */
    public function tabs()
    {
        return [
            'tabs',
            $this->createCallable('tabs', [
                'tabs'     => [],
                'modifier' => '',
            ]),
        ];
    }

    /**
     * Return the data required to create a timeline macro.
     *
     * @return array
     */
    public function timeline()
    {
        return [
            'timeline',
            $this->createCallable('timeline', [
                'items' => [],
            ]),
        ];
    }
}
