<?php
    $DId = @$_POST['DId'];
    $DName = @$_POST['DName'];
    $DLocation = @$_POST['DLocation'];
    $DPhone = @$_POST['DPhone'];
    $DNet = @$_POST['DNet'];
    $DEmail = @$_POST['DEmail'];
    $DFax = @$_POST['DFax'];
    $UName = @$_POST['UName'];
    // echo "用POST測試將HTML內容傳入PHP:<br>";
    // echo "今天的日期為".$DName;
    // 載入db.php來連結資料庫
    require_once 'dbconnect.php';

    // sql語法存在變數中
    $sql = "INSERT INTO  `department` (`DId`,`DName`, `DLocation`, `DPhone`, `DNet`, `DEmail`, `DFax`, `UName`) VALUE ('$DId','$DName','$DLocation','$DPhone','$DNet','$DEmail','$DFax',(SELECT UName FROM unit WHERE UName = '$UName')) ";

    // 用mysqli_query方法執行(sql語法)將結果存在變數中
    $result = mysqli_query($link,$sql);

    // 如果有異動到資料庫數量(更新資料庫)
    if (mysqli_affected_rows($link)>0) {
    // 如果有一筆以上代表有更新
    // mysqli_insert_id可以抓到第一筆的id
    $new_id= mysqli_insert_id ($link);
    echo "新增成功";
    echo "<script> alert('部門新增成功'); </script>";
    }
    elseif(mysqli_affected_rows($link)==0) {
        echo "無資料新增";
        echo "<script> alert('部門新增失敗'); </script>";
    }
    else {
        echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
        echo "<script> alert('部門新增失敗'); </script>";
    }
    mysqli_close($link); 

    header("Refresh:0; index.php");
 ?>