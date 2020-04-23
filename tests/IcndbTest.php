<?php

namespace Codeat3\Icndb\Tests;

use Codeat3\Icndb\Exceptions\ChainNotAllowedException;
use Codeat3\Icndb\Icndb;
use LogicException;
use PHPUnit\Framework\TestCase;

class IcndbTest extends TestCase
{
    public function setUp()
    {
        $this->wrapper = new Icndb();
    }

    /** @test */
    public function if_custom_config_can_set()
    {
        $config = array(
            'firstName' => 'John',
            'lastName' => 'Doe'
        );

        $wrapper = new Icndb($config);

        $this->assertAttributeEquals($config, 'config', $wrapper);
    }

    /** @test */
    public function if_sets_correct_uri_for_categories()
    {
        $this->wrapper->categories();
        $this->assertAttributeEquals('categories', 'uri', $this->wrapper);
    }

    /** @test */
    public function if_sets_correct_uri_for_random_joke()
    {
        $this->wrapper->random();
        $this->assertAttributeEquals('jokes/random/1', 'uri', $this->wrapper);

        $this->wrapper->random(2);
        $this->assertAttributeEquals('jokes/random/2', 'uri', $this->wrapper);
    }

    /** @test */
    public function if_sets_correct_uri_for_specific_joke()
    {
        $this->wrapper->specific(10);
        $this->assertAttributeEquals('jokes/10', 'uri', $this->wrapper);
    }

    /** @test */
    public function checks_specific_and_random_cannot_be_chained()
    {
        $this->expectException(ChainNotAllowedException::class);
        // You can't get a random, and a specific joke all at the same time
        $this->wrapper->random()->specific(1)->get();
    }

    /** @test */
    public function should_not_chain_jokes_and_categories()
    {
        $this->expectException(ChainNotAllowedException::class);
        // You can't get a random, and a specific joke all at the same time
        $this->wrapper->specific(1)->categories()->get();
    }

    /** @test */
    // public function testFirstMethod()
    // {
    //     $item = array(
    //         'id' => 1,
    //         'joke' => 'foo',
    //         'categories' => array()
    //     );

    //     $mock = $this->getMockClass('Icndb', array('get'));
    //     $mock->expects($this->once())
    //         ->method('get')
    //         ->will($this->returnValue(array($item)));

    //     $this->assertEquals($item, $mock->random()->first());
    // }
}
