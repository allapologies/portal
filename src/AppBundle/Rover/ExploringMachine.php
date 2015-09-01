<?php
namespace AppBundle\Rover;
/**
 * Class ExploringMachine
 * describes general model of rover: positioning, direction and possible movements and turns
 */
abstract class ExploringMachine{

    protected $x_pos;
    protected $y_pos;
    protected $direction;

    abstract public function move();
    abstract public function turnLeft();
    abstract public function turnRight();

    public function __construct($x_pos, $y_pos, $direction){
        $this->x_pos = $x_pos;
        $this->y_pos = $y_pos;
        $this->direction = $direction;
    }
};