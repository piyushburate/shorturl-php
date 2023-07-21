<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: /login');
    exit();
}

include '../modules/phpqrcode/qrlib.php';
error_reporting(0);

$code = $_REQUEST['code'];
$uid = $_SESSION['uid'];
function createQR($code)
{
    $link = "https://geolife.click/" . $code;
    $path = '../static/img/qrcodes/';
    $filepath = $path . $code . ".png";
    
    $ecc = 'L';
    $pixel_size = 10;
    $frame_size = 2;
    
    QRcode::png($link, $filepath, $ecc, $pixel_size, $frame_size);

    if (file_exists($filepath)) {
        return true;
    }
    return false;
}

include 'connection.php';
$query = "SELECT qr_code FROM links WHERE code = '$code' && uid = $uid";
$data = $conn->query($query);

if ($data) {
    $total = mysqli_num_rows($data);
    if ($total == 1) {
        $ops = createQR($code);
        if(!$ops){
            echo "<script> alert('An internal error occurred!'); history.back();</script>";
            exit();
        }
        $query2 = "UPDATE links SET qr_code = 1 WHERE code = '$code' && uid = $uid";
        $data2 = $conn->query($query2);
        if ($data2) {
            echo "<script> alert('QR code generated successfully!');</script>";
            header("Location: /user/links?code=$code");
            // echo "<img src='/static/img/qrcodes/$code.png'>";
        } else {
            echo "<script> alert('An internal error occurred!'); history.back();</script>";
        }
    } else {
        echo "<script> alert('An internal error occurred!'); history.back();</script>";
    }
} else {
    echo "<script> alert('An internal error occurred!'); history.back();</script>";
}
?>