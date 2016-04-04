<?php

namespace Larabros\Rapidmin\Components;

use Closure;
use Illuminate\View\Factory;

abstract class AbstractRegistrar
{
    /**
     * The base view path to use.
     *
     * @var string
     */
    protected $baseViewPath = 'rapidmin::components';

    /**
     * The instance of :php:class:`Factory` to use.
     *
     * @var Factory
     */
    protected $viewFactory;

    /**
     * Create an instance of :php:class:`AbstractRegistrar`.
     *
     * @param Factory $viewFactory
     */
    public function __construct($viewFactory)
    {
        $this->viewFactory = $viewFactory;
    }

    /**
     * Creates a callable function which renders and returns a blade component.
     *
     * @param string $view
     * @param array $signature
     *
     * @return Closure
     */
    public function createCallable($view, array $signature)
    {
        $factory    = $this->viewFactory;
        $basePath   = $this->baseViewPath;
        $defaults   = $this->parseSignature($signature);

        return function() use ($factory, $basePath, $view, $signature, $defaults) {
            $args       = func_get_args();
            $parameters = [];

            $keys = array_keys($defaults);

            foreach ($args as $index => $item) {
                $parameters[$keys[$index]] = $item;
            }
            
            return $factory->make(
                $basePath.'.'.$view,
                array_merge($defaults, $parameters)
            );
        };
    }

    protected function parseSignature(array $signature)
    {
        $parameters = [];

        foreach ($signature as $index => $item) {
            if (is_numeric($index)) {
                $parameters[$item] = '';
                continue;
            }

            $parameters[$index] = $item;
        }

        return $parameters;
        // Check if signature has default values
    }
}
