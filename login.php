<?php
session_start();
$username = @$_POST['username'];
$password = @$_POST['password'];

// 載入db.php來連結資料庫
require_once 'dbconnect.php';

// 使用 sprintf 來構建 SQL 查詢，並將參數放在後面
$sql = sprintf("SELECT * FROM administrator WHERE username = '%s'", mysqli_real_escape_string($link, $username));

// 用mysqli_query方法執行(sql語法)將結果存在變數中
$result = mysqli_query($link, $sql);

// 檢查是否存在匹配的記錄
if ($result === false) {
    // 查詢失敗，輸出錯誤信息
    echo "查詢失敗";
} else {
    // 使用 mysqli_num_rows 前先檢查 $result 是否為 mysqli_result 對象
    if ($result instanceof mysqli_result) {
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0) {
            // 用戶存在，取得用戶信息
            $row = mysqli_fetch_assoc($result);

            // 驗證密碼
            if ($password === $row['password']) {
                // 密碼匹配，登入成功
                echo '<script>alert("登入成功！用戶名：' . $row['username'] .'");</script>';
                $_SESSION["loggedin"] = 1;
                //$_SESSION["username"] = mysqli_fetch_assoc($result)["username"];
            } else {
                // 密碼不匹配，登入失敗
                echo '<script>alert("帳號或密碼錯誤，登入失敗。");</script>';
            }
        } else {
            // 用戶不存在，登入失敗
            echo '<script>alert("用戶不存在，登入失敗。");</script>';
        }
    }
}

// 關閉連接
mysqli_close($link);
header("Refresh:0; index.php");
?>
