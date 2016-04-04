<?php

namespace Larabros\Rapidmin\Components;

class WidgetRegistrar
{
    public function info()
    {
        return [
            'name'      => 'info',
            'template'  => 'components.widgets.boxes.info',
            'signature' => ['title', 'text', 'modifier', 'isDismissable' => true],
        ];
    }
}
