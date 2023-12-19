<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <title>部門</title>
    <link rel="stylesheet" href="unit.css">
    <link rel="stylesheet" href="department.css">
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
            $sql = "DELETE FROM employee WHERE `enployee`.`EId` = '$part'";
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
            //抓單位名字放最上面/
            echo "<div id='department-name' style='font-style:italic; font-size: 40px; color: white;'>" . $part . "</div>";
            ?>
        </div>

        <!--hover會跑掉算了css真的好難QQ-->
        </div>
        <?php
        session_start(); // 啟動 session，這個步驟可能會在其他地方出現
        
        // 檢查是否已登入，假設您有相應的登入檢查邏輯
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            // 如果已登入，顯示按鈕
            echo '
            <div class="dropdown">
                <button class="btn hamburger" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                    style="background: url(\'resource/ham.png\') no-repeat center center; background-size: contain; height: 35px; width: 35px;"></button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modifyModal">編輯</button></li>
                    <a class="dropdown-item link" href="unit.php?unit=!' . $part . '">刪除</a>
                </ul>
            </div>';
        }
        
        ?>


    </header>

    <main>
    </main>

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
    $sql = "SELECT * FROM employee WHERE DName = '$part'";
    // echo $part;
    
    // 用mysqli_query方法執行(sql語法)將結果存在變數中
    $result = mysqli_query($link, $sql);
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<br><div id='department-result'><a href='employee.php?employee=" . $row["EName"] . "'  class='remove_line'>" . $row["EName"] . " 職位: " . $row["position"] . " " . " 電話: " . $row["EPhone"] . "</a><br>";
            }
        } else {
            echo "<br><div id='department-result' dropdown-item'>暫無資料<br>";
        }
    } else {
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<br><div id='department-result'>" . $row["EName"] . " 職位: " . $row["position"] . " " . " 電話: " . $row["EPhone"] . "<br>";
            }
        } else {
            echo "<br><div id='department-result' dropdown-item'>暫無資料<br>";
        }
    }

    $reference = $_SERVER['REQUEST_URI'];
    $parts = explode('=', $reference);
    $part = urldecode($parts[1]); //取網址中的DName
    $query = "SELECT * FROM department WHERE DName = '$part'";

    $result = mysqli_query($link, $query);
    global $data;
    $data = $result->fetch_assoc();

    ?>

    <!-- 懸浮視窗 -->
    <div class="modal fade" id="modifyModal" tabindex="-1" aria-labelledby="modifyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modifyModalLabel">部門資料編輯</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-container mt-3">
                        <form id="department-form" action="editDepartment.php" method="POST">
                            <div class="mb-3">
                                <label for="DId" class="form-label">部門ID：</label>
                                <input type="text" class="form-control" id="DId" name="DId"
                                    value='<?php if(empty($data['DId'])){echo "暫無資料";}else{echo $data['DId'];}?>'/>
                            </div>
                            <div class="mb-3">
                                <label for="DName" class="form-label">部門名稱：</label>
                                <input type="text" class="form-control" id="DName" name="DName"
                                    value='<?php if(empty($data['DName'])){echo "暫無資料";}else{echo $data['DName'];}?>' />
                            </div>
                            <div class="mb-3">
                                <label for="DLocation" class="form-label">位置：</label>
                                <input type="text" class="form-control" id="DLocation" name="DLocation"
                                    value='<?php if(empty($data['DLocation'])){echo "暫無資料";}else{echo $data['DLocation'];}?>' />
                            </div>
                            <div class="mb-3">
                                <label for="DPhone" class="form-label">電話：</label>
                                <input type="text" class="form-control" id="DPhone" name="DPhone"
                                    value='<?php if(empty($data['DPhone'])){echo "暫無資料";}else{echo $data['DPhone'];}?>' />
                            </div>
                            <div class="mb-3">
                                <label for="DNet" class="form-label">網站：</label>
                                <input type="text" class="form-control" id="DNet" name="DNet"
                                    value='<?php if(empty($data['DNet'])){echo "暫無資料";}else{echo $data['DNet'];}?>' />
                            </div>
                            <div class="mb-3">
                                <label for="DEmail" class="form-label">e-mail：</label>
                                <input type="text" class="form-control" id="DEmail" name="DEmail"
                                    value='<?php if(empty($data['DEmail'])){echo "暫無資料";}else{echo $data['DEmail'];}?>' />
                            </div>
                            <div class="mb-3">
                                <label for="DFax" class="form-label">傳真：</label>
                                <input type="text" class="form-control" id="DFax" name="DFax"
                                    value='<?php if(empty($data['DFax'])){echo "暫無資料";}else{echo $data['DFax'];}?>' />
                            </div>
                            <div class="mb-3">
                                <label for="UName" class="form-label">所屬單位：</label>
                                <input type="text" class="form-control" id="UName" name="UName"
                                    value='<?php if(empty($data['UName'])){echo "暫無資料";}else{echo $data['UName'];}?>' />
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


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
    <!--引用bootstrap-->
</body>

</html>