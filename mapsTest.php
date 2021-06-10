<?php

require_once('bootstrap.php');

class mapsTest extends PHPUnit\Framework\TestCase
{
  public function testAllMthd()
  {
    $types = Array('googlemap', 'osm');
    $factory = new includes\mapsFactory();
    foreach($types as $type) {
      
    $map = $factory->getMapAdapter($type);
    $this->assertEquals(get_class($map), 'includes\maptype\\' . $type);


    $data = Array(
      Array(
        'param' => json_encode(array(array('lat' => '123.12', 'lon' => '564.78', 'address' => 'hello'))),
        'equals' => Array(Array( 'lat' => 123.12, 'lon' => 564.78))
      ),
      Array(
        'param' => json_encode(array(array('lat' => '22.12', 'lon' => '11.78'))),
        'equals' => Array(Array( 'lat' => 22.12, 'lon' => 11.78))
      )
    );
    foreach($data as $dat)
      $this->assertEquals($map->parseData($dat['param']), $dat['equals'], "\$canonicalize = true", 0.0, 10, true);


    $mp = new includes\maps();
    $data = Array(
      Array(
        'url' => 'http://test.tst.com/query=SEARCHTEXT',
        'address' => 'test',
        'equals' => ''
      ),
      Array(
        'url' => 'http://test.google.in.com/?q=SEARCHTEXT',
        'address' => 'test',
        'equals' => ''
      ),
    );
    foreach($data as $dat)
      $this->assertTrue($mp->retrieveData($map, $dat['url'], $dat['address']) == $dat['equals']);
    
    }
  }
}
?>