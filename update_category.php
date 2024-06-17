<?php
// var_dump($_POST); // DEBUG
require("php/cmsdb.php");

$query = "UPDATE categories SET name=? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('si',
    $_POST['category_name'],
    $_POST['category_id']
);
$stmt->execute();
$conn->close();
header("location:list_category.php"); // 轉頁
?>