<!DOCTYPE html>
<html lang="zh-TW">

<!--RWD好難 我放棄QQ-->

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
    <!--引用bootstrap-->
    <meta charset="UTF-8">
    <title>海大教職員資訊查詢系統</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="index.js">
</head>

<body>
    <header>
        <div class="header-top">
            <div class="logo">
                <img src="resource/logo.png" alt="海大logo" width="75%">
            </div>
            <div class="combined-sections">
                <div class="search-bar">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="搜尋..."
                            style="background-color: rgb(94, 97, 101)">
                        <button class="btn btn-secondary search-button" type="button" id="button-addon2"
                            style="background: url('resource/magnifier.png') no-repeat center center; background-size: contain; "></button>
                    </div>
                </div>
                <!--hover會跑掉算了css真的好難QQ-->
                <div class="dropdown">
                    <button class="btn hamburger" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                        style="background: url('resource/ham.png') no-repeat center center; background-size: contain; height: 35px; width: 35px;"></button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">新增</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="header-bottom">
            <div class="column-container">
                <div class="column" style="border-left: none;">
                    學術單位
                    <div class="dropdown-content" id="academic">
                        <!-- 動態加入 -->
                        <?php
                            require_once 'dbconnect.php';
                            $datas = array();
                            $sql = "SELECT * FROM unit WHERE category = '學術單位'";
                            $result = mysqli_query($link,$sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo  "<a class='link' href='unit.php?unit=" . $row["UName"] . "'>" . $row["UName"] . "</a>";
                                }
                            } else {
                                echo "暫無資料";
                            }
                        ?>
                    </div>
                </div>
                <div class="column">
                    行政單位
                    <div class="dropdown-content" id="administrative">
                        <!-- 動態加入 -->
                        <?php
                            require_once 'dbconnect.php';
                            $datas = array();
                            $sql = "SELECT * FROM unit WHERE category = '行政單位'";
                            $result = mysqli_query($link,$sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo  "<a class='link' href='unit.php?unit=" . $row["UName"] . "'>" . $row["UName"] . "</a>";
                                }
                            } else {
                                echo "暫無資料";
                            }
                        ?>
                    </div>
                </div>
                <div class="column">
                    校友公關
                    <div class="dropdown-content" id="alumni">
                        <!-- 動態加入 -->
                        <?php
                            require_once 'dbconnect.php';
                            $datas = array();
                            $sql = "SELECT * FROM unit WHERE category = '校友公關'";
                            $result = mysqli_query($link,$sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo  "<a class='link' href='unit.php?unit=" . $row["UName"] . "'>" . $row["UName"] . "</a>";
                                }
                            } else {
                                echo "暫無資料";
                            }
                        ?>
                    </div>
                </div>
                <div class="column">
                    研究中心及其他
                    <div class="dropdown-content" id="research">
                        <!-- 動態加入 -->
                        <?php
                            require_once 'dbconnect.php';
                            $datas = array();
                            $sql = "SELECT * FROM unit WHERE category = '研究中心及其他'";
                            $result = mysqli_query($link,$sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo  "<a class='link' href='unit.php?unit=" . $row["UName"] . "'>" . $row["UName"] . "</a>";
                                }
                            } else {
                                echo "暫無資料";
                            }
                        ?>
                    </div>
                </div>
                <div class="column">
                    馬祖
                    <div class="dropdown-content" id="matsu">
                        <!-- 動態加入 -->
                        <?php
                            require_once 'dbconnect.php';
                            $datas = array();
                            $sql = "SELECT * FROM unit WHERE category = '馬祖'";
                            $result = mysqli_query($link,$sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo  "<a class='link' href='unit.php?unit=" . $row["UName"] . "'>" . $row["UName"] . "</a>";
                                }
                            } else {
                                echo "暫無資料";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="resource/1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="resource/2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="resource/3.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </main>
</body>

</html>