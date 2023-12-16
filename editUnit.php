<?php
    $UId = @$_POST['UId'];
    $UName = @$_POST['UName'];
    $category = @$_POST['category'];

    require_once 'dbconnect.php';
    $URL = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'No referer';
    $parts = explode('=', $URL);
    $part = urldecode($parts[1]);//取網址中的EName
    print $part;
    $sql = "UPDATE department SET UId='$UId',UName='$UName' ,category='$category' WHERE DName='$part'";
    mysqli_query($link, $sql);

    // mysqli_close($link);
    // header("Refresh:0; unit.php?unit=". urlencode($UName));
?>