<?php
namespace includes;
/*
 * Description: This class purpose is to get all declared models as objects and provides the search result
 * Author: Sharief
 */

class maps extends mapsFactory{
    private $conf;
    function __construct() {
        $this->conf = parse_ini_file('config/mapsapi.ini', true);
    }

    /**
     * This method searches the user given address
     * @param string $address The useaddress to be searched
     * @return jsonformat
     */
    function searchAddress($address = '') : string {
        $address = $_POST['address'] ?? null;
        $result = array();
        if ($address) {
            $factory = new mapsFactory();
            foreach($this->conf as $conf) {
                $map = $factory->getMapAdapter($conf['name']);
                $data = $this->retrieveData($map, $conf['url'], $address);
                $result[$conf['title']] = $map->parseData($data);
            }
        }
        return json_encode($result);
    }

    /**
     * This method loads the homepage
     * @param reference $map mapinterface object type
     * @param string $url URL to search for
     * @param string $address value to be searched
     * @return json
     */
    function retrieveData(maptype\mapinterface $map, $url, $address) : string {
        return $map->fetchData($url, $address);
    }
}

?>
