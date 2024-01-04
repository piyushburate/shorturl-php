<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: /login');
    exit();
}

function random_code_generator($range_start, $range_end)
{
    $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $len = rand($range_start, $range_end);
    $pos = strlen($char);
    $pos = pow($pos, $len);
    $total = strlen($char) - 1;
    $text = "";
    for ($i = 0; $i < $len; $i++) {
        $text = $text . $char[rand(0, $total)];
    }
    return $text;
}

include("connection.php");
$title = $_POST['title'];
$long_url = $_POST['long_url'];
$short_url = $_POST['short_url'];
if ($_COOKIE['auto_qr_generate'] == 'true') {
    $qr_code_var = ", qr_code";
    $qr_code_val = ", '2'";
}

$start_time = microtime(true);
$iteration = false;
if (strlen($short_url) == 0) {
    $iteration = true;
}

do {
    if($iteration == true){
        $short_url = random_code_generator(5, 8);
    }
    $query = "SELECT * FROM links WHERE code = '$short_url'";
    $data = $conn->query($query);
    if ($data) {
        $total = mysqli_num_rows($data);
        if ($total > 0) {
            $time_elapsed = microtime(true) - $start_time;
            if ($iteration == false) {
                echo "<script> alert('Short link code already taken!'); history.back();</script>";
            } else if ($time_elapsed > 10) {
                $iteration == false;
                echo "<script> alert('An internal error occurred!'); history.back();</script>";
            } else {
                continue;
            }
        } else {
            break;
        }
    } else {
        echo "<script> alert('An internal error occurred!'); history.back();</script>";
    }
} while ($iteration == true);


if(strlen($title) == 0){
    $title = $short_url;
}
$uid = $_SESSION['uid'];
$query2 = "INSERT INTO links (code, link, uid, title $qr_code_var) VALUES ('$short_url', '$long_url', '$uid', '$title' $qr_code_val)";
$data2 = $conn->query($query2);
if ($data2) {
    echo "<script> alert('Short link created successfully!');</script>";
    header("Location: /user/links?code=$short_url");
} else {
    echo "<script> alert('An internal error occurred!'); history.back();</script>";
}

?>