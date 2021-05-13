<?php 
session_start();
require_once('conn.php');
if(empty($_POST['username']) || empty($_POST['password'])){
    
    header('Location:login.php?errorCode=1');

}
$username = $_POST['username'];
$password = $_POST['password'];
// check username & password in users
$sql = "SELECT * FROM `users` WHERE username = ? AND password = ? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $username, $password);
$result = $stmt->execute();
// check if sql has error or not
if(!$result){
    die('Error:'.$conn->error);
}

//check if sql is match
$result = $stmt->get_result();
if($result->num_rows === 0){
    header('Location:login.php?errorCode=2');
}

$_SESSION['username'] = $username;
header('Location:index.php');
// echo "username : ".$_SESSION['username'];
?>