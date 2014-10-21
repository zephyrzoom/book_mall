<?php header("Content-type: text/html; charset=utf-8");
/**
 * Created by PhpStorm.
 * User: zephyr
 * Date: 10/17/14
 * Time: 11:10 PM
 */
$mysqli = new mysqli("localhost", "root", "zoom", "book_mall");
if (mysqli_connect_errno()) {
    echo "无法连接数据库";
    exit();
} else {
    echo "连接成功";
}
$query = "
UPDATE `book_mall`.`book` SET `name`='陪孩子走过3岁叛逆期', `description`='《宝贝世界》前主编、辣妈帮主编褚宇霞，贝瓦网总编辑龚菲菲倾情推荐。孩子上幼儿园，妈妈必读的教养宝典！解决孩子独立自理、人际交往、分离焦虑等入园难题的家教智慧。' WHERE `id`='11';

";
$result = $mysqli->query($query);

echo $mysqli->affected_rows;

$result->free();
$mysqli->close();

//UPDATE `book_mall`.`book` SET `name`='愿你成为自己喜欢的样子', `description`='不管外面天气怎样，别忘了带上自己的阳光，愿我们成为自己喜欢的样子，不畏将来不念过去，以自己喜欢的方式过一生。伊能静、蔡康永温情推荐。全彩印刷，精致装帧。白马时光' WHERE `id`='3';
//UPDATE `book_mall`.`book` SET `name`='我爱幼儿园', `description`='幼儿园入学准备第一书，畅销法国十余年的大师经典绘本。献给所有即将走进幼儿园的孩子，以及所有爱幼儿园和不爱幼儿园的孩子。' WHERE `id`='5';
//UPDATE `book_mall`.`book` SET `name`='你的孤独，虽败犹荣', `description`='刘同2014全新作品，谁的青春不迷茫系列 ，愿你比别人更不怕一个人独处，愿日后谈起时你会被自己感动。当当网”同学们“有福利啦，凡预售期订购即有机会获得首版全款明信片！（共6张）' WHERE `id`='6';
//UPDATE `book_mall`.`book` SET `name`='大萝卜和难挑的鳄梨', `description`='村上春树最新作品，《达文西》“年度散文”第1名，画家大桥步精心配配制插图' WHERE `id`='7';
//UPDATE `book_mall`.`book` SET `name`='梅格时空大冒险', `description`='世界儿童文学史上家喻户晓、不可逾越的经典！国际安徒生奖、纽伯瑞儿童文学金奖作品！两大青少年文学最高奖项获得者马德琳·英格的巅峰代表作！一部科幻大作，一部成长寓言！' WHERE `id`='8';
//UPDATE `book_mall`.`book` SET `name`='丑陋的中国人', `description`='全新精装版（三部曲）强势归来！当当五星级畅销图书！一针见血地指出中国人丑陋面的真知灼见。 中国五千年的“优秀传统文化”第一次受到严厉检讨。痛心中国的“酱缸文化' WHERE `id`='9';
//UPDATE `book_mall`.`book` SET `name`='我们都是突然长大的', `description`='豆瓣最受读者喜爱的人气作者艾小玛，治愈无数心灵的励志随笔集，暖萌上市！总有一些伤痛让那些男孩女孩一夜长大' WHERE `id`='10';
//UPDATE `book_mall`.`book` SET `name`='陪孩子走过3岁叛逆期', `description`='《宝贝世界》前主编、辣妈帮主编褚宇霞，贝瓦网总编辑龚菲菲倾情推荐。孩子上幼儿园，妈妈必读的教养宝典！解决孩子独立自理、人际交往、分离焦虑等入园难题的家教智慧。' WHERE `id`='11';
