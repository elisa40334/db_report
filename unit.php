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
    <title>單位</title>
    <link rel="stylesheet" href="unit.css">
    <link rel="stylesheet" href="unit.js">
</head>

<body>
    <header>
        <div class="logo">
            <img src="resource/logo.png" alt="海大logo" width="75%">
        </div>
        <!--hover會跑掉算了css真的好難QQ-->
        <div class="dropdown">
            <button class="btn hamburger" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                style="background: url('resource/ham.png') no-repeat center center; background-size: contain; height: 35px; width: 35px;"></button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">編輯</a></li>
                <li><a class="dropdown-item" href="#">刪除</a></li>
            </ul>
        </div>

    </header>

    <main>
        <!--抓單位名字放最上面-->
        <div id="unit-name"></div>
        <!--動態生成card放的區塊-->

        <!-- <div id="unit-result" class="row mt-3">

        </div>
        寫PHP 動態生成card -->

        <?php
            $URL = $_SERVER['REQUEST_URI'];
            $parts = explode('?', $URL);
            $parts = explode('=', $parts[1]);
            $part = urldecode($parts[1]);

            // 載入db.php來連結資料庫
            require_once 'dbconnect.php';
            // 設置一個空陣列來放資料
            $datas = array();
            // sql語法存在變數中
            $sql = "SELECT * FROM department WHERE UName = '$part'";

            // 用mysqli_query方法執行(sql語法)將結果存在變數中
            $result = mysqli_query($link,$sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo  "<br><div id='unit-result' class='row mt-3'><a class='dropdown-item' href='department.php?department=" . $row["DName"] . "'>". $row["DName"]." 地點: ". $row["DLocation"]. " " . " 電話: " . $row["DPhone"] . "</a><br>";
                }
            } else {
                echo "暫無資料";
            }
        ?>
    </main>

</body>

</html>