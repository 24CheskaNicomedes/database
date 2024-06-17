<?php
require("php/cmsdb.php");
$id = $_GET["id"];
// 取得圖片名稱
$sql = "SELECT picture FROM products WHERE id = '$id'";
$result = $conn->query($sql);
$pic = $result->fetch_assoc()['picture'];
// echo $pic; // DEBUG
/* 刪除圖片 */
@unlink ("productimg/".$pic);

// 刪除資料錄
$sql = "DELETE FROM products WHERE id = '{$_GET['id']}'";
$conn->query($sql);
$conn->close();
header("location:list_product.php?Msg=2"); // 網頁轉址，並帶Msg=2以啟動訊息視窗
exit;
?>
