<?php
    $EId = @$_POST['EId'];
    $EName = @$_POST['EName'];
    $EPhone = @$_POST['EPhone'];
    $address = @$_POST['address'];
    $position = @$_POST['position'];
    $salary = @$_POST['salary'];
    $DName = @$_POST['DName'];
    echo "用POST測試將HTML內容傳入PHP:<br>";
    echo "今天的日期為".$EName;
    echo $EId;
    require_once 'dbconnect.php';

    $URL = $_SERVER['REQUEST_URI'];
    $parts = explode('=', $URL);
    $part = urldecode($parts[1]);//取網址中的EName
    // sql語法存在變數中
    $query = "SELECT *FROM employee WHERE EName = '$part'"; //搜尋*(全部欄位) ，從表employee
    // 用mysqli_query方法執行(sql語法)將結果存在變數中
    $result = mysqli_query($link,$query);

    $query = "UPDATE 'employee' SET EId = '$EId' WHERE EName = '$part'";
    
    $result = mysqli_query($link,$query);
    
?>