<?php
namespace AppBundle\Rover;
use AppBundle\Core\Settings;

/**
 * Class Rover describes model's behaviour
 *
 */
class Rover extends ExploringMachine{
    /**
     * @var int
     * Current position by X-axis
     */
    protected $x_pos;
    /**
     * @var
     * Current position by Y-axis
     */
    protected $y_pos;
    /**
     * @var
     * Current direction of Rover. Presented in an one-dimensional array and has two values
     * Values representing direction of the motion vector in 4 ways.
     * North equals to [0, 1];
     * West equals to [-1, 0];
     * South equals to [0, -1];
     * East equal to [1, 0];
     */
    protected $direction;

    public function __construct($x_pos, $y_pos, $direction){
        parent::__construct($x_pos, $y_pos, $direction);
    }

    /**
     * Function's call makes step forward the direction.
     * Step length needs to be set in Settings class.
     */
    public function move(){

        if ($this->direction[0]<>0){
            $this->x_pos += $this->direction[0] * Settings::STEP;
        } else {
            $this->y_pos += $this->direction[1] * Settings::STEP;
        }
    }

    /**
     * Function's call pivots the motion vector on 90 degrees counterclockwise
     * inputs and returns an array regarding directions' model described above.
     */
    public function turnLeft(){
        $temp = $this->array_swap($this->direction);
        if ($this->direction[0] == 0 && $this->direction[1] == 1) {
            $temp[0] *= -1;
            $this->direction = $temp;
        } elseif ($this->direction[0] == 0 && $this->direction[1] == -1) {
            $temp[0] *= -1;
            $this->direction = $temp;
        } else $this->direction = $temp;
    }

    /**
     * Function's call pivots the motion vector on 90 degrees clockwise
     * inputs and returns an array regarding directions' model described above.
     */
    public function turnRight(){
        $temp = $this->array_swap($this->direction);
        if ($this->direction[0] == -1 && $this->direction[1] == 0) {
            $temp[1] *= -1;
            $this->direction = $temp;
        } elseif ($this->direction[0] == 1 && $this->direction[1] == 0) {
            $temp[1] *= -1;
            $this->direction = $temp;
        } else $this->direction = $temp;
    }

    /**
     * @param $array
     * @return mixed
     * Function swaps array's values
     */
    private function array_swap($array){
        $temp = $array[0];
        $array[0] = $array[1];
        $array[1] = $temp;
        return $array;
    }

    /**
     * Function prints current position and direction
     */
    public function getPosition(){
        switch($this->direction){
            case [0, 1]: $this->direction = "N"; break;
            case [-1, 0]: $this->direction = "W"; break;
            case [0, -1]: $this->direction = "S"; break;
            case [1, 0]: $this->direction = "E"; break;
        }
        return "$this->x_pos $this->y_pos $this->direction";
    }
}