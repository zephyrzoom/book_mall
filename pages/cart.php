<?php
// 检查cookie中是否有商品
if (!isset($_COOKIE['id_num'])) {
    $id_num = 0;
} else {
    $id_num = $_COOKIE['id_num'];
    // ids[id][amount]
    $ids = $_COOKIE['id'];
}

// 是添加商品到购物车还是直接查看购物车
if (isset($_GET['id'])) {
    // 判断id是否已经存在
    $id_num_tmp = $id_num;
    while ($id_num_tmp > 0) {
        if ($ids[$id_num_tmp-1][0] == $_GET['id']) {
            $had_id_pos = $id_num_tmp-1;
            break;
        }
        $id_num_tmp--;
    }

    // 判断出购买数量
    if (isset($_POST['amount'])) {
        $amount = $_POST['amount'];
    } else {
        $amount = 1;
    }

    // 将已有id的商品直接加上数量就行，第一次添加的商品添加所有信息
    if (isset($had_id_pos)) {
        $ids[$had_id_pos][1] += $amount;
        setcookie("id[$had_id_pos][1]", $ids[$had_id_pos][1]);
    } else {
        $ids[$id_num][0] = $_GET['id'];
        $ids[$id_num][1] = $amount;

        setcookie("id[$id_num][0]", $_GET['id']);
        setcookie("id[$id_num][1]", $amount);

        $id_num++;
        setcookie('id_num', $id_num);
    }
}

// 拼接id到sql
$query = "SELECT * FROM book WHERE id IN (";

$id_num_tmp = 0;
while ($id_num_tmp < $id_num) {
    $query.=$ids[$id_num_tmp][0].",";
    $id_num_tmp++;
}

// 去掉最后的,
$query = substr($query, 0, strlen($query)-1);

// 查询结果排序
$query.=") ORDER BY field(id";
$id_num_tmp = 0;
while ($id_num_tmp < $id_num) {
    $query.=",".$ids[$id_num_tmp][0];
    $id_num_tmp++;
}
$query.=")";

if ($id_num > 0) {
    // 连数据库
    $conn = mysqli_connect('localhost', 'root', 'zoom', 'book_mall');

    $result = $conn->query($query);

    $i = 0;
    do {
        $rows[$i] = $result->fetch_row();
        $i++;
    } while ($rows[$i - 1] != null);
    unset($rows[$i - 1]);

    $result->free();
    $conn->close();
}
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
        <h1 class="panel-title">购物车</h1>
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
                if ($id_num > 0) {
                ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>序号</th>
                        <th></th>
                        <th>书名</th>
                        <th>价格</th>
                        <th>数量</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    // 序号
                    $i=1;
                    // 总金额
                    $sum=0;

                    foreach($rows as $row) {
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><img class="img-rounded"
                                 src="<?php echo $row[5] ?>"
                                 alt="Generic placeholder image" style="width: 50px; height: 50px;"></td>
                        <td><?php echo $row[0] ?></td>
                        <td><?php echo $row[1] ?></td>
                        <td><?php echo $ids[$i-1][1] ?></td>
                        <td><a href="delete_cart.php?num=<?php echo $i ?>">删除</a></td>
                    </tr>
                    <?php
                        $sum += $row[1] * $ids[$i-1][1];
                        $i++;
                    } ?>
                    <tr>
                        <td colspan="3"></td>
                        <td>合计</td>
                        <td>￥<?php echo $sum ?></td>
                        <td><a href="buy.php" class="btn btn-primary">结算</a></td>
                    </tr>
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
