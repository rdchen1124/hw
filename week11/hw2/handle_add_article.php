<?php 
session_start();
require_once('conn.php');
if(empty($_POST['title']) || empty($_POST['content'])){
    header('Location:add_article.php?errorCode=1');
}
$title = $_POST['title'];
$content = $_POST['content'];

// insert new data by username
$username = NULL;
if(!empty($_SESSION['username'])){
    $username = $_SESSION['username'];
}


$sql = "INSERT INTO `articles`(username, title, content) VALUES ( ? , ? , ? )";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sss', $username, $title, $content);
$result = $stmt->execute();
// check if sql has error then die error
if(!$result){
    die('Error:'.$conn->error);
}
// if execute sql success, redirection to index page
header('Location:index.php');
?>