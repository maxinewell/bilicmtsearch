<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>bilibili comment search</title>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.3.js"></script>
    <script src="2233.js"></script>
</head>
<body>
    <?php
    $aid = $_POST["aid"];
    $cmt = $_POST["comment"];
    $url = 'http://www.bilibilijj.com/Api/AvToCid/'.$aid;
    $obj = json_decode(file_get_contents( $url));
    $cid = 'http://comment.bilibili.com/'.$obj->list[0]->CID.'.xml';
    echo "<p class='cid'>".$cid."</p>";
    echo "<p class='cmt'>".$cmt."</p>";
    ?>
    <script>
        get();
    </script>
    <?php
    $ck = $_COOKIE['decmid'];
    $res = explode(",",$ck);
    array_pop($res);
    foreach($res as $str) {
        $mid = 0;
        $result = "";
        while ($result !== $str) {
            $mid++;
            $result = hash('crc32b', (string)$mid);
        }
        echo "<p><a href='http://space.bilibili.com/".$mid."'>".$mid."</a></p>";
    }
    ?>

</body>
</html>
