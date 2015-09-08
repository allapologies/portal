<?php
namespace AppBundle\Core;

class ReadfileSingletone{
    private static $instance = null;

    public static function getInstance(){
        if (null === self::$instance)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {}
    private function __clone() {}

    public function readFile($file){
       return file_get_contents($file);
    }
}