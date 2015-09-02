<?php

namespace AppBundle\Rover;

class RoverTest extends \PHPUnit_Framework_TestCase
{
    public function testProperCount(){
        $testRover = new Rover;

        $testRover->x_pos= 1;
        $testRover->y_pos= 2;
        $testRover->direction= "N";

        $steps=['L','M','L','M','L','M','L','M','M'];

        foreach ($steps as $step) {
            switch ($step) {
                case "L": $testRover->turnLeft(); break;
                case "R": $testRover->turnRight(); break;
                case "M": $testRover->move(); break;
            }
        }

        $this->assertEquals(1, $testRover->x_pos);
        $this->assertEquals(3, $testRover->x_pos);
        $this->assertEquals("N", $testRover->direction);
    }
}
