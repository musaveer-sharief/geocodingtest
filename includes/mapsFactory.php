<?php
namespace includes;
/*
 * Description: This class purpose is to generate the objects for configured maps
 * Author: Sharief
 */

class mapsFactory {
    /**
     * This method retrieves the configured class objects
     * @param string $type classname
     * @return reference mapinterface object type
     */
    function getMapAdapter($type = '') : object {
        $type = 'includes\\maptype\\'.$type;
        return new $type();
    }
}