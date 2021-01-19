<?php
//DB接続
function dbConnect{
    require_once('./dbConfig.php');
    $link = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    if($link == null){
        die (" 接続に失敗しました：".mysqli_connect_error());
    }
    mysqli_set_charset($link,"utf8");
    
    return $link;
}
//DB切断
function dbDisconnect{
    mysqli_free_result($result);
    mysqli_close($link);
}

