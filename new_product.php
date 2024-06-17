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
        <!-- 顯示新增產品表單 -->
        <div class="pgtit" style="font-size:16pt;">
            新增產品資料
        </div><!-- pgtit End -->

        <form method="POST" action="store_product.php" enctype="multipart/form-data" class="formsty">
            <div class="formtab">
                <li style="clear:left">
                    品名：<input type="text" id="productName" class="chkval" name="product_name" size="80"></li>                
                <li class="L">
                    <label for="category">產品類別:</label>
                    <select id="category" name="category_id" class="chkval">
                    <option value="" selected>選擇產品類別</a>
                    <?php
                    require("php/cmsdb.php");
                    $result = $conn->query('SELECT * FROM categories ORDER BY id');
                    if ($result->num_rows > 0) {
                        // 每筆記錄的輸出資料
                        while($row = $result->fetch_assoc()) { ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                    <?php    
                        }
                    }   
                    $conn->close();
                    ?>
                    </select>
                <li class="L">
                    出品年份：<input type="text" id="modelYear" class="chkval chkolnynum" name="model_year" size="5"></li>
                <li class="L">
                    建議售價：<input type="text" id="listPrice" class="chkval chknum" name="list_price" size="20"></li>
                <li style="clear:left">
                    圖片：
                    <input type="file" name="pic" size="30">
                </li>
                <li style="border:none;">
                    <input type="submit" value="新增" id="SendBtn" class="formbtn"></li>
            </div><!-- formtab End -->
        </form>
        <!-- 版身內容結束 -->
    </div><!-- body-R End -->
</div><!-- bodyArea End -->
<!-- 版身結束 -->

<?php require("php/layout_footer.php"); ?>
