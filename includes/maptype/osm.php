<?php
namespace includes\maptype;
/*
 * Description: This class purpose is to handle all actions related to Open street map API
 * Version: 1.0
 * Author: Sharief
 */

class osm extends mapAbstract implements mapinterface{
    /**
     * This method parses the data according to the current API response
     * @param json $data response of the api
     * @return array
     */
    public function parseData($data) : array {
        $data = json_decode($data);
        $formData = array();
        foreach($data as $dat) {
            $temp['lat'] = $dat->lat;
            $temp['lon'] = $dat->lon;
            $formData[] = $temp;
        }
        return $formData;
    }
}