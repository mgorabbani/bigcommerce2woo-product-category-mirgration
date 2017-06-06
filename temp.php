<?php
 $str= "Product Image File: IMG_0572__11933.JPG, Product Image URL: http://www.chatto.com/product_images/g/618/IMG_0572__11933.JPG,Product Image File: IMG_0572__11933.JPG, Product Image URL: http://www.chatto.com/product_images/g/618/IMG_0572__11933.JPG,Product Image File: IMG_0572__11933.JPG, Product Image URL: http://www.chatto.com/product_images/g/618/IMG_0572__11933.JPG";
$pattern = '/Product Image URL:/i';
$result = preg_match_all($pattern, $str, $matches, PREG_OFFSET_CAPTURE);

$res = '';
for($i=0;$i<$result;$i++) {
$tempPosition= $matches[0][$i][1];
 $commapos = strpos($str,',',$tempPosition+18);
 if($commapos>1) {
$res .= substr($str,$tempPosition+18,$commapos-$tempPosition-18)."|" ;
} else {
    $res .= substr($str,$tempPosition+18) ;
}
} 

print_r($res."\n\n\n");

   
    // indices.push(res);



?>