<?php

namespace Larabros\Rapidmin;

use Collective\Html\HtmlBuilder as BaseHtmlBuilder;
use Illuminate\Support\Traits\Macroable;

class HtmlBuilder extends BaseHtmlBuilder
{
    use Macroable, Componentable {
        Macroable::__call as macroCall;
        Componentable::__call as componentCall;
    }

    /**
     * Dynamically handle calls to the class.
     *
     * @param  string $method
     * @param  array  $parameters
     *
     * @return \Illuminate\Contracts\View\View|mixed
     *
     * @throws \BadMethodCallException
     */
    public function __call($method, $parameters)
    {
        try {
            return $this->componentCall($method, $parameters);
        } catch (BadMethodCallException $e) {
            //
        }

        try {
            return $this->macroCall($method, $parameters);
        } catch (BadMethodCallException $e) {
            //
        }

        throw new BadMethodCallException("Method {$method} does not exist.");
    }
}
