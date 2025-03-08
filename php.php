<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Jméno: " . $_POST['name'] . "<br>";
    echo "Příjmení: " . $_POST['surname'] . "<br>";
    echo "Email: " . $_POST['email'] . "<br>";
    echo "Telefon: " . $_POST['phone'] . "<br>";
    echo "Adresa: " . $_POST['address'] . "<br>";
}
