<?php
//var_dump($_POST, $_FILES); // DEBUG

require ("php/cmsdb.php"); /* 載入MySQL連結程式 */

/* 檔案上傳後，四個基本數據 */
$pic_name=$_FILES['pic']['name']; //檔案名稱
$pic_size=$_FILES['pic']['size']; //檔案大小
$pic_type=$_FILES['pic']['type']; //檔案型態
$pic_tmp=$_FILES['pic']['tmp_name']; //暫存檔名稱

/* 取得圖檔資訊 */
$getImg=GetImageSize($_FILES['pic']['tmp_name']);

/* 判定是否有圖檔-開始 */
if (!empty($_FILES['pic']['tmp_name'])) {

    /* 設定存檔路徑 */
    $savePath="productimg/";

    /* 以亂數的方式，產生圖片檔名 */
    $keychars="abcdefghijklmnopqrstuvwxyz".date('dHis')."0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $randkey=""; //清空亂數字串
    for ($i=0; $i<10; $i++) { //產生10碼亂數
        $randkey .= substr($keychars, rand(1, strlen($keychars) ), 1);
    }
    $charName=date('YmdHis').$randkey; //自訂檔名

    /* $srcImg=取得來源圖片，$imgType=圖檔副檔名 */
    if ($getImg[2]==1) {
        $srcImg=imagecreatefromgif($pic_tmp);
        $imgType=".gif";
    }
    if ($getImg[2]==2) {
        $srcImg=imagecreatefromjpeg($pic_tmp);
        $imgType=".jpeg";
    }
    if ($getImg[2]==3) {
        $srcImg=imagecreatefrompng($pic_tmp);
        $imgType=".png";
    }

    /* 設定存檔檔名 */
    $new_pic_name=$charName.$imgType;

    /* 設定JPEG存檔品質 */
    $quality=90;

    $src_w=$getImg[0]; // 取得圖片的寬
    $src_h=$getImg[1]; // 取得圖片的長

    /* 判斷上傳圖片的高度與寬度，以最小值當成是正方型的邊長 */
    //如果寬大於高，正方型的邊長為圖片的高度
    if ($src_w>$src_h) {
        $new_w=$src_h;
        $new_h=$src_h;
    //寬小於高，正方型的邊長為圖片的寬度
    } else {
        $new_w=$src_w;
        $new_h=$src_w;
    }

    /* 以長方形的中心來取得正方形的左上方原點座標 */
    $axis_x=($src_w-$new_w)/2;
    $axis_y=($src_h-$new_h)/2;

    /* 建立一張新的圖檔，尺寸為 $new_w, $new_h，做為複製出來的圖片用 */
    $copyImg=imagecreatetruecolor($new_w, $new_h);

    /* 從來源圖片中，複製出所需位置點及大小的圖片 */
    imagecopy($copyImg, $srcImg, 0, 0, $axis_x, $axis_y, $new_w, $new_h );

    /* 建立一張新的圖檔，寬度為350，高度也為350，做為存檔圖片用 */
    $okImg=imagecreatetruecolor(350, 350);

    /* 將指定的來源圖片，重新調整位置及大小 */
    imagecopyresampled($okImg, $copyImg, 0, 0, 0, 0, 350, 350, $new_w, $new_h); // 開始縮圖

    /* 保持透明度 */
    imagesavealpha($okImg, true);
    $trans_colour = imagecolorallocatealpha($okImg, 0, 0, 0, 127);
    imagefill($okImg, 0, 0, $trans_colour);

    /* 將完成的圖檔，依檔案類型進行存檔 */
    if ($getImg[2]==1) { imagegif($okImg, $savePath.$new_pic_name); }
    if ($getImg[2]==2) { imagejpeg($okImg, $savePath.$new_pic_name, $quality); }
    if ($getImg[2]==3) { imagepng($okImg, $savePath.$new_pic_name); }

} /* 判定是否有圖檔-結束 */
else {
    // echo 'No upload';
    $new_pic_name = null;
}

// echo '$new_pic_name'.$new_pic_name; // DEBUG

/*** 寫入 product 資料表 ***/
//*
$query = "INSERT INTO products (name, category_id, model_year, list_price, picture) VALUES (?, ?, ?, ?, ?)";
if ($stmt = $conn->prepare($query)){
    $stmt->bind_param('siids',
        $_POST['product_name'],  // name
        $_POST['category_id'],   // category_id
        $_POST['model_year'],    // model_year
        $_POST['list_price'],    // list_price
        $new_pic_name            // picture
    );
}
else {
    echo 'Error: ', $conn->error; // DEBUG
}
// echo "before executing query"; // DEBUG
if (!$stmt->execute())
{
    echo 'Error: ', $conn->error;
}
//*/
/* 取得自動產生的id */
//*
$last_id = $conn->insert_id;
//*/
$stmt->close();
$conn->close();

/* 指定程式完成後，網頁轉址位置 */
header("location:edit_product.php?Msg=1&id=$last_id"); exit;
