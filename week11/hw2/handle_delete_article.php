<?php 
session_start();
require_once('conn.php');
require_once('check_permission.php');

$id = NULL;
if(!empty($_GET['id'])){
    $id = (int)$_GET['id'];
}
$sql = "UPDATE `articles` SET is_deleted = ? WHERE id = ? ";
$is_deleted = 1;
$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $is_deleted, $id);
$result = $stmt->execute();
// check if sql has error then die error
if(!$result){
    die('Error:'.$conn->error);
}
// if execute sql success, redirection to index page
header('Location:admin.php');
?>