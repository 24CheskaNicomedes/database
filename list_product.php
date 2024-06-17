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
        
        // Handle SQL injection vulnerability by using prepared statements
        if (isset($_GET['cat'])) {
            $category_id = $_GET['cat'];
            $sql = "SELECT * FROM products WHERE category_id = ? ORDER BY model_year DESC";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $category_id);
        } else {
            $sql = "SELECT * FROM products ORDER BY model_year DESC";
            $stmt = $conn->prepare($sql);
        }
        
        // Execute the query
        $stmt->execute();
        $result = $stmt->get_result();
        ?>
        <table class="tab2">
            <!-- 表格標題 -->
            <tr class="tab2tit">
                <?php
                // 取得所有欄位的欄位資訊
                while ($fieldinfo = $result->fetch_field()) {
                    echo "<th>".$fieldinfo->name."</th>";
                }
                ?>
                <th width="50">修改</th>
                <th width="50">刪除</th>
            </tr>
            <!-- 列出產品資料表內容開始 -->
            <?php
            if ($result->num_rows > 0) {
                // 每筆記錄的輸出資料
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    // 列出各欄位值
                    foreach ($row as $key => $value) {
                        if (in_array(pathinfo($value, PATHINFO_EXTENSION), array("jpg", "jpeg", "png", "gif"))) {
                            // If the value is an image file, display it as an image
                            $img = "productimg/" . $value;
                            echo '<td><img src="' . $img . '" width="50" height="50"></td>';
                        } else {
                            // Otherwise, display as regular text
                            echo "<td>" . htmlspecialchars($value) . "</td>";
                        }
                    }
                    echo "<td><a title='修改' class='btn-vi' href='edit_product.php?id=" . $row['id'] . "'>修改</a></td>";
                    echo "<td><a title='刪除' class='btn-del' href='delete_product.php?id=" . $row['id'] . "'>刪除</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='" . ($result->field_count + 2) . "'>暫無資料</td></tr>";
            }
            $stmt->close();
            $conn->close();
            ?>
            <!-- 列出產品資料表內容結束 -->
        </table>
        <!-- 版身內容結束 -->
    </div><!-- body-R End -->
</div><!-- bodyArea End -->
<!-- 版身結束 -->

<?php require("php/layout_footer.php"); ?>
