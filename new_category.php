<!-- new_category.php -->
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
        <!-- 顯示編輯產品表單 -->
        <div class="pgtit" style="font-size:16pt;">
            新增產品類別
        </div><!-- pgtit End -->

        <form method="POST" action="store_category.php" class="formsty">
            <div class="formtab">
                <li style="clear:left">
                    產品類別名稱：<input type="text" id="categoryName" class="chkval" name="category_name" size="40"></li>                
                <li style="border:none;">
                    <input type="submit" value="新增" id="SendBtn" class="formbtn"></li>
            </div><!-- formtab End -->
        </form>
        <!-- 版身內容結束 -->
    </div><!-- body-R End -->
</div><!-- bodyArea End -->
<!-- 版身結束 -->

<?php require("php/layout_footer.php"); ?>
