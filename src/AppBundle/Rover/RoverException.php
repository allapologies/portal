<?php
namespace AppBundle\Rover;

class RoverException extends \Exception
{
    public function __construct($message) {
        parent::__construct($message);
    }

    public function logReport(){
        $file = 'errors.log';
        $error = "Error: $this->message \n";
        file_put_contents($file, $error);
    }
}