<?php
require 'function.php';

session_start();

if (isset($_SESSION["id"])) {
    header("Location: profile.php");
    exit; 
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM registered_data where username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss",$username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            header("Location: php/profile.php");
            exit;
        }
    }

    $stmt->close();
}
?>