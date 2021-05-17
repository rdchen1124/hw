<?php
session_start();
require_once("conn.php");
require_once("utils.php");
if(!empty($conn->error) ){
    echo "連線失敗!!<br>";
}
$username = NULL;
$page = 1;
if(!empty($_GET['page'])){
    $page = (int)$_GET['page'];
}
$limit = 5;
$offset = ($page-1) * $limit;
// 登入成功後，設定 Session 並跳轉回 index.php
if(!empty($_SESSION['username'])){
    $username = $_SESSION['username'];
}

$sql = "SELECT A.id AS id, U.username AS username, U.nickname AS nickname, ".
    "A.title AS title, A.content AS content, A.created_at AS created_at FROM `articles` AS A ".
    "LEFT JOIN `users` AS U ON A.username = U.username WHERE A.is_deleted IS NULL ".
    "ORDER BY A.id DESC LIMIT ?  OFFSET ? ";

$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $limit, $offset);
$result = $stmt->execute();
if(!$result){
    die('Error:'.$conn->error);
}

$result = $stmt->get_result();
?>
<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header></header>
        <?php include_once('header.php'); ?>
        <main>
            <section class="banner">
                <div class="banner__wrapper">
                    <h1>Practice makes perfect!</h1>
                    <div>basic blog demo</div>
                </div>
            </section>
            <?php if(!empty($_GET['errorCode'])) {
                $msg = '';
                $errorCode = $_GET['errorCode'];
                if($errorCode == 1){
                    $msg = '權限不足無法操作';
                }else{
                    $msg = '發生不明錯誤';
                }
                echo '<h2 class="error_code">'.$msg.'</h2>';
            } ?>
            <div class='container__wrapper'>
                <div class='articles'>
                    <?php while($row = $result->fetch_assoc()){ ?>
                        <article class='article'>
                            <div class='article__title'>
                                <div class='article__title_name'><a href='article.php?id=<?php echo $row['id']; ?>'><?php echo escapeChars($row['title']) ?></a></div>
                                <div class='article__edit'>
                                    <?php if($username) {?>
                                        <a class='article__edit-btn' href='edit_article.php?id=<?php echo $row['id']; ?>'>編輯</a>
                                    <?php } ?> 
                                </div>
                            </div>
                            <div class='article__info'>
                                <div><?php echo escapeChars($row['created_at']) ?></div>
                            </div>
                            <div class='article__content'>
                                <?php echo escapeChars($row['content']) ?>
                                <a class='article__read_more' href='article.php?id=<?php echo $row['id']; ?>'>READ MORE</a>
                            </div>
                        </article>
                    <?php } ?>
                </div>
            </div>
        </main>
        <footer><div>Copyright © 2021 Ryan's Blog All Rights Reserved.</div></footer>
    </body>
</html>