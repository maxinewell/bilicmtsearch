<?php
header("content-Type: text/html; charset=Utf-8");
/*
 * aid -> cid via bilibilijj
 */
$aid = '3033222';
$str = "c30d39aa";
ini_set('allow_url_fopen ','ON');

$url = 'http://www.bilibilijj.com/Api/AvToCid/'.$aid;
$obj = json_decode(file_get_contents( $url));
$cid = 'http://comment.bilibili.com/'.$obj->list[0]->CID.'.xml';
echo "<div id='cid'>".$cid."</div>";

/* get cid -> mid
 */
$result = "";
$mid = 0;
while($result !== $str){
    $mid ++;
    $result = hash('crc32b',(string)$mid);
}
echo "<div id='mid'>".$mid."</div>";