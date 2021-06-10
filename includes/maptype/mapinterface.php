<?php
namespace includes\maptype;
/*
 * Description: This interface forces api to write these declared methods
 * Version: 1.0
 * Author: Sharief
 */

interface mapinterface {
    public function fetchData($url, $address);
    
    public function parseData($data);
}