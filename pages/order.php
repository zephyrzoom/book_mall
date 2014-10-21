<?php
session_start();
$conn = new mysqli("localhost", "root", "zoom", "book_mall");
if (mysqli_connect_errno()) {
    echo "无法连接数据库";
    exit();
}

$query = "SELECT name, price, book_has_user.amount, picture FROM book_has_user, book WHERE user_email = '".$_SESSION['uid']."' AND book_id = id";
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

    <title>购物车</title>

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
        <h1 class="panel-title">已买到的图书</h1>
    </div>
    <div class="panel-body">


        <!--<h1 class="header">搜索结果</h1>

        <hr class="featurette-divider">-->
        <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="marketing">

            <div>
                <?php
                if (count($rows) > 0) {
                ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>序号</th>
                        <th></th>
                        <th>书名</th>
                        <th>价格</th>
                        <th>数量</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    // 序号
                    $i=1;
                    foreach($rows as $row) {
                    ?>

                    <tr>
                        <td><?php echo $i ?></td>
                        <td><img class="img-rounded"
                                 src="<?php echo $row[3] ?>"
                                 alt="Generic placeholder image" style="width: 50px; height: 50px;"></td>
                        <td><?php echo $row[0] ?></td>
                        <td>￥<?php echo $row[1] ?></td>
                        <td><?php echo $row[2] ?></td>
                    </tr>
                    <?php
                    $i++;
                    } ?>
                    </tbody>
                </table>
                <?php } ?>
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
