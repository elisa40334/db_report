<!DOCTYPE html>
<html lang="zh-TW">
<?php
    include('dbconnect.php');  //這是引入剛剛寫完，用來連線的.php
?>
<head>
    <meta charset="UTF-8">
    <title>員工資料介面</title>
    <link rel="stylesheet" href="employee.css">
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
            $sql = "DELETE FROM employee WHERE `employee`.`EId` = '$part'";
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
                <?php
                $URL = $_SERVER['REQUEST_URI'];
                $parts = explode('?', $URL);
                $parts = explode('=', $parts[1]);
                $part = urldecode($parts[1]);
                echo "<a class='dropdown-item' class='link' href='employee.php?unit=!" . $part . "'>刪除</a>";
                ?>
            </ul>
        </div>

    </header>

    <main>
        <!--抓單位名字放最上面-->
        <div id="department-name"></div>

        <!--資料表格-->
        <div class="employee-data">
            <table>
                <?php
                
                    $URL = $_SERVER['REQUEST_URI'];
                    $parts = explode('=', $URL);
                    $part = urldecode($parts[1]);//取網址中的EName

                    // sql語法存在變數中
                    $query = "SELECT *FROM employee WHERE EName = '$part'"; //搜尋*(全部欄位) ，從表employee
                    // 用mysqli_query方法執行(sql語法)將結果存在變數中
                    $result = mysqli_query($link,$query);
                    
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <th>員工編號</th>
                    <td style="width: 70%;"><?php echo $row['EId']; ?></td>
                    <td rowspan="2" style="width: 30%;  border-left: 2px solid white;padding: 5px;">
                        <img src="https://pgw.udn.com.tw/gw/photo.php?u=https://uc.udn.com.tw/photo/2023/10/05/0/25837663.jpg&s=Y&x=0&y=0&sw=1280&sh=853&sl=W&fw=1050"
                            alt="Employee Photo" width=150px;>
                    </td>
                
                </tr>
                
                <tr>
                    <th>姓名</th>
                    <td style="width: 70%;"> <?php echo $row['EName']; ?></td>
                </tr>
                <tr>
                    <th>電話</th>
                    <td colspan="2">
                        <?php
                            if(empty($row['EPhone'])){
                                echo "暫無資料";
                            }
                            else{
                                echo $row['EPhone'];
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>地址</th>
                    <td colspan="2">
                        <?php
                            if(empty($row['address'])){
                                echo "暫無資料";
                            }
                            else{
                                echo $row['address'];
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>職位</th>
                    <td colspan="2">
                    <?php
                            if(empty($row['position'])){
                                echo "暫無資料";
                            }
                            else{
                                echo $row['position'];
                            }
                    ?>
                
                    </td>
                </tr>
                <tr>
                    <th>薪水</th>
                    <td colspan="2">
                        <?php
                            if(empty($row['salary'])){
                                echo "暫無資料";
                            }
                            else{
                                echo $row['salary'];
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>所屬部門</th>
                    <td colspan="2">
                        <?php
                            if(empty($row['DName'])){
                                echo "暫無資料";
                            }
                            else{
                                echo $row['DName'];
                            }
                        ?>
                    </td>
                </tr>
                <?php
				        }
                    }
                    
			    ?>
            </table>

        </div>
        <!-- 懸浮視窗 -->
        <div class="modal fade" id="modifyModal" tabindex="-1" aria-labelledby="modifyModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modifyModalLabel">員工資料編輯</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-container mt-3">
                            <form id="employee-form">
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
                                <div style="text-align: center;">
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