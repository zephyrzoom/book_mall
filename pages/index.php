<?php
header("Content-type: text/html; charset=utf-8");

$conn = new mysqli("localhost", "root", "zoom", "book_mall");
if (mysqli_connect_errno()) {
    echo "无法连接数据库";
    exit();
}
$query = "SELECT name, price, picture, id FROM book ORDER BY id DESC LIMIT 9";
$result = $conn->query($query);

for ($i=0; $i < 9; $i++) {
    $rows[$i] = $result->fetch_row();
}

$result->free();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>网上书店</title>

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
<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <img src="../img/f5.jpg" alt="First slide">

            <div class="container">
                <div class="carousel-caption">
                    <p><a class="btn btn-lg btn-primary" href="detail.php?id=<?php echo $rows[0][3] ?>" role="button">查看更多</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="../img/f6.jpg"
                 alt="Second slide">

            <div class="container">
                <div class="carousel-caption">
                    <p><a class="btn btn-lg btn-primary" href="detail.php?id=<?php echo $rows[1][3] ?>" role="button">查看更多</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="../img/f8.jpg"
                 alt="Third slide">

            <div class="container">
                <div class="carousel-caption">
                    <p><a class="btn btn-lg btn-primary" href="detail.php?id=<?php echo $rows[2][3] ?>" role="button">查看更多</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span
            class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span
            class="glyphicon glyphicon-chevron-right"></span></a>
</div>
<!-- /.carousel -->

<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">


    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-md-4">
            <img class="img-rounded"
                 src="<?php echo $rows[3][2] ?>"
                 alt="Generic placeholder image" style="width: 300px; height: 300px;">

            <h3><?php echo $rows[3][0] ?></h3>

            <h3>￥<?php echo $rows[3][1] ?></h3>

            <p><a class="btn btn-default" href="detail.php?id=<?php echo $rows[3][3] ?>" role="button">查看更多 &raquo;</a></p>
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-md-4">
            <img class="img-rounded"
                 src="<?php echo $rows[4][2] ?>"
                 alt="Generic placeholder image" style="width: 300px; height: 300px;">

            <h3><?php echo $rows[4][0] ?></h3>

            <h3>￥<?php echo $rows[4][1] ?></h3>

            <p><a class="btn btn-default" href="detail.php?id=<?php echo $rows[4][3] ?>" role="button">查看更多 &raquo;</a></p>
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-md-4">
            <img class="img-rounded"
                 src="<?php echo $rows[5][2] ?>"
                 alt="Generic placeholder image" style="width: 300px; height: 300px;">

            <h3><?php echo $rows[5][0] ?></h3>

            <h3>￥<?php echo $rows[5][1] ?></h3>

            <p><a class="btn btn-default" href="detail.php?id=<?php echo $rows[5][3] ?>" role="button">查看更多 &raquo;</a></p>
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-4">
            <img class="img-rounded"
                 src="<?php echo $rows[6][2] ?>"
                 alt="Generic placeholder image" style="width: 300px; height: 300px;">

            <h3><?php echo $rows[6][0] ?></h3>

            <h3>￥<?php echo $rows[6][1] ?></h3>

            <p><a class="btn btn-default" href="detail.php?id=<?php echo $rows[6][3] ?>" role="button">查看更多 &raquo;</a></p>
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-md-4">
            <img class="img-rounded"
                 src="<?php echo $rows[7][2] ?>"
                 alt="Generic placeholder image" style="width: 300px; height: 300px;">

            <h3><?php echo $rows[7][0] ?></h3>

            <h3>￥<?php echo $rows[7][1] ?></h3>

            <p><a class="btn btn-default" href="detail.php?id=<?php echo $rows[7][3] ?>" role="button">查看更多 &raquo;</a></p>
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-md-4">
            <img class="img-rounded"
                 src="<?php echo $rows[8][2] ?>"
                 alt="Generic placeholder image" style="width: 300px; height: 300px;">

            <h3><?php echo $rows[8][0] ?></h3>

            <h3>￥<?php echo $rows[8][1] ?></h3>

            <p><a class="btn btn-default" href="detail.php?id=<?php echo $rows[8][3] ?>" role="button">查看更多 &raquo;</a></p>
        </div>
        <!-- /.col-lg-4 -->
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

</div>
<!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>