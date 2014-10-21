<?php
/**
 * Created by PhpStorm.
 * User: zephyr
 * Date: 10/17/14
 * Time: 11:47 PM
 */
header("Content-type: text/html; charset=utf-8");

$conn = new mysqli("localhost", "root", "zoom", "book_mall");
if (mysqli_connect_errno()) {
    echo "无法连接数据库";
    exit();
}

// 前台提交的登录表单
$email = $_POST['email'];
$pwd = $_POST['pwd'];

$query = "SELECT * FROM user WHERE email = '$email' AND pwd = '$pwd'";

$result = $conn->query($query);

if ($result->num_rows) {
    session_start();
    $_SESSION['uid'] = $email;
    header("location:index.php");
} else {
    header("location:signin.html");
}

$result->free();
$conn->close();
