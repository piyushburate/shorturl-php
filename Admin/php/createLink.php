<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>goTo('/login');</script>";
    exit();
}

include("connection.php");
$title = $_POST['title'];
$long_url = $_POST['long_url'];
$short_url = $_POST['short_url'];

$query = "SELECT * FROM links WHERE code = '$short_url'";
$data = $conn->query($query);
if ($data) {
    $total = mysqli_num_rows($data);
    if ($total > 0) {
        echo "<script> alert('Short link code already taken!'); history.back();</script>";
    } else {
        $uid = $_SESSION['uid'];
        $query2 = "INSERT INTO links (code, link, uid, title) VALUES ('$short_url', '$long_url', '$uid', '$title')";
        $data2 = $conn->query($query2);
        if ($data2) {
            echo "<script> alert('Short link created successfully!');</script>";
            header("Location: /user/links?code=$short_url");
        } else {
            echo "<script> alert('An internal error occurred!'); history.back();</script>";
        }
    }
} else {
    echo "<script> alert('An internal error occurred!'); history.back();</script>";
}


?>