<?php header("Content-type: text/html; charset=utf-8");?>
你好，<?php echo htmlspecialchars($_POST['name']); ?>。
你 <?php echo (int)$_POST['age']; ?> 岁了。