<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>PHP與MySQL建立網頁資料庫</title>
</head>

<body>


    <?php
    $host = 'localhost';
    $dbuser ='root';
    $dbpassword = '';
    $dbname = 'school_db';
    $link = mysqli_connect($host,$dbuser,$dbpassword,$dbname);
    if($link){
        mysqli_query($link,'SET NAMES uff8');
        // echo "正確連接資料庫";
    }
    else {
        echo "不正確連接資料庫</br>" . mysqli_connect_error();
    }
    ?>
</body>

</html>