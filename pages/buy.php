<?php
/**
 * Created by PhpStorm.
 * User: zephyr
 * Date: 10/20/14
 * Time: 11:40 PM
 */
session_start();
if (!isset($_SESSION['uid'])) {
    header("location:signin.html");
    exit();
}

$ids = $_COOKIE['id'];
$id_num = $_COOKIE['id_num'];

$conn = new mysqli("localhost", "root", "zoom", "book_mall");
if (mysqli_connect_errno()) {
    echo "无法连接数据库";
    exit();
}

while ($id_num) {
    $query = "SELECT book_has_user.amount, book.amount, id FROM book_has_user, book WHERE book_id = id AND book_id = '".$ids[$id_num-1][0]."' AND user_email = '".$_SESSION['uid']."'";

    $result = $conn->query($query);
    $row = $result->fetch_row();

    if ($result->num_rows) {

        $query = "UPDATE book_has_user SET amount = '".($row[0]+$ids[$id_num-1][1])."' WHERE book_id = '".$ids[$id_num-1][0]."' AND user_email = '".$_SESSION['uid']."';";
        $conn->query($query);
        $query = "UPDATE book SET amount = '".($row[1]-$ids[$id_num-1][1])."' WHERE id = '".$row[2]."'";
    } else {

        // 查询出book剩余本数-这次购买的本数，再存储进去
        $query = "SELECT amount FROM book WHERE id = '".$ids[$id_num-1][0]."'";
        $result = $conn->query($query);
        $row = $result->fetch_row();
        $query = "UPDATE book SET amount = '".($row[0]-$ids[$id_num-1][1])."' WHERE id = '".$ids[$id_num-1][0]."'";
        $conn->query($query);
        // 将购买记录插入表中
        $query = "INSERT INTO book_has_user (book_id, user_email, amount) VALUES ('".$ids[$id_num-1][0]."','".$_SESSION['uid']."','".$ids[$id_num-1][1]."');";
    }

    $conn->query($query);
    $id_num--;
    if ($conn->affected_rows > 0) {
        $is_suc = true;
    } else {
        $is_suc = false;
    }

}

if ($is_suc) {
    setcookie("id_num", 0);
    header("location:success.php");
} else {
    header("location:fail.php");
}

$result->free();
$conn->close();