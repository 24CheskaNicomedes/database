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
        require("php/cmsdb.php"); // Include database connection file

        // Validate and retrieve product ID from GET parameter
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            echo "未輸入有效的產品id";
            exit;
        } else {
            $id = $_GET['id'];
            // Query to fetch product details based on ID
            $sql = "SELECT * FROM products WHERE id = '{$id}'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $product_name = $row["name"];
                $category_id = $row["category_id"];
                $model_year = $row["model_year"];
                $list_price = $row["list_price"];
                $product_pic = $row["picture"] ? $row["picture"] : "";  
            } else {
                echo "未找到相應的產品資料";
                $conn->close();
                exit;
            }
            $conn->close();
        }
        ?>

        <!-- 顯示編輯產品表單 -->
        <div class="pgtit" style="font-size:16pt;">產品資料</div><!-- pgtit End -->
        
        <form method="POST" action="update_product.php" enctype="multipart/form-data" class="formsty">
            <div class="formtab">
                <ul> <!-- Changed to ul for proper list structure -->
                    <li class="L">id：<input type="text" id="productID" name="product_id" size="20"
                            value="<?php echo htmlspecialchars($id); ?>" readonly></li>
                    <li style="clear:left">品名：<input type="text" id="productName" class="chkval" name="product_name"
                            value="<?php echo htmlspecialchars($product_name); ?>" size="80"></li>
                    <li class="L">
                        <label for="category">產品類別:</label>
                        <select id="category" name="category_id">
                            <?php
                            require("php/cmsdb.php"); // Reconnect to get categories
                            $sql = "SELECT * FROM categories ORDER BY id";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $selected = ($category_id == $row["id"]) ? ' selected' : '';
                                    echo "<option value='" . htmlspecialchars($row["id"]) . "'$selected>" . htmlspecialchars($row["name"]) . "</option>";
                                }
                            } else {
                                echo "<option value='0'>產品類別</option>";
                            }
                            $conn->close();
                            ?>
                        </select>
                    </li>
                    <li class="L">出品年份：<input type="text" id="modelYear" class="chkval chkolnynum" name="model_year"
                            value="<?php echo htmlspecialchars($model_year); ?>" size="5"></li>
                    <li class="L">建議售價：<input type="text" id="listPrice" class="chkval chknum" name="list_price"
                            value="<?php echo htmlspecialchars($list_price); ?>" size="20"></li>
                    <?php
                    // Determine image path
                    $img = ($product_pic == "") ? "images/noimg-200-a.png" : "../productimg/" . htmlspecialchars($product_pic);
                    ?>
                    <li style="clear:left">圖片：<input type="file" name="pic" size="30">
                        <input type="hidden" name="oldpic" value="<?php echo htmlspecialchars($product_pic); ?>"></li>
                    <li><img src="<?php echo htmlspecialchars($img); ?>" style="width:150px;height:150px;"></li>
                    <li style="border:none;"><input type="submit" value="更新" id="SendBtn" class="formbtn"></li>
                </ul>
            </div><!-- formtab End -->
        </form>

        <!-- 版身內容結束 -->
    </div><!-- body-R End -->
</div><!-- bodyArea End -->
<!-- 版身結束 -->

<!-- 前面省略 -->

<?php
### 訊息視窗 ###
if (isset($_GET['Msg']) && $_GET['Msg'] == 1) {
    echo "
    <script>
    $(document).ready(function(){
        MsgAlertOn();
        $('.MsgTxt').text('資料已完成新增。');
    });
    </script>";
}
require("php/layout_footer.php");
?>
