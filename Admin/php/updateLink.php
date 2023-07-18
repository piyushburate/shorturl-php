<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>goTo('/login');</script>";
    exit();
}

include("connection.php");
$uid = $_SESSION['uid'];
$title = $_POST['title'];
$long_url = $_POST['long_url'];
$short_url = $_POST['short_url'];
$link_active = 0;
if($_POST['link_active'] == "on"){
    $link_active = 1;
}

$query = "SELECT * FROM links WHERE code = '$short_url' && uid = $uid";
$data = $conn->query($query);

if ($data) {
    $total = mysqli_num_rows($data);
    if ($total == 1) {
        $query2 = "UPDATE links SET link = '$long_url', title = '$title', link_active = $link_active WHERE code = '$short_url' && uid = $uid";
        $data2 = $conn->query($query2);
        if ($data2) {
            echo "<script> alert('Short link updated successfully!');</script>";
            header("Location: /user/links?code=$short_url");
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