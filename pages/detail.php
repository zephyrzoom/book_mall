<?php
header("Content-type: text/html; charset=utf-8");

$conn = new mysqli("localhost", "root", "zoom", "book_mall");
if (mysqli_connect_errno()) {
    echo "无法连接数据库";
    exit();
}

$query = "SELECT * FROM book WHERE id = '$_GET[id]'";
$result = $conn->query($query);
$row = $result->fetch_row();

$result->free();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>图书</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="index.css" rel="stylesheet">
</head>
<!-- NAVBAR
================================================== -->
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
<div class="panel panel-primary">
    <div class="panel-heading">
        <h1 class="panel-title">图书</h1>
    </div>
    <div class="panel-body">

        <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-md-4">
                    <img class="img-rounded"
                         src="<?php echo $row[5] ?>"
                         alt="Generic placeholder image" style="width: 300px; height: 300px;">
                </div>
                <div class="col-md-6">
                    <form role="form" action="cart.php?id=<?php echo $row[4] ?>" method="post">
                    <h3><?php echo $row[0] ?></h3>
                    <p><?php echo $row[2] ?></p>
                    <h4>定价：<span>￥<?php echo $row[1] ?></span></h4>
                    <div class="input-group">
                        <div class="input-group-addon">数量：</div>
                        <input name="amount" class="form-control" type="text" value="1">
                        <div class="input-group-addon">本</div>
                    </div>
                        <button class="btn btn-primary <?php if ($row[3] < 1) echo disabled ?>" type="submit" >加入购物车</button>
                    </form>
                </div>
                <!-- /.col-lg-4 -->
            </div>
</div>
    </div>
</div>


<hr>

<!-- FOOTER -->

<div class="footer">
    <div class="container">
        <p class="pull-right"><a href="#">向上</a></p>

        <p class="text-muted text">&copy; 2014 郑泽奇 &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a>
        </p>
    </div>
</div>


<!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
