<?php
/**
 * Created by PhpStorm.
 * User: zephyr
 * Date: 10/19/14
 * Time: 1:32 PM
 */
session_start();
if (!isset($_SESSION['uid'])) {
    header("location:signin.html");
} else {

    $conn = new mysqli('localhost', 'root', 'zoom', 'book_mall');
    if (mysqli_connect_errno()) {
        echo "无法连接数据库";
        exit();
    }

    $theme = $_POST['theme'];
    $content = $_POST['content'];
    $user_email = $_SESSION['uid'];

    $query = "INSERT INTO contact (theme, content, user_email) VALUES ('$theme', '$content', '$user_email')";

    $conn->query($query);
    if ($conn->affected_rows == 1) {
        header("location:success.php");
    } else {
        header("location:contact.php");
    }

}