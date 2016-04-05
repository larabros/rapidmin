<?php

namespace Larabros\Rapidmin\Macros;

use Closure;
use Illuminate\View\Factory;

/**
 * An abstract registrar class. Extend this for each type of component to
 * register as a macro.
 *
 * @package    Rapidmin
 * @author     Hassan Khan <contact@hassankhan.me>
 * @author     Cai Leao <cainaleao.uk@gmail.com>
 * @link       https://github.com/larabros/rapidmin
 * @license    MIT
 */
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
     * Provides an array of all macros to be registered.
     * 
     * @return array
     */
    abstract public function provides();

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
        $defaults   = $this->normalizeSignature($signature);

        return function() use ($factory, $basePath, $view, $defaults) {
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

    /**
     * Normalizes a macro's signature such that parameter names are keys and
     * any defaults are set as values.
     *
     * @param array $signature
     *
     * @return array
     */
    protected function normalizeSignature(array $signature)
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
    }
}
