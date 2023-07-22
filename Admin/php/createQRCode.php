<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: /login');
    exit();
}

error_reporting(0);

$code = $_REQUEST['code'];
$uid = $_SESSION['uid'];

include 'connection.php';
$query = "SELECT qr_code FROM links WHERE code = '$code' && uid = $uid";
$data = $conn->query($query);

if ($data) {
    $total = mysqli_num_rows($data);
    if ($total == 1) {
        $query2 = "UPDATE links SET qr_code = 1 WHERE code = '$code' && uid = $uid";
        $data2 = $conn->query($query2);
        if ($data2) {
            echo "<script> alert('QR code generated successfully!');</script>";
            header("Location: /user/links?code=$code");
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