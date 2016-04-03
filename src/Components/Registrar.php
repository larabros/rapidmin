<?php

namespace Larabros\Rapidmin\Components;

class Registrar
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
}
