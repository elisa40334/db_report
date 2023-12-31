<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <title>查詢結果</title>
    <link rel="stylesheet" href="unit.css">
    <link rel="stylesheet" href="department.css">
</head>

<body>
    <header>
        <div>
            <?php
            $URL = $_SERVER['REQUEST_URI'];
            $parts = explode('?', $URL);
            $parts = explode('=', $parts[1]);
            $part = urldecode($parts[1]);
            $part = iconv('UTF-8', 'ISO-8859-1//IGNORE', $part);
            //抓單位名字放最上面/
            if ($part == 'min') {
                echo "<div id='department-name' style='font-style:italic; font-size: 40px; color: white;'>以下是最低薪資的搜尋結果</div>";
            } else if ($part == "max") {
                echo "<div id='department-name' style='font-style:italic; font-size: 40px; color: white;'>以下是最高薪資的搜尋結果</div>";
            }
            ?>
        </div>

        <!--hover會跑掉算了css真的好難QQ-->

    </header>

    <main>
    </main>
        <!--抓單位名字放最上面-->
        <div id="department-name"></div>

        <?php
        session_start();
        $URL = $_SERVER['REQUEST_URI'];
        $parts = explode('?', $URL);
        $parts = explode('=', $parts[1]);
        $part = urldecode($parts[1]);
        $part = iconv('UTF-8', 'ISO-8859-1//IGNORE', $part);
        // 載入db.php來連結資料庫
        if ($part) {
            require_once 'dbconnect.php';
            // 設置一個空陣列來放資料
            $datas = array();
            if ($part == 'min') {
                $sql = "SELECT * FROM employee WHERE salary = (SELECT MIN(salary) FROM employee);";
            } else if ($part == "max") {
                $sql = "SELECT * FROM employee WHERE salary = (SELECT MAX(salary) FROM employee);";
            }

            $result = mysqli_query($link, $sql);
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<br><div id='unit-result'><a class='remove_line' href='employee.php?employee=" . $row["EName"] . "'>" . $row["EName"] . " 職位: " . ($row["position"] == "" ? "暫無資料" : $row["position"]) . " " . " 電話: " . ($row["EPhone"] == "" ? "暫無資料" : $row["EPhone"]) . "</a></div>";
                    }
                } else {
                    echo "<br><div id='unit-result'>暫無資料</div>";
                }
            }else{
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<br><div id='unit-result'>" . $row["EName"] . " 職位: " . $row["position"] . " " . " 電話: " . $row["EPhone"] . "</div>";
                    }
                } else {
                    echo "<br><div id='unit-result'>暫無資料</div>";
                }
            }

        } else {
            echo "<br><div id='unit-result'>暫無資料</div>";
        }


        ?>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
    <!--引用bootstrap-->
</body>

</html>