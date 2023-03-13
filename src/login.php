<?php
// Kết nối đến MySQL
$servername = "db";
$username = "root";
$password = "mysecretpassword";
$dbname = "users";

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
        // session_start();
        // $_SESSION['loggedin'] = true;
        // $_SESSION['username'] = $username;
        header("Location: success.php");
        exit();
    } else {
        echo "<script>if (confirm('Tên đăng nhập hoặc mật khẩu không đúng.')){
            window.history.back();
        }else{
            window.history.back();
        }</script>";
    }
}
mysqli_close($conn);
?>