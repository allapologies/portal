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
	    $testRover->setCurrentPosition($posCurrent);
		$testRover->move();

		$this->assertEquals(
			$posNew, $testRover->getCurrentPosition()
		);
	}

	public function moveProvider()
    {
        return [
            'Move North' => [[0, 1], [1, 1], [1, 2]],
            'Move West'  => [[-1, 0], [3, 3], [2, 3]],
            'Move South' => [[0, -1], [4, 3], [4, 2]],
            'Move East'  => [[1, 0], [3,3], [4, 3]],
            'Face with edge x_axis'  => [[1, 0], [3,3], [4, 3]],
            'Face with edge y_axis'  => [[1, 0], [3,3], [4, 3]],
            'Bad direction' => [[1, 1], [1, 1], [1, 2]],
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