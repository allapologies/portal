<?php
namespace AppBundle\Gallery;
use AppBundle\Core\Settings;

class Tools
{

    /**
     * @param $key
     * @param $number
     * @return string
     */

    public static function createUrlRecent($key, $number){

        $data = [
            'method' => 'flickr.photos.getRecent',
            'api_key' => $key,
            'per_page' => $number,
            'format'=> Settings::FORMAT,
            'nojsoncallback'=>Settings::JSONP
        ];
        return Settings::URL.http_build_query($data);
    }

    /**
     * @param $key
     * @param $id
     * @return string
     */

    public static function createUrlInfo($key, $id){

        $data = [
            'method' => 'flickr.photos.getSizes',
            'api_key' =>$key,
            'photo_id' =>$id,
            'format'=> Settings::FORMAT,
            'nojsoncallback'=>Settings::JSONP
        ];
        return Settings::URL.http_build_query($data);
    }

    /** method searches for specified property name into
     * an array of objects and returns its value
     * @param $str
     * @param $arr
     * @param $property
     * @return null
     */
    public static function searchStr($str, $arr, $property) {

        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i]->$property == $str)
                return $arr[$i]->source;
        }
        return null;
    }
}