<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>成功</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="signup.css" rel="stylesheet">
    <link href="index.css" rel="stylesheet">
</head>
<body>
<div class="navbar-wrapper">
    <div class="container">
        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">网上书店</a>
                </div>
                <div class="navbar-collapse collapse">
                    <form class="navbar-form navbar-left" role="form" action="search.php" method="get">
                        <input name="keyword" type="text" placeholder="搜索" class="form-control">
                        <button type="submit" class="btn btn-success">搜索</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">

                        <?php
                        session_start();
                        if (isset($_SESSION['uid'])) { ?>
                        <li><a href="order.php" target="_self"><?php echo $_SESSION['uid'] ?></a></li>
                        <li><a href="signout.php">退出</a></li>
                        <?php } else { ?>
                        <li><a href="signin.html" target="_self">登录</a></li>
                        <li><a href="signup.html" target="_self">注册</a></li>
                        <?php } ?>

                        <li><a href="cart.php">购物车</a></li>
                        <li><a href="contact.php">反馈</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="page-header">
        <h1>提示</h1>
    </div>
    <div class="alert alert-success" role="alert">
        <h4><strong>操作成功！</strong></h4>
    </div>
</div>
<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>