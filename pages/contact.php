<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>反馈</title>

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
        <h1 class="panel-title">意见和反馈</h1>
    </div>
    <div class="panel-body">

        <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-9">
                    <form role="form" method="post" action="contacted.php">
                    <h4>主题</h4>
                    <input name="theme" class="form-control" type="text" required>
                    <h4>内容</h4>
                    <textarea name="content" class="form-control" rows="5" required>
                    </textarea>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">确认</button>
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
