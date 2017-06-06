<?php
$csvfile = 'csvfile.csv';
if (file_exists($csvfile)) {
        unlink($csvfile);
    echo "file  $csvfile exists!"."\n";
} else {
    echo "file $csvfile created"."\n";
}

$row = 0;
$fp = fopen('csvfile.csv', 'w');
if (($handle = fopen("products-2017-06-06.csv", "r")) !== FALSE) {
 while ($data = fgetcsv($handle)) {

$str = $data[25];
     $pattern = '/Category Name:/i';
$result = preg_match_all($pattern, $str, $matches, PREG_OFFSET_CAPTURE);


$res = '';
for($i=0;$i<$result;$i++) {
$tempPosition= $matches[0][$i][1];
 $commapos = strpos($str,',',$tempPosition+14);
$res .= substr($str,$tempPosition+14,$commapos-$tempPosition-14)."|" ;
}

    $data[25] = $res;

    // fputcsv($fp, $data);
    echo $data[25]."\n\n\n\n";

    

}
}

fclose($fp);
?>