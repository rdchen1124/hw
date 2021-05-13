<?php 
session_start();
require_once('conn.php');
if(empty($_POST['username']) || empty($_POST['password'])){
    
    header('Location:hash_pwd.php?errorCode=1');

}
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// check username & password in users
$sql = "UPDATE `users` SET password = ? WHERE username = ? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $password, $username);
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

header('Location:index.php');
?>