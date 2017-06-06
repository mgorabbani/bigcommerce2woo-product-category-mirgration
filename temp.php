<?php
 $str= "Category Name: Chatto Skin Care, Category Path: Chatto Skin Care|Category Name: Moisturizers, Category Path: Moisturizers|Category Name: Facial Creams, Category Path: Facial Creams|Category Name: Skin Treatment, Category Path: Skin Treatment|Category Name: Oily, Category Path: Oily|Category Name: Aging, Category Path: Aging|Category Name: Sensitive, Category Path: Sensitive|Category Name: Combination-Normal, Category Path: Combination-Normal|Category Name: Blemishes, Category Path: Blemishes|Category Name: Wrinkles | Fine Lines, Category Path: Wrinkles | Fine Lines|Category Name: Discoloration, Category Path: Discoloration|Category Name: Sun Protection, Category Path: Sun Protection|Category Name: Skin Care, Category Path: Skin Care|Category Name: Stretch Marks, Category Path: Stretch Marks";
$pattern = '/Category Name:/i';
$result = preg_match_all($pattern, $str, $matches, PREG_OFFSET_CAPTURE);

$res = '';
for($i=0;$i<$result;$i++) {
$tempPosition= $matches[0][$i][1];
 $commapos = strpos($str,',',$tempPosition+14);
$res .= substr($str,$tempPosition+14,$commapos-$tempPosition-14)."|" ;
}

print_r($res."\n\n\n");

   
    // indices.push(res);



?>