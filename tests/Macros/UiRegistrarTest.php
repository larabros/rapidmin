<?php

namespace Larabros\Rapidmin\Tests\Macros;

use Illuminate\View\Factory;
use Larabros\Rapidmin\Macros\UiRegistrar;
use Larabros\Rapidmin\Tests\TestCase;
use Mockery as m;

class UiRegistrarTest extends TestCase
{
    /**
     * @var UiRegistrar
     */
    protected $registrar;

    protected function setUp()
    {
        $viewFactory = m::mock(Factory::class);
        $viewFactory->shouldReceive('make')
            ->zeroOrMoreTimes()
            ->andReturn('<div></div>');
        $this->registrar = new UiRegistrar($viewFactory);
    }

    public function testProvides()
    {
        $this->assertCount(8, $this->registrar->provides());
    }

    public function testAlert()
    {
        $this->assertEquals('alert', $this->registrar->alert()['name']);
    }

    public function testCallout()
    {
        $this->assertEquals('callout', $this->registrar->callout()['name']);
    }
}
