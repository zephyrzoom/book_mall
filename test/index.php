<?php
/**
 * Created by PhpStorm.
 * User: zephyr
 * Date: 10/10/14
 * Time: 10:16 PM
 */
header("Content-type: text/html; charset=utf-8");
echo "hello world";
echo $_SERVER['HTTP_USER_AGENT'];
if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') != false) {
    echo 'it\'s firefox browser';
} else {
    echo 'this is other browser';
}
?>

<form action="action.php" method="post">
    <p>姓名：<input type="text" name="name" /></p>
    <p>年龄：<input type="text" name="age" /></p>
    <p><input type="submit" /></p>
</form>

<?php
$a = 11;
echo gettype($a);
settype($a, string);
echo gettype($a);

echo floor((0.1+0.7)*10);

echo "This works: {$arr['foo'][3]}";

error_reporting(E_ALL);

echo '今天';