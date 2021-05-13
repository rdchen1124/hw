<?php 
session_start();
require_once('conn.php');
if(empty($_POST['username']) || empty($_POST['password'])){
    
    header('Location:login.php?errorCode=1');

}
$username = $_POST['username'];
$password = $_POST['password'];
// get user info from username
$sql = "SELECT * FROM `users` WHERE username = ? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $username);
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

// get password and verify it
$row = $result->fetch_assoc();
if (password_verify($password, $row['password'])){
    $_SESSION['username'] = $username;
    header('Location:index.php');
}else{
    header('Location:login.php?errorCode=2');
}
?>