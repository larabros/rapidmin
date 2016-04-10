<?php

namespace Larabros\Rapidmin\Macros;

use InvalidArgumentException;

/**
 * Registers chart components as macros on :php:class:`HtmlBuilder`.
 *
 * @package    Rapidmin
 * @author     Hassan Khan <contact@hassankhan.me>
 * @author     Cai Leao <cainaleao.uk@gmail.com>
 * @link       https://github.com/larabros/rapidmin
 * @license    MIT
 */
class ChartRegistrar extends AbstractRegistrar
{
    /**
     * {@inheritDoc}
     */
    protected $baseViewPath = 'rapidmin::components.charts';

    /**
     * {@inheritDoc}
     */
    public function provides()
    {
        return [
            'chart',
        ];
    }

    /**
     * Return the data required to create a chart macro.
     *
     * @return array
     */
    public function chart()
    {
        return [
            'chart',
            $this->createCallable(
                [$this, 'checkType'],
                [
                    'type',
                    'id',
                    'data',
                    'options',
                    'library'  => 'chartjs',
                    'modifier' => '',
                ]
            ),
        ];
    }

    /**
     * Checks if a valid chart type was provided.
     *
     * @param array $parameters
     *
     * @return string
     *
     * @throws \Exception
     */
    public function checkType(array $parameters)
    {
        if (!array_key_exists('type', $parameters)) {
            throw new InvalidArgumentException('No type was specified');
        }

        return $parameters['library'];
    }
}
