<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
    .question {
        margin-top: 30px;
    }
</style>
<body>
    <h2>Đăng ký</h2>
    <form action="register.php" id="formRegister" onsubmit="return validateForm()" method="POST">

        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username"><br>

        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password"><br>

        <label for="confirm_password">Xác nhận mật khẩu:</label>
        <input type="password" id="confirm_password" name="confirm_password"><br>

        <input type="submit" value="Đăng ký"><br>
        <p class="question">Bạn đã có tài khoản ? <a href="http://localhost:8080/">Đăng nhập ngay</a>.</p>

    </form>
    <script src="validateForm.js"></script>
    <?php
        $servername = "db";
        $username = "root";
        $password = "mysecretpassword";
        $dbname = "users";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Kết nối đến MySQL thất bại: " . mysqli_connect_error());
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $query = $conn->prepare("SELECT * FROM user_info WHERE username = ?");
            $query->bind_param("s", $username);
            $query->execute();
            $result = $query->get_result();
            if ($result->num_rows > 0){
                echo "<script>if (confirm('Đăng ký thất bại. Tài khoản đã tồn tại.')){
                    window.location.replace('http://localhost:8080/src/register.php');
                }else{
                    window.location.replace('http://localhost:8080/src/register.php');
                }</script>";
            }else{
                $hashPass = hash('sha256', $password);
                $query = $conn->prepare("INSERT INTO user_info (username, password) VALUES (?, ?)");
                $query->bind_param("ss", $username, $hashPass);
                if ($query->execute()) {
                    echo "<script>if (confirm('Đăng ký tài khoản thành công. Bạn có muốn chuyển đến trang đăng nhập ?')){
                        window.location.replace('http://localhost:8080/');
                    }else{
                        window.history.back();
                    }</script>";
                } else {
                    echo "<script>alert('Đăng ký thất bại: " . mysqli_error($conn). "');</script>";
                }
            }
        }
        mysqli_close($conn);
    ?>
</body>
</html>