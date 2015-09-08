<?php
namespace AppBundle\Gallery;
use AppBundle\Core\Settings;
use AppBundle\Core\CurlSingletone;
use Symfony\Component\DependencyInjection\Container;

class Flickr{

    /**
     * Define an array of objects for placing images' information
     * @var array
     */
    public $images = [];

    /**
     * Public method retrieves list of recent photos at Flickr
     * and puts them into "$images" array as an objects
     * Loop goes through this array, retrieves additional information for each image
     * and pushes it into corresponding object
     * @param $num
     * @return mixed
     */
    public function loadImages($key, $num){
        $url = Tools::createUrlRecent($key, $num);
        $curl = CurlSingletone::getInstance();
        $curl->open_connection();

        $obj = $curl->requestUrl($url);


        try {
            $obj = $curl->requestUrl($url);
        } catch (FlickrException $e) {
            echo 'New exception: ', $e->getMessage(), ' Error code: ', $e->getCode(), "\n";
            $e->writeMessage();
            exit();
        } catch (\Exception $e) {
            echo 'New exception: ', $e->getMessage(), ' Error code: ', $e->getCode(), "\n";
            exit();
        }

        $images = $obj->photos->photo;

        for ($i = 0;$i<count($images);$i++) {

            if (!$images[$i]->title) {
                $images[$i]->title = "No title provided for this picture";
            }

            $url_sizes = Tools::createUrlInfo(Settings::APIKEY,$images[$i]->id);

            try {
                $extra = $curl->requestUrl($url_sizes);
            } catch (FlickrException $e) {
                echo 'New exception: ', $e->getMessage(), ' Error code: ', $e->getCode(), "\n";
                $e->writeMessage();
                exit();
            }

            $extra = $extra->sizes->size;

            $images[$i]->profile    = preg_replace("/sizes\/.*$/", "", $extra[$i]->url);
            $images[$i]->thumbnail  = Tools::searchStr("Large Square", $extra, "label");
            $images[$i]->url        = Tools::searchStr("Medium", $extra, "label");
        }
        $curl->close_connection();
        return $images;
    }
}

