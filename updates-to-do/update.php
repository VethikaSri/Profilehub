<?php
session_start();
require 'function.php';


if(!isset($_SESSION['id'])){
    header("Location: ../login.html");
    exit;
}


$id = $_SESSION["id"];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$profession = $_POST['prof'];
$linkedin = $_POST['linkedin'];
$github = $_POST['github'];
$website = $_POST['website'];
$address = $_POST['address'];
$city = $_POST["city"];
$pincode = $_POST["pincode"];
$mob_no = $_POST['mob_no'];
$email = $_POST['email'];
$birthDate = $_POST['birthDate'];
$gender = $_POST['gender'];


$stmt = $conn->prepare("UPDATE registered_data SET fname=?, mname=?, lname=?, profession=?, linkedin=?, github=?, website=?, address=?, mob_no=?, email=?, birthDate=?, gender=? WHERE id=?");
$stmt->bind_param("ssssssssssssi", $fname, $mname, $lname, $profession, $linkedin, $github, $website, $address, $mob_no, $email, $birthDate, $gender, $id);
$stmt->execute();

$skills = $_POST['skills']; 
$progress = $_POST['progress']; 
foreach ($skills as $index => $skill) {
    $prog = $progress[$index];
    $stmt = $conn->prepare("REPLACE INTO user_skills (user_id, skill, progress) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $id, $skill, $prog);
    $stmt->execute();
}


$projects = $_POST['projects']; 
foreach ($projects as $project) {
    $stmt = $conn->prepare("REPLACE INTO user_projects (user_id, project) VALUES (?, ?)");
    $stmt->bind_param("is", $id, $project);
    $stmt->execute();
}

?>

