<?php

namespace AppBundle\Rover;

class RoverTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verifiyng move
     * @dataProvider moveProvider
     */
    public function testMove($pos, $dir, $posNew){
        
        $testRover = new Rover($pos, $dir);
        
        $testRover->move();

        $this->assertEquals(
            $posNew, $testRover->getCurrentPosition()
        );

        return $posNew;
    }

    public function moveProvider()
    {
        return [
            'Move North' => [[1, 1],[0, 1],[1, 2]],
            'Move West'  => [[3, 3],[-1, 0],[2, 3]],
            'Move South' => [[4, 3],[0, -1],[4, 2]],
            'Move East'  => [[3,3],[1, 0],[4, 3]],
            'Face with edge x_axis'  => [[3,3],[1, 0],[4, 3]],
            'Face with edge y_axis'  => [[3,3],[1, 0],[4, 3]],
        ];
    }

    /**
     * Verifiyng left turn
     * @dataProvider turnLeftProvider
     */
    public function testTurnLeft($pos, $dir){
        $testRover = new Rover($pos, $dir);
        $testRover->turnLeft();
        
        $this->assertEquals($pos, $testRover->getDirection());
        
        return $testRover->getDirection();
    }

    public function turnLeftProvider()
    {
        return [
            'north' => [[-1, 0],[0,1]],
            'west'  => [[0,-1],[-1,0,]],
            'south' => [[1, 0],[0,-1]],
            'east'  => [[0,1],[1,0]]
        ];
    }

        /**
     * Verifiyng left turn
     * @dataProvider turnRightProvider
     * @depends testTurnLeft
     */
    public function testTurnRight($pos, $dir){
        $testRover = new Rover($pos, $dir);
        $testRover->turnRight();
        $this->assertEquals($pos, $testRover->getDirection());
        
        return $testRover->getDirection();
    }

    public function turnRightProvider()
    {
        return [
            'north' => [[1, 0],[0,1]],
            'west'  => [[0,1],[-1,0]],
            'south' => [[-1, 0],[0,-1]],
            'east'  => [[0,-1],[1,0]]
        ];
    }

    /**
     * Verifiyng steps
     * @dataProvider testStepsProvider
     */

    public function testSteps($pos, $dir, $steps, $posNew, $dirNew){
        $testRover = new Rover($pos, $dir);

        foreach ($steps as $step) {
            switch ($step) {
                case "L": $testRover->turnLeft(); break;
                case "R": $testRover->turnRight(); break;
                case "M": $testRover->move(); break;
            }
        }

        $this->assertEquals($posNew, $testRover->getCurrentPosition());
        $this->assertEquals($dirNew, $testRover->getDirection());
    }


    public function testStepsProvider(){
        return [
            'first case' => [[3,3], [1,0], ["M","M","R","M","M","R","M","R","R","M"], [5,1], [1,0]],
            'second case' => [[1,2], [0,1], ["L","M","L","M","L","M","L","M","M"], [1,3], [0,1]],
        ];
    }

}