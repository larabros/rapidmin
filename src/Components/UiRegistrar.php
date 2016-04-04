<?php

namespace Larabros\Rapidmin\Components;

class UiRegistrar extends AbstractRegistrar
{

    protected $baseViewPath = 'rapidmin::components.ui';

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

    public function alert()
    {
        $view = $this->viewFactory;
        return [
            'name'     => 'alert',
            'callable' => $this->createCallable(
                'alert', ['title', 'text', 'modifier' => 'alert-danger', 'isDismissable' => true]
            ),
        ];
    }

    public function callout()
    {
        $view = $this->viewFactory;
        return [
            'name'     => 'callout',
            'callable' => $this->createCallable('callout', ['title', 'text', 'modifier']),
        ];
    }

    public function carousel()
    {
        return [
            'name'     => 'carousel',
            'callable' => $this->createCallable('carousel', ['id', 'items' => []]),
        ];
    }

    public function modal()
    {
        return [
            'name'     => 'modal',
            'callable' => $this->createCallable('modal',
                [
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
