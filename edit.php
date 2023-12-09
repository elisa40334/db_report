<?php
    $EId = @$_POST['EId'];
    $EName = @$_POST['EName'];
    $EPhone = @$_POST['EPhone'];
    $address = @$_POST['address'];
    $position = @$_POST['position'];
    $salary = @$_POST['salary'];
    $DName = @$_POST['DName'];

    require_once 'dbconnect.php';

    if(!empty($EId)){
        $query = "UPDATE 'employee' SET EId = '$Id' WHERE EId = '$EId'";
        $result = mysqli_query($link,$query);
    }
?>