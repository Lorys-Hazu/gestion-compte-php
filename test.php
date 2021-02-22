<?php

$list = array (
    array('aaa', 'bbb', 'ccc', 'dddd'),
    array('123', '456', '789'),
    array('"aaa"', '"bbb"')
 );
 
 $fp = fopen('test.csv', 'w');
 
 foreach ($list as $fields) {
     fputcsv($fp, $fields,";");
 }
 

$handle = fopen("test.csv", "r");
while (($data = fgetcsv($handle,0,";")) !== FALSE) {

    $tab = implode(";",$data);
    var_dump($tab);
    echo "<br>";
}

?>