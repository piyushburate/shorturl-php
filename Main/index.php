<?php
error_reporting(0);
$details_json = json_decode(file_get_contents('details.json'), true);

$path = trim($_SERVER['REQUEST_URI'], "/");
$path = explode('?', $path)[0];
if ($path == "") {
    header("Location: ". $details_json['protocol'] . $details_json['admin-domain']);
    exit();
}
$path = explode('/', $path);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $details_json['title']; ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            -webkit-tap-highlight-color: transparent;
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -o-user-select: none;
            -khtml-user-select: none;
            -webkit-user-drag: none;
        }

        body {
            width: 100vw;
            height: 100vh;
        }

        #app {
            width: 100vw;
            height: 100vh;
            position: relative;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 99;
            background: white;
        }

        #app #loading {
            width: 50px;
            height: 50px;
            position: absolute;
            z-index: inherit;
            border-radius: 50%;
            border: 8px solid #aaa;
            border-top: 8px solid transparent;
            animation: loading 1s infinite linear;
        }

        @keyframes loading {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        #app #error {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 2rem;
            color: #333;
            display: none;
        }

        #app #error button {
            width: fit-content;
            padding: 10px 20px;
            font-size: 1rem;
            margin-top: 20px;
            border: none;
            outline: none;
            border-radius: 4px;
            background: #07f;
            color: white;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div id="app">
        <div id="loading"></div>
        <div id="error">
            <span>Sorry, page not found</span>
            <button onclick="location.reload()">Retry</button>
        </div>
    </div>
    <script>
        var loading = document.getElementById("loading")
        var error = document.getElementById("error")
        function showError() {
            loading.style.display = "none"
            error.style.display = "flex"
        }
    </script>
</body>

</html>
<?php
$code = $path[0];
$qr_search = "";
$update_col = "clicks";
if (sizeof($path) == 2) {
    $act = $path[1];
    if ($act != "qr") {
        echo "<script>showError();</script>";
        exit();
    }
    $qr_search = "&& qr_code = 2";
    $update_col = "qr_scans";
}
$servername = $details_json['servername'];
$username = $details_json['username'];
$password = $details_json['password'];
$dbname = $details_json['dbname'];

// Create connection
try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    $query = "SELECT link FROM links WHERE code = '$code' && link_active = 1 $qr_search";
    $data = $conn->query($query);
    $total = $data->num_rows;
    if ($total != 1) {
        throw new Exception("Error", 1);
    }
    $link = $data->fetch_assoc()['link'];
    $query2 = "UPDATE links SET $update_col = $update_col + 1 WHERE code = '$code'";
    $data2 = $conn->query($query2);
    header('Location: ' . $link);
} catch (Throwable $th) {
    echo "<script>showError();</script>";
    exit();
}
?>