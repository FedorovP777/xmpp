<?php

namespace Fabiang\Xmpp\Protocol;

use Fabiang\Xmpp\Event\EventManager;
use Fabiang\Xmpp\Options;
use Fabiang\Xmpp\Connection\Test;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-01-17 at 09:54:58.
 */
class DefaultImplementationTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var DefaultImplementation
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    protected function setUp()
    {
        $this->object = new DefaultImplementation;
    }

    /**
     * Test registering implementation.
     *
     * @covers Fabiang\Xmpp\Protocol\DefaultImplementation::register
     * @covers Fabiang\Xmpp\Protocol\DefaultImplementation::registerListener
     * @return void
     */
    public function testRegister()
    {
        $connection   = new Test;
        $options      = new Options();
        $options->setConnection($connection);
        $this->object->setOptions($options);
        $eventManager = $this->object->getEventManager();

        $this->object->register();

        foreach ($connection->getListeners() as $listener) {
            $this->assertSame($eventManager, $listener->getEventManager());
            $this->assertSame($connection, $listener->getOptions()->getConnection());
        }
    }

    /**
     * Test setting and getting options.
     *
     * @covers Fabiang\Xmpp\Protocol\DefaultImplementation::getOptions
     * @covers Fabiang\Xmpp\Protocol\DefaultImplementation::setOptions
     * @return void
     */
    public function testSetAndGetOptions()
    {
        $options = new Options;
        $this->assertSame($options, $this->object->setOptions($options)->getOptions());
    }

    /**
     * Test setting and getting event manager.
     *
     * @covers Fabiang\Xmpp\Protocol\DefaultImplementation::getEventManager
     * @covers Fabiang\Xmpp\Protocol\DefaultImplementation::setEventManager
     * @return void
     */
    public function testSetAndGetEventManager()
    {
        $this->assertInstanceOf('\Fabiang\Xmpp\Event\EventManager', $this->object->getEventManager());
        $eventManager = new EventManager;
        $this->assertSame($eventManager, $this->object->setEventManager($eventManager)->getEventManager());
    }

}
