<?php
/**
 * Created by PhpStorm.
 * User: zephyr
 * Date: 10/18/14
 * Time: 11:11 PM
 */
header("Content-type: text/html; charset=utf-8");

$conn = new mysqli("localhost", "root", "zoom", "book_mall");
if (mysqli_connect_errno()) {
    echo "无法连接数据库";
    exit();
}

$email = $_POST['email'];
$pwd = $_POST['pwd'];
$repwd = $_POST['repwd'];

if ($pwd !== $repwd) {
    header("location:signup.html");
} else {
    $query = "INSERT INTO user (email, pwd) VALUES ('$email', '$pwd')";
    $conn->query($query);
    if ($conn->affected_rows == 1) {
        session_start();
        $_SESSION['uid'] = $email;
        header("location:index.php");
    } else {
        header("location:signup.html");
    }
}