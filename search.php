<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
    <!--引用bootstrap-->
    <meta charset="UTF-8">
    <title>部門</title>
    <link rel="stylesheet" href="department.css">
</head>

<body>
    <header>
        <?php
        $URL = $_SERVER['REQUEST_URI'];
        if (str_contains($URL, '=!')) {
            $parts = explode('?', $URL);
            $parts = explode('=!', $parts[1]);
            $part = urldecode($parts[1]);
            require_once 'dbconnect.php';
            $datas = array();
            $sql = "DELETE FROM employee WHERE `enployee`.`EId` = '$part'";
            $result = mysqli_query($link,$sql);
            mysqli_close($link); 
            header("Refresh:0; index.php");
        }
        ?>
        <div class="logo">
            <img src="resource/logo.png" alt="海大logo" width="75%">
        </div>
        <!--hover會跑掉算了css真的好難QQ-->
        <div class="dropdown">
            <button class="btn hamburger" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                style="background: url('resource/ham.png') no-repeat center center; background-size: contain; height: 35px; width: 35px;"></button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">編輯</a></li>
                <?php
                    $URL = $_SERVER['REQUEST_URI'];
                    $parts = explode('?', $URL);
                    $parts = explode('=', $parts[1]);
                    $part = urldecode($parts[1]);
                    echo  "<a class='dropdown-item' class='link' href='unit.php?unit=!".$part."'>刪除</a>";
                ?>
            </ul>
        </div>

    </header>

    <main>
        <!--抓單位名字放最上面-->
        <div id="department-name"></div>
        <!--動態生成card放的區塊-->
        <div id="department-result" class="row mt-3"></div>
        <!--寫PHP 動態生成card-->

        <?php
            $URL = $_SERVER['REQUEST_URI'];
            $parts = explode('?', $URL);
            $parts = explode('=', $parts[1]);
            $part = urldecode($parts[1]);
            $part = iconv('UTF-8', 'ISO-8859-1//IGNORE', $part);
            // 載入db.php來連結資料庫
            require_once 'dbconnect.php';
            // 設置一個空陣列來放資料
            $datas = array();
            // echo $part;
            $sql = "SELECT * FROM employee WHERE EName LIKE '%$part%'";
            $result = mysqli_query($link,$sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo  "<br><div id='department-result' class='row mt-3'><a class='dropdown-item' href='employee.php?employee=" . $row["EName"] . "'>". $row["EName"]." 職位: ". $row["position"]. " " . " 電話: " . $row["EPhone"] . "</a><br>";
                }
            } else {
                echo "暫無資料";
            }
        ?>

    </main>

</body>

</html>