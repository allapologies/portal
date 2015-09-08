<?php
namespace AppBundle\Core;
/**
 * Class CurlSingletone
 */
class CurlSingletone{

    private static $instance = null;

    /**
     * variable, holds a reference to an external resource
     * @var
     */
    private $ch;

    public static function getInstance(){
        if (null === self::$instance)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {}
    private function __clone() {}

    /**
     * Initializing curl and preparing connection
     */
    public function open_connection(){
        $this->ch = curl_init();
    }

    /**
     * Closing connection to resource
     */
    public function close_connection(){
        curl_close($this->ch);
    }

    /**
     * Sends a request to specified url and returns an array of objects as a response
     * @param $str
     * @return mixed
     */
    public function requestUrl($str){
        curl_setopt($this->ch, CURLOPT_URL, $str);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($this->ch);
        $response = json_decode($response);
        if ($response->stat !== "ok"){
             throw new FlickrException(SETTINGS::$ERRORS[$response->code], $response->code);
            }
        return $response;
    }
}