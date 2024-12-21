<?php 
$name = $_POST['name'];
$email = $_POST['email'];
$password =  $_POST['password'];

//data base connection

$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
    die('connection failed: ' . $conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into register(name, email, password) value(?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);
    $stmt->execute();

    echo "Registration succefully...";

    $stmt -> close();
    $conn -> close();
}
?>