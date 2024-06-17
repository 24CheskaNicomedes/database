<!DOCTYPE html>
<html lang="zh-TW">
<head>  
    <title>PHP全能網頁設計師</title>
    <meta charset="utf-8">
    <meta name="keywords" content="網頁關鍵字">
    <meta name="description" content="網頁大網">
    <link rel="stylesheet" href="css/layout.css">
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/layout.js"></script>
</head>
<body>

<!-- 版頭開始 -->
<div class="headArea">
    <div class="head-L">
        <a title="PHP全能網頁設計師" href="./"><img src="images/logo.png" alt="logo"></a>
    </div><!-- head-L end -->
    <div class="head-R">
        <form action="find.php" method="GET">
            <input type="text" name="keyword" size="30">
            <input type="submit" value="送出" name="keywordSend">
        </form>
    </div><!-- head-R end -->
</div><!-- headArea End -->
<!-- 版頭結束 -->

<!-- 按鈕列開始 -->
<div class="headBtnArea">
    <div class="headBtn">
        <ul> <!-- Added missing <ul> tag for list -->
            <li class="Lline"><a title="關於我們" class="btn1" href="about.php">關於我們</a></li>
            <!-- 子選單開始 -->
            <li>
                <a title="產品介紹" class="btn1" href="prolist.php">產品介紹</a>
                <div class="headBtn-items">
                    <?php
                    // Assuming cmsdb.php contains the database connection code
                    require("php/cmsdb.php");
                    $sql = "SELECT * FROM categories ORDER BY id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // 每筆記錄的輸出資料
                        while($row = $result->fetch_assoc()) {
                            echo '<div><a href="list_product.php?cat='.$row["id"].'">'.$row["name"].'</a></div>';
                        }
                    } else {
                        // If no categories found
                        echo '<div><a href="list_product.php">產品類別</a></div>';
                    }
                    $conn->close();
                    ?>
                </div>
            </li>
            <!-- 子選單結束 -->
            <li><a title="產品QA" class="btn1" href="qalist.php">產品QA</a></li>
            <li><a title="最新消息" class="btn1" href="news.php">最新消息</a></li>
            <li><a title="加入會員" class="btn1" href="member.php">加入會員</a></li>
            <li><a title="聯絡我們" class="btn1" href="contact.php">聯絡我們</a></li>
            <li><a title="登入" class="btn1" href="login.php">登入</a></li>
        <!-- 後台管理子選單開始 -->
        <li>
            <a title="後台管理" class="btn1" href="#">後台管理</a>
            <div class="headBtn-items">
                <a href="new_product.php">新增產品</a>
                <a href="new_category.php">新增產品類別</a>
                <a href="list_category.php">產品類別清單</a>
            </div>
        </li>
        <!-- 後台管理子選單結束 -->

        </ul>
    </div><!-- headBtn End -->
</div><!-- headBtnArea End -->
<!-- 按鈕列結束 -->

</body>
</html>
