<?php
session_start();
// Kết nối đến MySQL
$servername = "db";
$username = "root";
$password = "mysecretpassword";
$dbname = "myapp";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối đến MySQL thất bại: " . mysqli_connect_error());
}
// Xử lý thông tin đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM user_info WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) >0) {
        // Nếu thông tin đăng nhập đúng, chuyển hướng đến trang chính
        header("Location: success.html");
        exit();
    } else {
        // Nếu thông tin đăng nhập sai, hiển thị thông báo lỗi
        echo "Tên đăng nhập hoặc mật khẩu không đúng.";
    }
}

mysqli_close($conn);
?>