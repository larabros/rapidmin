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
class WidgetRegistrar
{
    public function info()
    {
        return [
            'name'      => 'info',
            'template'  => 'components.widgets.boxes.info',
            'signature' => ['title', 'value', 'icon', 'modifier'],
        ];
    }
}
