<?php
    $EId = @$_POST['EId'];
    $EName = @$_POST['EName'];
    $EPhone = @$_POST['EPhone'];
    $address = @$_POST['address'];
    $position = @$_POST['position'];
    $salary = @$_POST['salary'];
    $DName = @$_POST['DName'];
    $photo_link=@$_POST['photo_link'];
    
    require_once 'dbconnect.php';
    $URL = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'No referer';
    $parts = explode('=', $URL);
    $part = urldecode($parts[1]);//取網址中的EName

    $sql = "UPDATE employee SET EId='$EId',EName='$EName' ,EPhone='$EPhone', address='$address',position='$position',salary='$salary',DName='$DName',photo_link='$photo_link' WHERE EName='$part'";
    $result=mysqli_query($link, $sql);
    if($result){echo "成功";}

    mysqli_close($link);
    header("Refresh:0; employee.php?employee=". urlencode($EName));
?>