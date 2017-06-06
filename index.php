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
        $categoryColumn = $data[25];
        $pattern = '/Category Name:/i';
        $result = preg_match_all($pattern, $categoryColumn, $matches, PREG_OFFSET_CAPTURE);
        $category = '';
        for($i=0;$i<$result;$i++) {
            $tempPosition= $matches[0][$i][1];
            $commapos = strpos($categoryColumn,',',$tempPosition+14);
            $category .= substr($categoryColumn,$tempPosition+14,$commapos-$tempPosition-14)."|" ;
        }
        $data[25] = $category;
$imgColumn = $data[26];
$pattern = '/Product Image URL:/i';

$result = preg_match_all($pattern, $imgColumn, $matches, PREG_OFFSET_CAPTURE);

$res = '';
for($i=0;$i<$result;$i++) {
$tempPosition= $matches[0][$i][1];
 $commapos = strpos($imgColumn,',',$tempPosition+18);
 if($commapos>1) {
$res .= substr($imgColumn,$tempPosition+18,$commapos-$tempPosition-18)."|" ;
} else {
    $res .= substr($imgColumn,$tempPosition+18) ;
}
}
$data[26] = $res; 

        fputcsv($fp, $data);

    }
}

fclose($fp);
?>