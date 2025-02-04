<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'users';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_error()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (!isset($_POST['name'], $_POST['email'], $_POST['password'])) {
    exit('Empty field(s)');
}
if (empty($_POST['name'] || $_POST['email'] || $_POST['password'])) {
    exit('Field(s) cannot be empty');
}
if ($stmt =  $conn->prepare('SELECT id, password FROM users WHERE name =?')) {
    $stmt->bind_param('s', $_POST['name']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        exit('Name already exists');
    } else {
        if ($stmt = $conn->prepare('INSERT INTO users (name, email, password) VALUES (?,?,?)')) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('sss', $_POST['name'], $_POST['email'], $password);
            $stmt->execute();
            echo 'Registration successful';
        } else {
            echo 'Registration failed';
        }
    }
    $stmt->close();
} else {
    echo 'Registration failed';
}
$con->close();
