<?php
    session_start();
    require_once("conn.php");
    require_once("utils.php");
    require_once('check_permission.php');
    $id = $_GET['id'];
    $username = $_SESSION['username'];
    
    $sql = "SELECT title, content FROM `articles` WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $result = $stmt->execute();
    if(!$result){
        die("Error : ".$conn->error);
    }
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
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

            <div class='container__wrapper'>
                <div class='login__container'>
                    <form class='add_article__form' method='POST' action='handle_edit_article.php'>
                        <h1>編輯文章</h1>
                        <?php
                            if(!empty($_GET['errorCode'])){
                                $err = $_GET['errorCode'];
                                $msg = '';
                                if($err == '1'){
                                    $msg = '資料有缺失';
                                }
                                if($err == '2'){
                                    $msg = '編輯文章失敗';
                                }
                                echo "<h2 class='error_code'>".$msg."</h2>";
                            }
                        ?>
                        <div class='add_article__form-input'>
                            <span>標題 : </span><input name='title' type='text' value='<?php echo escapeChars($row['title']) ?>' />
                        </div>
                        <span>內容 : </span>
                        <textarea name='content'> <?php echo escapeChars($row['content']) ?> </textarea>
                        <input type='hidden' name='id' value='<?php echo $id; ?>' />
                        <input class='login__sub-btn' type='submit' value='送出' />
                    </form>
                </div>
            </div>
        </main>
        <footer><div>Copyright © 2021 Ryan's Blog All Rights Reserved.</div></footer>
    </body>
</html>