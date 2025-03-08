<?php
$servername = "cz1.helkor.eu:3306"; // Nebo IP serveru
$username = "u1910_4JCGapj8U4";
$password = "bU5mMVFe5!ltGh@UglnHPHKr";
$database = "s1910_managment";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Připojení selhalo: " . $conn->connect_error);
}
echo "Připojení úspěšné!";
$conn->close();
