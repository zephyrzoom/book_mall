<?php
/**
 * Created by PhpStorm.
 * User: zephyr
 * Date: 10/20/14
 * Time: 11:00 PM
 */

$ids = $_COOKIE['id'];
$id_num = $_COOKIE['id_num'];

// 要删除的序号
$num = $_GET['num'];
while ($num < $id_num) {
    setcookie("id[$num-1][0]", $ids[$num][0]);
    setcookie("id[$num-1][1]", $ids[$num][1]);
    $num++;
}

setcookie('id_num', $_COOKIE['id_num']-1);

header("location:cart.php");