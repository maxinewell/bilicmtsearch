<?php
$aid = $_POST["aid"];
$url = 'http://www.bilibilijj.com/Api/AvToCid/'.$aid;
$obj = json_decode(file_get_contents( $url));
$cid = 'http://comment.bilibili.com/'.$obj->list[0]->CID.'.xml';
echo $cid;
?>