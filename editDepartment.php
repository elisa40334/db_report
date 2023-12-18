<?php
    $DId = @$_POST['DId'];
    $DName = @$_POST['DName'];
    $DLocation = @$_POST['DLocation'];
    $DPhone = @$_POST['DPhone'];
    $DNet = @$_POST['DNet'];
    $DEmail = @$_POST['DEmail'];
    $DFax = @$_POST['DFax'];
    $UName = @$_POST['UName'];
    
    require_once 'dbconnect.php';
    $URL = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'No referer';
    $parts = explode('=', $URL);
    $part = urldecode($parts[1]);//取網址中的DName
    //print $part;
    //print $DName;
    $sql = "UPDATE department SET DId='$DId', DName='$DName' ,DLocation='$DLocation', DNet='$DNet', DEmail='$DEmail', DFax='$DFax',UName='$UName' WHERE DName='$part'";
    //$sql = "UPDATE employee SET EId='$EId',EName='$EName' ,EPhone='$EPhone', address='$address',position='$position',salary='$salary',DName='$DName' WHERE EName='$part'";
    $result=mysqli_query($link, $sql);
    if($result){echo "成功";}
    else{echo "失敗";}
    //print $r;
    mysqli_close($link);
    header("Refresh:0; unit.php?unit=". urlencode($UName));
?>