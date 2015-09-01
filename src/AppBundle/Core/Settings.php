<?php
namespace AppBundle\Core;

class Settings{
    const URL               = "https://api.flickr.com/services/rest/?";
    const APIKEY            = "b247b4c43ca75d1e2825bd325705e4bd";
    const NUMBER            = 1;
    const FORMAT            = "json";
    const JSONP             = 1;
    const LOG               = "application/logs/errors.log";

    public static $ERRORS   = [
        "1"=>"Photo not found. The photo id passed was not a valid photo id.",
        "2"=>"Permission denied. The calling user does not have permission to view the photo.",
        "100"=>"Invalid API Key. The API key passed was not valid or has expired.",
        "105"=>"Service currently unavailable. The requested service is temporarily unavailable.",
        "106"=>"Write operation failed. The requested operation failed due to a temporary issue.",
        "111"=>"Format 'xxx' not found. The requested response format was not found.",
        "112"=>"Method 'xxx' not found. The requested method was not found.",
        "114"=>"Invalid SOAP envelope. The SOAP envelope send in the request could not be parsed.",
        "115"=>"Invalid XML-RPC Method Call. The XML-RPC request document could not be parsed.",
        "116"=>"Bad URL found. One or more arguments contained a URL that has been used for abuse on Flickr.",
        "555"=>"Unrecognized error"
    ];

    const STEP = 1;
    const Inputfile = "application/input/input.data";

}