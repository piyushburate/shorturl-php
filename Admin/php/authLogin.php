<?php
session_start();
include("connection.php");
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$query = "SELECT * FROM users WHERE username = '$username' && password = '$password'";
$data = $conn->query($query);

if ($data) {
    $total = mysqli_num_rows($data);
    if ($total == 1) {
        $row = $data->fetch_assoc();
        $_SESSION['uid'] = $row['uid'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        echo "<script> alert('Login Successfull!');</script>";
        header("Location: /user");
    } else {
        echo "<script> alert('Invalid username or password!'); location.href = '/login';</script>";
    }
} else {
    echo "<script> alert('An internal error occurred!'); location.href = '/login';</script>";
}
?>