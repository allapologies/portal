<?php
namespace AppBundle\Gallery;
use AppBundle\Core\Settings;

class FlickrException extends \Exception{

    public function __construct($message, $code = 555) {
        parent::__construct($message, $code);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message} {$this->getTraceAsString()}\n";
    }

    public function throwMessage(){
        echo "Code number" . $this->code;
    }

    public function logReport(){
        $file = 'application/logs/errors.log';
        $error = "Error code: $this->code, $this->message \n";
        file_put_contents($file, $error, FILE_APPEND | LOCK_EX);
    }
}
