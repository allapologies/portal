<?php
namespace AppBundle\Rover;

class Parser
{
    
    /**
     * Field dimensions ^\s*(\d+)\s+(\d+)\s*$
     * @param $str
     * @return array
     */
    static function parseField($str){
        preg_match('/^\s*(\d+)\s+(\d+)\s*$/m', $str, $out);
        $out = [$out[1], $out[2]];
        return $out;
    }

    /**
     * @param $str
     * @return array
     * Function searches string for pattern's matches with direction and movements string in input.
     */
    static function parseStart($str){
        preg_match_all('/^\s*(\d+)\s+(\d+)\s*([nesw])\s*([lmr]+)$/im', $str, $out);
        if (!in_array(strtolower($out[3][0]), ['n','e','w','s'])){
            return [$out[1][0], $out[2][0], $out[3][0], $out[4][0]];
        } else {
            throw new RoverException("Error Processing Request");
        }
    }


    /**
     * @param $str
     * @return mixed
     * Function searches for movements instructions (L, M, R equals to left, right and move)
     */
    static function parseMovements($str){
        preg_match_all('/[lmr]/i', $str, $out);
        return $out[0];
    }
}