<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Migration\Step;

class MapTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Map\Integrity|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $integrity;

    /**
     * @var Map\Run|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $run;

    /**
     * @var Map\Volume|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $volume;

    /**
     * @var Map
     */
    protected $map;

    public function setUp()
    {
        $this->integrity = $this->getMock('Migration\Step\Map\Integrity', ['perform'], [], '', false);
        $this->run = $this->getMock('Migration\Step\Map\Run', ['perform'], [], '', false);
        $this->volume = $this->getMock('Migration\Step\Map\Volume', ['perform'], [], '', false);
        $this->map = new Map($this->integrity, $this->run, $this->volume);
    }

    public function testIntegrity()
    {
        $this->integrity->expects($this->once())->method('perform');
        $this->map->integrity();
    }

    public function testRun()
    {
        $this->run->expects($this->once())->method('perform');
        $this->map->run();
    }

    public function testVolume()
    {
        $this->volume->expects($this->once())->method('perform');
        $this->map->volumeCheck();
    }
}