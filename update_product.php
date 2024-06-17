<?php
// Uncomment for debugging
// var_dump($_POST, $_FILES);

require("php/cmsdb.php");

// Initialize variables to store uploaded file information
$pic_name = $_POST['oldpic']; // Default to old picture name if no new upload

// Check if a new file has been uploaded
if (!empty($_FILES['pic']['tmp_name'])) {
    // File details
    $pic_name = $_FILES['pic']['name'];
    $pic_size = $_FILES['pic']['size'];
    $pic_type = $_FILES['pic']['type'];
    $pic_tmp = $_FILES['pic']['tmp_name'];

    // Save path for uploaded images
    $savePath = "productimg/";

    // Generate a random filename for the uploaded image
    $keychars = "abcdefghijklmnopqrstuvwxyz" . date('dHis') . "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $randkey = "";
    for ($i = 0; $i < 10; $i++) {
        $randkey .= substr($keychars, rand(1, strlen($keychars)), 1);
    }
    $charName = date('YmdHis') . $randkey; // Custom file name based on current date and random key

    // Determine image type and create appropriate image resource
    $getImg = GetImageSize($pic_tmp);
    switch ($getImg[2]) {
        case 1:
            $srcImg = imagecreatefromgif($pic_tmp);
            $imgType = ".gif";
            break;
        case 2:
            $srcImg = imagecreatefromjpeg($pic_tmp);
            $imgType = ".jpeg";
            break;
        case 3:
            $srcImg = imagecreatefrompng($pic_tmp);
            $imgType = ".png";
            break;
        default:
            die("Unsupported file type.");
    }

    // Set up dimensions for the resized image
    $src_w = $getImg[0];
    $src_h = $getImg[1];
    if ($src_w > $src_h) {
        $new_w = $src_h;
        $new_h = $src_h;
    } else {
        $new_w = $src_w;
        $new_h = $src_w;
    }

    // Calculate position for cropping
    $axis_x = ($src_w - $new_w) / 2;
    $axis_y = ($src_h - $new_h) / 2;

    // Create new image resource for cropped image
    $copyImg = imagecreatetruecolor($new_w, $new_h);
    imagecopy($copyImg, $srcImg, 0, 0, $axis_x, $axis_y, $new_w, $new_h);

    // Create final image resource for saved image
    $okImg = imagecreatetruecolor(350, 350);
    imagecopyresampled($okImg, $copyImg, 0, 0, 0, 0, 350, 350, $new_w, $new_h);

    // Ensure transparency is preserved for PNG images
    imagesavealpha($okImg, true);
    $trans_colour = imagecolorallocatealpha($okImg, 0, 0, 0, 127);
    imagefill($okImg, 0, 0, $trans_colour);

    // Save the image based on its type
    switch ($getImg[2]) {
        case 1:
            imagegif($okImg, $savePath . $charName . $imgType);
            break;
        case 2:
            imagejpeg($okImg, $savePath . $charName . $imgType, 90); // Quality set to 90
            break;
        case 3:
            imagepng($okImg, $savePath . $charName . $imgType);
            break;
        default:
            die("Unsupported file type.");
    }

    // Update $pic_name to the new file name
    $pic_name = $charName . $imgType;

    // Remove old picture if a new one was uploaded
    @unlink("productimg/" . $_POST['oldpic']);
}

// Prepare and execute SQL update statement
$query = "UPDATE products SET name=?, category_id=?, model_year=?, list_price=?, picture=? WHERE id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param('siidsi',
    $_POST['product_name'],
    $_POST['category_id'],
    $_POST['model_year'],
    $_POST['list_price'],
    $pic_name,
    $_POST['product_id']
);
$stmt->execute();

// Close connection and redirect to list_product.php after update
$stmt->close();
$conn->close();
header("location:list_product.php?cat=" . $_POST['category_id']);
exit;
?>
