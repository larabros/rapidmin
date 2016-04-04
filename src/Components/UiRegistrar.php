<?php

namespace Larabros\Rapidmin\Components;

class UiRegistrar
{
    public function chart($type, $data)
    {

    }

    public function alert()
    {
        return [
            'name'      => 'alert',
            'template'  => 'components.ui.alert',
            'signature' => ['title', 'text', 'modifier', 'isDismissable' => true],
        ];
    }

    public function callout()
    {
        return [
            'name'      => 'callout',
            'template'  => 'components.ui.callout',
            'signature' => ['title', 'text', 'modifier'],
        ];
    }

    public function carousel()
    {
        return [
            'name'      => 'carousel',
            'template'  => 'components.ui.carousel',
            'signature' => ['id', 'items'],
        ];
    }

    public function modal()
    {
        return [
            'name'      => 'modal',
            'template'  => 'components.ui.modal',
            'signature' => ['title', 'text', 'modifier', 'save' => false, 'close' => true,],
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