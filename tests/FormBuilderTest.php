<?php

namespace Larabros\Rapidmin\Tests;

use Illuminate\Routing\UrlGenerator;
use Larabros\Rapidmin\FormBuilder;
use Larabros\Rapidmin\HtmlBuilder;
use Mockery as m;

class FormBuilderTest extends TestCase
{
    /**
     * @var FormBuilder
     */
    protected $builder;

    protected function setUp()
    {
        $htmlMock =  m::mock(HtmlBuilder::class);
        $htmlMock->shouldReceive('attributes')
            ->zeroOrMoreTimes()
            ->passthru();

        $urlMock = m::mock(UrlGenerator::class);
        $urlMock->shouldReceive('to')
            ->zeroOrMoreTimes()
            ->passthru();
        $urlMock->shouldReceive('isValidUrl')
            ->zeroOrMoreTimes()
            ->passthru();
        $this->builder = new FormBuilder($htmlMock, $urlMock, 'csrf');
    }

    public function testOpen()
    {
        //        $expected = '';
//        $actual   = $this->builder->open(['url' => '/']);
//
//        $this->assertEquals($expected, $actual);
    }

    public function testClose()
    {
    }

    public function testInput()
    {
        $expected = '<input class="form-control" name="test" type="text">';
        $actual   = $this->builder->input('text', 'test');

        $this->assertEquals($expected, $actual);
    }

    public function testTextarea()
    {
        $expected = '<textarea class="form-control" name="description" cols="50" rows="10"></textarea>';
        $actual   = $this->builder->textarea('description');

        $this->assertEquals($expected, $actual);
    }

    public function testSelect()
    {
        $expected = '<select class="form-control" name="dropdown">'
            .'<option value="1">One</option>'
            .'<option value="2" selected="selected">Two</option>'
            .'<option value="3">Three</option></select>';
        $actual   = $this->builder->select('dropdown', [1 => 'One', 2 => 'Two', 3 => 'Three'], 2);

        $this->assertEquals($expected, $actual);
    }

    public function testButton()
    {
        $expected = '<button class="btn btn-primary" type="button">Submit</button>';
        $actual   = $this->builder->button('Submit');

        $this->assertEquals($expected, $actual);
    }
}
