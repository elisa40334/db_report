<!DOCTYPE html>
<html lang="zh-TW">

<!--RWD好難 我放棄QQ-->

<head>
    <meta charset="UTF-8">
    <title>海大教職員資訊查詢系統</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="index.js">
    <style>
        fieldset {
            margin-bottom: 20px;
        }

        label {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <script>
        function showUnitForm() {
            document.getElementById('unit-form').style.display = 'block';
            document.getElementById('department-form').style.display = 'none';
            document.getElementById('employee-form').style.display = 'none';
        }

        function showDepartmentForm() {
            document.getElementById('unit-form').style.display = 'none';
            document.getElementById('department-form').style.display = 'block';
            document.getElementById('employee-form').style.display = 'none';
        }

        function showEmployeeForm() {
            document.getElementById('unit-form').style.display = 'none';
            document.getElementById('department-form').style.display = 'none';
            document.getElementById('employee-form').style.display = 'block';
        }
    </script>
    <header>
        <?php
        $URL = $_SERVER['REQUEST_URI'];
        if (str_contains($URL, '?')) {
            $parts = explode('?', $URL);
            $parts = explode('=', $parts[1]);
            $part = urldecode($parts[1]);
            require_once 'dbconnect.php';
            $datas = array();
            $sql = "DELETE FROM unit WHERE `unit`.`UName` = '$part'";
            $result = mysqli_query($link, $sql);
            mysqli_close($link);
            header("Refresh:0; index.php");
        }
        ?>
        <div class="header-top">
            <div class="logo">
                <img src="resource/logo.png" alt="海大logo" width="75%">
            </div>
            <form  class="combined-sections" action="text.php" method="POST">
                <div class="search-bar">
                <div class="search-bar">
                    <span id="radioButtonClass">
                        <input id="radioButtonClass_0" type="radio" name="radioButtonClass" value="0" checked="checked">
                        <label for="radioButtonClass_0">名字</label>

                        <input id="radioButtonClass_1" type="radio" name="radioButtonClass" value="1">
                        <label for="radioButtonClass_1">職位</label>

                        <input id="radioButtonClass_2" type="radio" name="radioButtonClass" value="2">
                        <label for="radioButtonClass_2">薪水</label>
                    </span>

                    <select id="salaryType" style="display: none;" name="salaryType">
                        <option value="min">最低薪資</option>
                        <option value="max">最高薪資</option>
                    </select>

                    <input name="searchName" type="text" maxlength="64" id="searchName" style="display: inline-block;">
                    
                    <input type="submit" name="QUERY_BTN7" value="查詢" id="QUERY_BTN7" class="btn" style="border: 1px solid #000; padding-top: 3px; padding-bottom: 3px;"  ml="CB_關鍵字查詢">
                    
                </div>
                </div>
                <!--hover會跑掉算了css真的好難QQ-->
                <div class="dropdown">
                    <button class="btn hamburger" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                        style="background: url('resource/ham.png') no-repeat center center; background-size: contain; height: 35px; width: 35px;"></button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><button type="button" class="dropdown-item" data-bs-toggle="modal"
                                data-bs-target="#addModal">新增</button></li>
                    </ul>
                </div>
            </form >
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
                        $result = mysqli_query($link, $sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<a class='link' href='unit.php?unit=" . $row["UName"] . "'>" . $row["UName"] . "</a>";
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
                        $result = mysqli_query($link, $sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<a class='link' href='unit.php?unit=" . $row["UName"] . "'>" . $row["UName"] . "</a>";
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
                        $result = mysqli_query($link, $sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<a class='link' href='unit.php?unit=" . $row["UName"] . "'>" . $row["UName"] . "</a>";
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
                        $sql = "SELECT * FROM unit WHERE category != '校友公關' AND category != '行政單位' AND category != '學術單位' AND category != '馬祖'";
                        $result = mysqli_query($link, $sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<a class='link' href='unit.php?unit=" . $row["UName"] . "'>" . $row["UName"] . "</a>";
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
                        $result = mysqli_query($link, $sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<a class='link' href='unit.php?unit=" . $row["UName"] . "'>" . $row["UName"] . "</a>";
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


        <!-- 懸浮視窗 -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">新增資料</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div style="text-align: center;">
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <button type="button" class="btn btn-secondary" onclick="showUnitForm()">單位</button>
                                <button type="button" class="btn btn-secondary"
                                    onclick="showDepartmentForm()">部門</button>
                                <button type="button" class="btn btn-secondary" onclick="showEmployeeForm()">員工</button>
                            </div>
                        </div>
                        <?php
                        //控制表單出沒
                        if (isset($_GET['form'])) {
                            $form = $_GET['form'];
                            if ($form === 'unit') {
                                echo "<script> showUnitForm(); </script>";
                            } elseif ($form === 'department') {
                                echo "<script> showDepartmentForm(); </script>";
                            } elseif ($form === 'employee') {
                                echo "<script> showEmployeeForm(); </script>";
                            }
                        }
                        ?>

                        <div class="form-container mt-3">
                            <!--單位-->
                            <form id="unit-form" style="display: block;" action="insertUnit.php" method="POST">
                                <div class="mb-3">
                                    <label for="UId" class="form-label">單位ID：</label>
                                    <input type="text" class="form-control" id="UId" name="UId">
                                </div>
                                <div class="mb-3">
                                    <label for="UName" class="form-label">單位名稱：</label>
                                    <input type="text" class="form-control" id="UName" name="UName">
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label">單位種類：</label>
                                    <input type="text" class="form-control" id="category" name="category">
                                </div>
                                <div>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                                    <button type="submit" class="btn btn-primary">確認更新</button>
                                </div>
                            </form>

                            <!--部門-->
                            <form id="department-form" style="display: none;" action="insertDepartment.php" method="POST">
                                <div class="mb-3">
                                    <label for="DId" class="form-label">部門ID：</label>
                                    <input type="text" class="form-control" id="DId" name="DId">
                                </div>
                                <div class="mb-3">
                                    <label for="DName" class="form-label">部門名稱：</label>
                                    <input type="text" class="form-control" id="DName" name="DName">
                                </div>
                                <div class="mb-3">
                                    <label for="DLocation" class="form-label">位置：</label>
                                    <input type="text" class="form-control" id="DLocation" name="DLocation">
                                </div>
                                <div class="mb-3">
                                    <label for="DPhone" class="form-label">電話：</label>
                                    <input type="text" class="form-control" id="DPhone" name="DPhone">
                                </div>
                                <div class="mb-3">
                                    <label for="DNet" class="form-label">網站：</label>
                                    <input type="text" class="form-control" id="DNet" name="DNet">
                                </div>
                                <div class="mb-3">
                                    <label for="DEmail" class="form-label">e-mail：</label>
                                    <input type="text" class="form-control" id="DEmail" name="DEmail">
                                </div>
                                <div class="mb-3">
                                    <label for="DFax" class="form-label">傳真：</label>
                                    <input type="text" class="form-control" id="DFax" name="DFax">
                                </div>
                                <div class="mb-3">
                                    <label for="UName" class="form-label">所屬單位：</label>
                                    <input type="text" class="form-control" id="UName" name="UName">
                                </div>
                                <div>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                                    <button type="submit" class="btn btn-primary">確認更新</button>
                                </div>
                            </form>

                            <!--員工-->
                            <form id="employee-form" style="display: none;" action="insertEmployee.php" method="POST">
                                <div class="mb-3">
                                    <label for="EId" class="form-label">員工ID：</label>
                                    <input type="text" class="form-control" id="EId" name="EId">
                                </div>
                                <div class="mb-3">
                                    <label for="EName" class="form-label">姓名：</label>
                                    <input type="text" class="form-control" id="EName" name="EName">
                                </div>
                                <div class="mb-3">
                                    <label for="EPhone" class="form-label">聯絡方式：</label>
                                    <input type="text" class="form-control" id="EPhone" name="EPhone">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">地址：</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                                <div class="mb-3">
                                    <label for="position" class="form-label">職位：</label>
                                    <input type="text" class="form-control" id="position" name="position">
                                </div>
                                <div class="mb-3">
                                    <label for="salary" class="form-label">薪水：</label>
                                    <input type="text" class="form-control" id="salary" name="salary">
                                </div>
                                <div class="mb-3">
                                    <label for="DName" class="form-label">所屬部門：</label>
                                    <input type="text" class="form-control" id="DName" name="DName">
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
    <script>
        // Function to show or hide the salaryType select and searchName input based on the radio button selection
        function toggleInputVisibility() {
            const radioButtonValue = document.querySelector('input[name="radioButtonClass"]:checked').value;
            const salaryTypeSelect = document.getElementById('salaryType');
            const qChLessonInput = document.getElementById('searchName');

            if (radioButtonValue === '2') {
                salaryTypeSelect.style.display = 'inline-block';
                qChLessonInput.style.display = 'none';
            } else {
                salaryTypeSelect.style.display = 'none';
                qChLessonInput.style.display = 'inline-block';
            }
        }

        // Attach the toggleInputVisibility function to the change event of radio buttons
        const radioButtons = document.querySelectorAll('input[name="radioButtonClass"]');
        radioButtons.forEach(radioButton => {
            radioButton.addEventListener('change', toggleInputVisibility);
        });
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
    <!--引用bootstrap-->
</body>

</html>