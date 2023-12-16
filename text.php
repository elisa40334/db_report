<?php
    $search = @$_POST['searchName'];
    $type = @$_POST['radioButtonClass'];
    $salaryType = @$_POST['salaryType'];

    if ($type == 0) {
        header("Refresh:0; search.php?unit=". $search);
    }
    else if ($type == 1) {
        header("Refresh:0; search1.php?unit=". $search);
    }
    else{
        echo $salaryType;
        header("Refresh:0; search2.php?unit=". $salaryType);
    }
 ?>