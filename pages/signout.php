<?php
/**
 * Created by PhpStorm.
 * User: zephyr
 * Date: 10/18/14
 * Time: 11:03 PM
 */
session_start();
unset($_SESSION['uid']);
session_destroy();
header("location:index.php");