<?php
  include 'navbar.php';

  $json = file_get_contents('../projetdofus/json/amulet.json');
  $parsedjson = json_decode($json, true);

  var_dump($parsedjson);

  foreach ($parsedjson as $key => $value) {
    
    echo '<img src="' . $value['imgPath'] .'"/>';

  }
  //$IMGitem = $parsedjson[0]->imgPath;

  // var_dump($nomitem);
  // var_dump($json);
  //echo $IMGitem;
?>
<img src="http://staticns.ankama.com/dofus/www/game/items/200/1230.png"/>