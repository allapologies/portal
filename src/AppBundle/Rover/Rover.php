<?php
namespace AppBundle\Rover;
use AppBundle\Core\Settings;

/**
 * Class Rover describes model's behaviour
 *
 */
class Rover{
    function __construct($position, $direction) {
        $this->position = $position;
        $this->direction = $direction;
   }

    /**
     * @var array
     * Current position by X and Y-axis
     */
    public $position;

    /**
     * @var
     * Current direction of Rover. Presented in an one-dimensional array and has two values
     * Values representing direction of the motion vector in 4 ways.
     * North equals to [0, 1];
     * West equals to [-1, 0];
     * South equals to [0, -1];
     * East equal to [1, 0];
     */
    public $direction;


    public $coordinates= [[0, 1],[-1, 0], [0, -1], [1, 0]];


    public $x_edge = [0,5];
    public $y_edge = [0,5];

    /**
     * @param $arr
     * Direction setter
     */
    public function setDirection($arr){
        $this->direction = $arr;
    }

    /**
     * @return mixed
     * Direction getter
     */
    public function getDirection(){
        return $this->direction;
    }

    /**
     * @return mixed
     * Direction getter
     */
    public function getCurrentPosition(){
        return $this->position;
    }

    /**
     * @return mixed
     * Direction getter
     */
    public function setCurrentPosition($position){
        $this->position = $position;
    }

    /**
     * Function's call makes step forward the direction.
     * Step length needs to be set in Settings class.
     */
    public function move(){

        if (in_array($this->direction, $this->coordinates)){

            if ($this->direction[0]<>0){
                if (($this->position[0] + Settings::STEP*$this->direction[0] > $this->x_edge[1]) || 
                    ($this->position[0] + Settings::STEP*$this->direction[0] < $this->x_edge[0])){
                    
                    $this->direction[0]=$this->direction[0]*-1;
                    $this->position[0] = $this->position[0]+ $this->direction[0] * Settings::STEP;
                } else {
                    $this->position[0] = $this->position[0]+ $this->direction[0] * Settings::STEP;
                }
                
            } elseif (($this->position[1] + Settings::STEP*$this->direction[1] > $this->y_edge[1]) || 
                    ($this->position[1] + Settings::STEP*$this->direction[1] < $this->y_edge[0])){

                    $this->direction[1]=$this->direction[1] * -1;
                    $this->position[1] = $this->position[1] + $this->direction[1] * Settings::STEP;
                 } else {
                    $this->position[1] = $this->position[1] + $this->direction[1] * Settings::STEP;
                }
        } else throw new \Exception("Wrong direction", 1);
    }

    /**
     * Function's call pivots the motion vector on 90 degrees counterclockwise
     * inputs and returns an array regarding directions' model described above.
     */
    public function turnLeft(){
        $temp = $this->arraySwap($this->direction);
        if (empty($temp)){
            die('Zero value');
        }

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
        $temp = $this->arraySwap($this->direction);
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
    private function arraySwap($array){
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
        return implode (" ", $this->position) . " $this->direction";
    }
}