<?php
namespace AppBundle\Rover;

class RoverException extends \Exception
{
    public function __construct($message, $code) {
        parent::__construct($message, $code);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message} {$this->getTraceAsString()}\n";
    }

    public function logGeneralReport(){
        $file = dirname(__FILE__).'/../../../app/logs/general_errors.log';
        $error = "Warning! Please inform your system administrator that following error ocured: $this->code, $this->message \n";
        file_put_contents($file, $error, FILE_APPEND | LOCK_EX);
    }

    public function logAdminReport(){
        $file = dirname(__FILE__).'/../../../app/logs/admin_errors.log';
        $error = "Warining, error occured: $this->code, $this->message \n";
        file_put_contents($file, $error, FILE_APPEND | LOCK_EX);
    }
}