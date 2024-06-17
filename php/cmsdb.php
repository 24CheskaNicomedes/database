<?php
$dbhost = "localhost";  // MySQL主機位址，localhost=本機
$dbuser = "4110e225";  // MySQL帳號
$dbpassword = "!QAZ2wsx";  // MySQL密碼
$dbname = "db4110e225"; // 資料庫名稱
$conn  = new mysqli($dbhost, $dbuser, $dbpassword, $dbname); // 連結MySQL資料庫
/* 檢查連線 */
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$today_YmdHis=date("YmdHis"); //今天日期-年月日時分秒
$today_Ymd=date("Y-m-d");     //今天日期-年月日
?>
