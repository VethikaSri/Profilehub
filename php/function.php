<?php 

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "test2", "profilehub");

if ($conn->connect_error) {
    die("Connection Error: " . $conn->connect_error);
}

if (isset($_POST["action"])) {
    if ($_POST["action"] == "register") {
        register();
    } else if ($_POST["action"] == "login") {
        login();
    }
}

function register() {
    global $conn;
    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $lname = $_POST["lname"];
    $birthDate = $_POST["birthDate"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $pincode = $_POST["pincode"];
    $email = $_POST["email"];
    $mob_no = $_POST["mob_no"];
    $profession = $_POST["prof"];
    $linkedin = $_POST["linkedin"];
    $github = $_POST["github"];
    $website = $_POST["website"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $re_password = $_POST["re_pwd"]; 

    if (empty($fname) || empty($mname) || empty($lname) || empty($birthDate) || empty($gender) || 
        empty($address) || empty($city) || empty($pincode) || empty($email) || empty($mob_no) || empty($profession) || empty($linkedin) || empty($github) || empty($website) || empty($username) || empty($password) || empty($re_password)) {
        echo "Please fill the form completely";
        exit;
    }

    
    if ($password !== $re_password) {
        echo "Passwords do not match!";
        exit;
    }

    // Check for existing username
    $stmt = $conn->prepare("SELECT * FROM registered_data WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Username has already been taken";
        exit;
    }

    

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $conn->prepare("INSERT INTO registered_data (fname, mname, lname, birthDate, gender, address, city, pincode, email, mob_no, profession, linkedin, github, website, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssssss", $fname, $mname, $lname, $birthDate, $gender, $address, $city, $pincode, $email, $mob_no, $profession, $linkedin, $github, $website, $username, $hashedPassword);

    if ($stmt->execute()) {
        echo "Registration Successful";
    } else {
        echo "Registration Failed";
    }

    $stmt->close();
    $conn->close();
}

function login() {
    global $conn;
    $username = isset($_POST["username"]) ? $_POST["username"] : null;
    $password = isset($_POST["password"]) ? $_POST["password"] : null;

    // Check for empty fields
    if (empty($username) || empty($password)) {
        echo "Please enter username and password.";
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM registered_data WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $hashedPassword = $user['password'];

        // Validate password
        if (password_verify($password, $hashedPassword)) {
            $_SESSION["id"] = $user['id'];
            echo "Login successful!";
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not registered!";
    }

    $stmt->close();
}
?>