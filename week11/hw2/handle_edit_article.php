<?php 
session_start();
require_once('conn.php');
if(empty($_POST['title']) || empty($_POST['content']) || empty($_POST['id'])){
    header('Location:edit_article.php?errorCode=1');
}
$id = (int)$_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];

// insert new data by username
$username = NULL;
if(!empty($_SESSION['username'])){
    $username = $_SESSION['username'];
}


$sql = "UPDATE `articles` SET title = ? ,content = ? WHERE id = ? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ssi', $title, $content, $id);
$result = $stmt->execute();
// check if sql has error then die error
if(!$result){
    die('Error:'.$conn->error);
}
// if execute sql success, redirection to index page
header('Location:index.php');
?>