<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <title>單位</title>
    <link rel="stylesheet" href="unit.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@200&display=swap" rel="stylesheet">
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
            $sql = "DELETE FROM department WHERE `department`.`DName` = '$part'";
            $result = mysqli_query($link, $sql);
            mysqli_close($link);
            header("Refresh:0; index.php");
        }
        ?>
        <div>
            <?php
            $URL = $_SERVER['REQUEST_URI'];
            $parts = explode('?', $URL);
            $parts = explode('=', $parts[1]);
            $part = urldecode($parts[1]);

            echo "<div id='unit-name' style=' font-style:italic; font-size: 40px; color: white;'>" . $part . "</div>";
            ?>
        </div>
        <!--hover會跑掉算了css真的好難QQ-->
        <?php
        session_start(); // Start the session if it's not started already
        
        // Check if the user is logged in
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            // If logged in, display the delete button
            $URL = $_SERVER['REQUEST_URI'];
            $parts = explode('?', $URL);
            $parts = explode('=', $parts[1]);
            $part = urldecode($parts[1]);

            echo "<div class='dropdown'>
                <button class='btn hamburger' type='button' data-bs-toggle='dropdown' aria-expanded='false'
                    style='background: url(\"resource/ham.png\") no-repeat center center; background-size: contain; height: 35px; width: 35px;'></button>
                <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
                    <li><button class='dropdown-item' data-bs-toggle='modal' data-bs-target='#modifyModal'>編輯</button></li>
                    <li><a class='dropdown-item link' href='index.php?unit=" . $part . "'>刪除</a></li>
                </ul>
            </div>";
        }
        ?>


    </header>

    <main>
    </main>

    <!--抓單位名字放最上面-->


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
    $result = mysqli_query($link, $sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<br><div id='unit-result'><a href='department.php?department=" . $row["DName"] . "' class='remove_line'>" . $row["DName"] . " 地點: " . $row["DLocation"] . " " . " 電話: " . $row["DPhone"] . "</a><br>";
        }
    } else {
        echo "<br><div id='non-unit-result'>暫無資料<br>";
    }

    $reference = $_SERVER['REQUEST_URI'];
    $parts = explode('=', $reference);
    $part = urldecode($parts[1]); //取網址中的UName
    
    $query = "SELECT * FROM unit WHERE UName = '$part'";

    $result = mysqli_query($link, $query);
    global $data;
    $data = $result->fetch_assoc();
    ?>

    <!-- 懸浮視窗 -->
    <div class="modal fade" id="modifyModal" tabindex="-1" aria-labelledby="modifyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modifyModalLabel">單位資料編輯</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-container mt-3">
                        <form id="unit-form" action="editUnit.php" method="POST">
                            <div class="mb-3">
                                <label for="UId" class="form-label">單位ID：</label>
                                <input type="text" class="form-control" id="UId" name="UId"
                                    value='<?php echo $data['UId'] ?>' />
                            </div>
                            <div class="mb-3">
                                <label for="UName" class="form-label">單位名稱：</label>
                                <input type="text" class="form-control" id="UName" name="UName"
                                    value='<?php echo $data['UName'] ?>' />
                            </div>
                            <div class="mb-3">
                                <label for="Category" class="form-label">單位種類：</label>
                                <input type="text" class="form-control" id="Category" name="Category"
                                    value='<?php echo $data['Category'] ?>' />
                            </div>
                            <div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                                <button type="submit" class="btn btn-primary">確認更新</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <link href="https://fonts.googleapis.com/earlyaccess/cwtexfangsong.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
    <!--引用bootstrap-->
</body>

</html>