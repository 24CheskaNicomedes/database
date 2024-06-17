<?php require("php/layout_head.php"); ?>

<!-- 版身開始 -->
<div class="bodyArea">
    <div class="body-L">
        <!-- 選單開始 -->
        <?php require("php/layout_sel.php"); ?>
        <!-- 選單結束 -->
    </div><!-- body-L End -->
    <div class="body-R">
        <!-- 版身內容開始 -->
        <?php
        require("php/cmsdb.php");
        if (!isset($_GET['id'])){
            echo "未輸入產品類別id";
            $conn->close();
            exit;
        } else {
            $id = $_GET['id'];
            // 查詢產品類別資料表，取得產品類別資料
            $sql = "SELECT * FROM categories WHERE id = '{$id}'";
        }
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $category_name = $row["name"];
        $conn->close();
        ?>
        <!-- 顯示編輯產品類別表單 -->
        <div class="pgtit" style="font-size:16pt;">
            產品類別資料
        </div><!-- pgtit End -->

        <form method="POST" action="update_category.php" class="formsty">
            <div class="formtab">
                <li class="L">
                    id：<input type="text" id="categoryID" name="category_id" size="5"
                        value="<?php echo $id; ?>" readonly></li>
                <li style="clear:left">
                <label for="category-name">產品類別名稱:</label>
                <input type="text" id="category-name" class="chkval" name="category_name"
                    value="<?php echo $category_name; ?>" size="20"></li>
                <li style="border:none;">
                    <input type="submit" value="更新" id="SendBtn" class="formbtn"></li>
            </div><!-- formtab End -->
        </form>
        <!-- 版身內容結束 -->
    </div><!-- body-R End -->
</div><!-- bodyArea End -->
<!-- 版身結束 -->

<?php require("php/layout_footer.php"); ?>