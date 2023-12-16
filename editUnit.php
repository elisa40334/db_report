<?php
    $UId = @$_POST['UId'];
    $UName = @$_POST['UName'];
    $Category = @$_POST['Category'];

    require_once 'dbconnect.php';
    $URL = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'No referer';
    $parts = explode('=', $URL);
    $part = urldecode($parts[1]);//取網址中的EName
    // print $Category;
    $sql = "UPDATE unit SET UId='$UId',UName='$UName' ,Category='$Category' WHERE UName='$part'";
    mysqli_query($link, $sql);

    mysqli_close($link);
    header("Refresh:0; index.php");
?>