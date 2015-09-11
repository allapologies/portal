<?php

namespace AppBundle\Rover;

class RoverTurnsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verifiyng left turn
     * @dataProvider turnLeftProvider
     */
    public function testTurnLeft($x, $y, $pos){
        $testRover = new Rover;
        $testRover->setDirection([$x, $y]);
        $testRover->turnLeft();
        $this->assertEquals($pos, $testRover->getDirection());
        return $testRover->getDirection();
    }

    public function turnLeftProvider()
    {
        return [
            'north' => [0, 1, [-1, 0]],
            'west'  => [-1, 0, [0,-1]],
            'south' => [0, -1, [1, 0]],
            'east'  => [1, 0, [0,1]]
        ];
    }

        /**
     * Verifiyng left turn
     * @dataProvider turnRightProvider
     * @depends testTurnLeft
     */
    public function testTurnRight($x, $y, $pos){
        $testRover = new Rover;
        $testRover->setDirection([$x, $y]);
        $testRover->turnRight();
        $this->assertEquals($pos, $testRover->getDirection());
        return $testRover->getDirection();
    }

    public function turnRightProvider()
    {
        return [
            'north' => [0, 1, [1, 0]],
            'west'  => [-1, 0, [0,1]],
            'south' => [0, -1, [-1, 0]],
            'east'  => [1, 0, [0,-1]]
        ];
    }
}