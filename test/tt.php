<?php
/**
 * Created by PhpStorm.
 * User: zephyr
 * Date: 10/19/14
 * Time: 1:04 AM
 */
header("Content-type: text/html; charset=utf-8");

$conn = new mysqli("localhost", "root", "zoom", "book_mall");
if (mysqli_connect_errno()) {
    echo "无法连接数据库";
    exit();
}
echo 1;
$query = "SELECT name, price, picture FROM book LIMIT 9";

$result = $conn->query($query);
$rows[9];
for ($i=0; $i < 9; $i++) {
    $rows[$i] = $result->fetch_row();
    echo $rows[$i][1];
    var_dump($rows[$i]);
}



$result->free();
$conn->close();