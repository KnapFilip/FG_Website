<?php
$servername = "cz1.helkor.eu:3306";
$username = "u1910_4JCGapj8U4";
$password = "bU5mMVFe5!ltGh@UglnHPHKr";
$dbname = "s1910_managment";

// Připojení k databázi
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Chyba připojení: " . $conn->connect_error);
}

// Získání dat z formuláře
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$web_name = $_POST['web_name'] ?? null;
$web_type = $_POST['web_type'] ?? null;
$web_use = $_POST['use'] ?? null;
$colors = $_POST['colors'] ?? null;
$images = $_FILES['images']['name'] ?? null;
$logo = $_FILES['logo']['name'] ?? null;
$pages = $_POST['pages'] ?? null;
$login = isset($_POST['login']) ? 1 : 0;
$admin = isset($_POST['admin']) ? 1 : 0;
$shop = isset($_POST['shop']) ? 1 : 0;
$db_connect = isset($_POST['db']) ? 1 : 0;
$hosting = isset($_POST['hosting']) ? 1 : 0;
$domain = isset($_POST['domain']) ? 1 : 0;
$contact_form = isset($_POST['contact_form']) ? 1 : 0;
$other = $_POST['other'] ?? null;
$other_info = $_POST['other_info'] ?? null;
$subtotal_web = $_POST['subtotal_web'] ?? 0;
$payment = $_POST['payment'];
$gdpr = isset($_POST['gdpr']) ? 1 : 0;
$vos = isset($_POST['vos']) ? 1 : 0;

// Nahrání souborů (obrázky, logo)
$target_dir = "uploads/";
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}
if ($images) {
    move_uploaded_file($_FILES["images"]["tmp_name"], $target_dir . basename($_FILES["images"]["name"]));
}
if ($logo) {
    move_uploaded_file($_FILES["logo"]["tmp_name"], $target_dir . basename($_FILES["logo"]["name"]));
}

// SQL dotaz
$sql = "INSERT INTO objednavky (name, surname, email, phone, address, web_name, web_type, web_use, colors, images, logo, pages, login_form, admin_page, shop, db_connect, hosting, domain, contact_form, other, other_info, subtotal_web, payment, gdpr, vos)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "ssssssssssssiiiiiiissdii",
    $name,
    $surname,
    $email,
    $phone,
    $address,
    $web_name,
    $web_type,
    $web_use,
    $colors,
    $images,
    $logo,
    $pages,
    $login,
    $admin,
    $shop,
    $db_connect,
    $hosting,
    $domain,
    $contact_form,
    $other,
    $other_info,
    $subtotal_web,
    $payment,
    $gdpr,
    $vos
);

if ($stmt->execute()) {
    echo "Objednávka byla úspěšně odeslána!";
} else {
    echo "Chyba při ukládání objednávky: " . $stmt->error;
}

// Uzavření spojení
$stmt->close();
$conn->close();
