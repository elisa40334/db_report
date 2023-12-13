<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <title>單位</title>
    <link rel="stylesheet" href="unit.css">
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
        <div class="logo">
            <img src="resource/logo.png" alt="海大logo" width="75%">
        </div>
        <!--hover會跑掉算了css真的好難QQ-->
        <div class="dropdown">
            <button class="btn hamburger" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                style="background: url('resource/ham.png') no-repeat center center; background-size: contain; height: 35px; width: 35px;"></button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modifyModal">編輯</button></li>
                <!-- <li><a class="dropdown-item" href="index.php?unit="> </a></li> -->
                <?php
                $URL = $_SERVER['REQUEST_URI'];
                $parts = explode('?', $URL);
                $parts = explode('=', $parts[1]);
                $part = urldecode($parts[1]);

                echo "<a class='dropdown-item' class='link' href='index.php?unit=" . $part . "'>刪除</a>";
                ?>
            </ul>
        </div>

    </header>

    <main>


        <!--抓單位名字放最上面-->
        <?php
            $URL = $_SERVER['REQUEST_URI'];
            $parts = explode('?', $URL);
            $parts = explode('=', $parts[1]);
            $part = urldecode($parts[1]);

            echo "<div id='unit-name' style='font-size: 100px;'>".$part."</div>";
        ?>
        <div id="unit-name"></div>

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
                echo "<br><div id='unit-result' class='row mt-3'><a class='dropdown-item' href='department.php?department=" . $row["DName"] . "'>" . $row["DName"] . " 地點: " . $row["DLocation"] . " " . " 電話: " . $row["DPhone"] . "</a><br>";
            }
        } else {
            echo "<br><div id='unit-result' class='row mt-3 dropdown-item'>暫無資料<br>";
        }
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
                            <form id="unit-form">
                                <div class="mb-3">
                                    <label for="UId" class="form-label">單位ID：</label>
                                    <input type="text" class="form-control" id="UId" name="UId">
                                </div>
                                <div class="mb-3">
                                    <label for="UName" class="form-label">單位名稱：</label>
                                    <input type="text" class="form-control" id="UName" name="UName">
                                </div>
                                <div class="mb-3">
                                    <label for="Category" class="form-label">單位種類：</label>
                                    <input type="text" class="form-control" id="Category" name="Category">
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
    </main>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
    <!--引用bootstrap-->
</body>

</html>