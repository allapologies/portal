<?php
namespace AppBundle\Rover;
/**
 * Class Field
 * describes field dimensions taking in account start of field as X:0 Y:0 coordiantes.
 */
class Field{
    public $top_x;
    public $top_y;

    public function __construct($x, $y){
        $this->top_x = $x;
        $this->top_y = $y;
    }
}