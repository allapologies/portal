<?php

namespace AppBundle\Rover;

class RoverTurnsTest extends \PHPUnit_Framework_TestCase
{
	/**
     * Verifiyng move
     * @dataProvider moveProvider
     */
	public function testMove($dir, $posCurrent, $posNew){
		
		$testRover = new Rover;
		$testRover->setDirection($dir);
	    $testRover->setCurrentPosition($x,$y);
		$testRover->move();

		$this->assertEquals(
			$pos, $testRover->getCurrentPosition()
		);
	}

	public function moveProvider()
    {
        return [
            'north' => [[0, 1], [-1, 0],  ],
            'west'  => [[-1, 0], [0,-1]],
            'south' => [[0, -1], [1, 0]],
            'east'  => [[1, 0], [0,1]]
        ];
    }
}

//    public function testProperCount(){
//        $testRover = new Rover;
//        $testRover->x_pos= 1;
//        $testRover->y_pos= 2;
//        $testRover->direction= "N";
//
//        $steps=['L','M','L','M','L','M','L','M','M'];
//
//        foreach ($steps as $step) {
//            switch ($step) {
//                case "L": $testRover->turnLeft(); break;
//                case "R": $testRover->turnRight(); break;
//                case "M": $testRover->move(); break;
//            }
//        }
//
//        $this->assertEquals(1, $testRover->x_pos);
//        $this->assertEquals(3, $testRover->x_pos);
//        $this->assertEquals("N", $testRover->direction);
//    }