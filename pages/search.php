<?php
$keyword = $_GET[keyword];

$conn = new mysqli("localhost", "root", "zoom", "book_mall");
if (mysqli_connect_errno()) {
    echo "无法连接数据库";
    exit();
}

$query = "SELECT * FROM book WHERE name LIKE '%$keyword%'";
$result = $conn->query($query);

$i = 0;
do {
    $rows[$i] = $result->fetch_row();
    $i++;
} while ($rows[$i-1] != null);
unset($rows[$i-1]);

$result->free();
$conn->close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>搜索</title>

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
        <h1 class="panel-title">搜索结果</h1>
    </div>
    <div class="panel-body">

        <div class="marketing">

            <?php
            foreach ($rows as $row) {
            ?>
            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-md-4">
                    <img class="img-rounded"
                         src="<?php echo $row[5] ?>"
                         alt="Generic placeholder image" style="width: 180px; height: 180px;">
                </div>
                <div class="col-md-8">
                    <h4><a href="detail.php?id=<?php echo $row[4] ?>"><?php echo $row[0] ?></a></h4>

                    <h4>￥<?php echo $row[1] ?></h4>

                    <p><a class="btn btn-primary <?php if ($row[3] < 1) echo disabled ?>" href="cart.php?id=<?php echo $row[4] ?>" role="button">加入购物车</a></p>
                </div>
            </div>
            <hr>
            <?php } ?>

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
