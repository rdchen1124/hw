<?php
// session_start();
require_once('conn.php');

function getUserFromUsername($username){
    global $conn;
    $sql = "SELECT * FROM `users` WHERE username = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $result = $stmt->execute();
    if(!$result){
        die("Error : ".$conn->error);
    }
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row;
}

function escapeChars($string){
    $string = htmlspecialchars($string, ENT_QUOTES);
    return $string;
}

?>