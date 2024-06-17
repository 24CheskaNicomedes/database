<!-- list_cateogry -->
<?php require("php/layout_head.php"); ?>

<!-- 版身開始 -->
<div class="bodyArea">
    <!-- 版身內容開始 -->
    <?php
    require("php/cmsdb.php");
    $sql = "SELECT * FROM categories ORDER BY id ASC";
    $result = $conn->query($sql);
    ?>
    <table class="tab2">
    <!-- 表格標題 -->
        <tr class="tab2tit">
            <th>編號</th>
            <th>類別名稱</th>
            <th width="50">修改</th>
            <th width="50">刪除</th>
        </tr>
    <!-- 列出產品類別資料表內容開始 -->
    <?php
    if ($result->num_rows > 0) {
        // 每筆記錄的輸出資料
        while ( $row = $result->fetch_assoc() ) {
            echo "<tr>";
            // 列出各欄位值
            echo '<td>'.$row["id"].'</td>';
            echo '<td>'.$row["name"].'</td>';
            echo "<td><a title='修改' class='btn-vi' href='edit_category.php?id=".$row["id"]."'>修改</a></td>";
            echo "<td><a title='刪除' class='btn-del' onclick='alertDel({$row["id"]});MsgYesNoOn();'>刪除</a></td>";
            echo "</tr>";
        }
    }
    $conn->close();
    ?>
    <!-- 列出產品類別資料表內容結束 -->
    </table>
    <!-- 版身內容結束 -->
</div><!-- bodyArea End -->
<!-- 版身結束 -->

<?php
### 訊息視窗 ###
if ($_GET['Msg']==1) {
    echo "
    <script>
    $(document).ready(function(){
        MsgAlertOn();
        $('.MsgTxt').text('資料已完成新增。');
    });
    </script>";  
}
if ($_GET['Msg']==2) {
    echo "
    <script>
    $(document).ready(function(){
        MsgAlertOn();
        $('.MsgTxt').text('指定的資料已刪除。');
    });
    </script>";  
}
require("php/layout_footer.php");
?>