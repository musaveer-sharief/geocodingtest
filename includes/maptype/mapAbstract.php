<?php
namespace includes\maptype;
/*
 * Description: This class purpose is to handle common calculation between different maptypes
 * Version: 1.0
 * Author: Sharief
 */

class mapAbstract {
    private $queryVar = 'SEARCHTEXT';

    /**
     * This method retrieves the configured class objects
     * @param string $url url to be searched
     * @param string $address address that need to be added for searching
     * @return string
     */
    function fetchData($url, $address) : string {
        $search_url = str_replace($this->queryVar, urlencode($address), $url);

        $httpOptions = [
            "http" => [
                "method" => "GET",
                "header" => "User-Agent: Nominatim-Test"
            ]
        ];

        set_error_handler(function ($err_severity, $err_msg, $err_file, $err_line, array $err_context)
        {
            return [];
        }, E_WARNING);

        $streamContext = stream_context_create($httpOptions);
        $json = file_get_contents($search_url, false, $streamContext);
        return ($json);

        restore_error_handler();
    }
}