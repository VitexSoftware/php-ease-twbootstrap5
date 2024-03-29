<?php

namespace Test\Ease\TWB5;

use \Ease\TWB5\Alert;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-01-17 at 23:59:35.
 *
 * @link https://getbootstrap.com/docs/5.0/components/alerts/ Bootstrap5 Widget
 *
 */
class AlertTest extends \Test\Ease\Html\DivTagTest
{
    /**
     * @var Alert
     */
    protected $object;
    public $rendered = '<div role="alert" class="alert alert-success"></div>';

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new \Ease\TWB5\Alert('success');
    }

    /**
     * 
     */
    public function testConstructor()
    {
        $classname = get_class($this->object);

        // Get mock, without the constructor being called
        $mock = $this->getMockBuilder($classname)
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();
        $mock->__construct('success','');
        $this->assertEquals($this->rendered, $mock->getRendered());

        $mock->__construct('danger', 'content');
        $mock->__construct('PairTag', 'test',
            ['title' => 'Pokus', 'id' => 'testing']);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {

    }
}