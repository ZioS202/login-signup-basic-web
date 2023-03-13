<?php
    session_start();
    // Kiểm tra xem người dùng đã đăng nhập hay chưa
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        echo "<script>if (confirm('Vui lòng đăng nhập')){
            window.location.replace('http://localhost:8080/')
        }else{
            window.location.replace('http://localhost:8080/')
        }</script>";
        echo "fail";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<style>
		*{ 
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font-family: Arial, sans-serif;
        }
		h1 {
			background-color: #4c6baf;
			color: white;
			padding: 20px;
			text-align: center;
            font-size: 50px;
		}

		section {
            width:50%;
			margin: 50px auto;
			padding: 10px;
            text-align: center;
			background-color: white;
			border-radius: 5px;
			box-shadow: 0 0 5px #888;
		}
	</style>
<body>
    <h1>Thông báo</h1>
    <section>
        <h2>Chào mừng đến với site này. </h2>
        <h3><a href='http://localhost:8080/src/logout.php'>Đăng xuất</a></h3>
    </section>";
</body>
</html>

