<?php
$details_json = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']. '/details.json'), true);

$servername = $details_json['servername'];
$username = $details_json['username'];
$password = $details_json['password'];
$dbname = $details_json['dbname'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connection Successfull!"; 
?>
