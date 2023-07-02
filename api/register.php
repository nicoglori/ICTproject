<?php 

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "progettoIct";

// connect to db
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// get user data
$surname = $_POST["surname"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

// hash the password 
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// CHECK IF USERNAME ALREADY EXISTS
$sql = "SELECT * FROM USERS WHERE username = ?";

// prepared statement
$stmt = $conn->prepare($sql);

// bind parameters
$stmt->bind_param("s", $username);
$stmt->execute();


if ($stmt->affected_rows == -1) {
    $_SESSION['alert_message'] = 'Username già presente!';
    header("location: ../index.php");
    exit;
} 

$stmt->close();


$sql = "INSERT INTO users (surname, username, email, password) VALUES (?, ?, ?, ?)";

// prepared statement
$stmt = $conn->prepare($sql);

// bind parameters
$stmt->bind_param("ssss", $surname, $username, $email, $hashedPassword);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $_SESSION['alert_message'] = 'Registrazione avvenuta con successo';
} else {
    $_SESSION['alert_message'] = 'Spiacente, si è verificato un errore';
}

$stmt->close();
$conn->close();



header("location: ../index.php");


?>