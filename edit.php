<?php
    $EId = @$_POST['EId'];
    $EName = @$_POST['EName'];
    $EPhone = @$_POST['EPhone'];
    $address = @$_POST['address'];
    $position = @$_POST['position'];
    $salary = @$_POST['salary'];
    $DName = @$_POST['DName'];

    // $clock = $_COOKIE['mycookie'];
    // echo $clock;
    require_once 'dbconnect.php';

    if(!empty($EId)){
        $query = "UPDATE 'employee' SET EId = '$EId' WHERE EId = '$EId'";
        $result = mysqli_query($link,$query);
    }
?>