<?php

namespace Test\Ease\TWB5;

use Ease\TWB5\Navbar;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2022-12-30 at 18:33:39.
 */
class NavbarTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Navbar
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new Navbar();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {

    }

    /**
     * @covers Ease\TWB5\Navbar::addMenuItem
     * @todo   Implement testaddMenuItem().
     */
    public function testaddMenuItem()
    {
        $this->assertEquals('', $this->object->addMenuItem());
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    /**
     * @covers Ease\TWB5\Navbar::addDropDownMenu
     * @todo   Implement testaddDropDownMenu().
     */
    public function testaddDropDownMenu()
    {
        $this->assertEquals('', $this->object->addDropDownMenu());
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    /**
     * @covers Ease\TWB5\Navbar::navbarCollapse
     * @todo   Implement testnavbarCollapse().
     */
    public function testnavbarCollapse()
    {
        $this->assertEquals('', $this->object->navbarCollapse());
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    /**
     * @covers Ease\TWB5\Navbar::finalize
     * @todo   Implement testfinalize().
     */
    public function testfinalize()
    {
        $this->assertEquals('', $this->object->finalize());
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    /**
     * @covers Ease\TWB5\Navbar::navBarToggler
     * @todo   Implement testnavBarToggler().
     */
    public function testnavBarToggler()
    {
        $this->assertEquals('', $this->object->navBarToggler());
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
}