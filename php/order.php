<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

set_time_limit(300);  // Nastaví maximální dobu běhu na 5 minut (300 sekund)

// Nastavení pro PHP (některé hodnoty pro MySQL připojení)
ini_set('mysqli.max_allowed_packet', '67108864');  // pro 64 MB
ini_set('mysqli.wait_timeout', '300');  // pro 5 minut

$servername = "cz1.helkor.eu:2022";
$username = "u1910_4JCGapj8U4";
$password = "bU5mMVFe5!ltGh@UglnHPHKr";
$dbname = "s1910_managment";

try {
    // Vytvoření připojení k databázi pomocí PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Nastavení chybového režimu pro výjimky
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Pokud dojde k chybě při připojení
    die("Connection failed: " . $e->getMessage());
}

// Funkce pro kontrolu checkboxu (zaškrtnutý/ně)
function checkbox_value($checkbox_name)
{
    return isset($_POST[$checkbox_name]) ? 'Ano' : 'Ne';
}

// Kontrola, zda byl formulář odeslán
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ověření, že všechny povinné údaje byly vyplněny
    $name = $_POST['name'] ?? '';
    $surname = $_POST['surname'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $payment = $_POST['payment'] ?? '';

    // Další hodnoty objednávky
    $web_name = $_POST['web_name'] ?? '';
    $web_type = $_POST['web_type'] ?? '';
    $web_use = $_POST['web_use'] ?? '';

    // Získání hodnoty pro total_price a odstranění "Kč"
    if (isset($_POST['total_price']) && !empty($_POST['total_price'])) {
        $total_price = str_replace(' Kč', '', $_POST['total_price']);
        $total_price = floatval($total_price);
    } else {
        $total_price = 0.00;  // nebo jiná výchozí hodnota
    }

    // Získání hodnoty pro checkboxy
    $login = checkbox_value('login');
    $admin = checkbox_value('admin');
    $shop = checkbox_value('shop');
    $db = checkbox_value('db');
    $hosting = checkbox_value('hosting');
    $domain = checkbox_value('domain');
    $contact_form = checkbox_value('contact_form');

    // Připravení SQL dotazu pro vložení objednávky do databáze s připraveným dotazem
    $stmt = $conn->prepare("INSERT INTO orders (name, surname, email, phone, address, web_name, web_type, web_use, total_price, payment, login, admin, shop, db, hosting, domain, contact_form) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die('Chyba v přípravě dotazu: ' . $conn->error);
    }

    // Bind parametrů pro připravený dotaz
    $stmt->bind_param("sssssssssssssdssss", $name, $surname, $email, $phone, $address, $web_name, $web_type, $web_use, $total_price, $payment, $login, $admin, $shop, $db, $hosting, $domain, $contact_form);

    // Spuštění dotazu
    if ($stmt->execute()) {
        // Odeslání emailu potvrzení na zákazníkovu emailovou adresu
        $subject = "Potvrzení objednávky";
        $message = "Děkujeme za vaši objednávku. Podrobnosti o objednávce:\n\n"
            . "Jméno: $name $surname\n"
            . "Email: $email\n"
            . "Telefon: $phone\n"
            . "Adresa: $address\n"
            . "Typ webu: $web_type\n"
            . "Cena: $total_price Kč\n"
            . "Způsob platby: $payment\n"
            . "Login/Registrace: $login\n"
            . "Admin stránka: $admin\n"
            . "E-shop: $shop\n"
            . "Propojení s databází: $db\n"
            . "Zajištění hostingu: $hosting\n"
            . "Zajištění domény: $domain\n"
            . "Kontaktní formulář: $contact_form\n\nDěkujeme, že jste si vybrali naše služby!";
        $headers = "From: info@knapf.eu";

        // Odeslání emailu
        mail($email, $subject, $message, $headers);

        // Zobrazení okna s potvrzením
        echo "<script>alert('Objednávka úspěšně odeslána');</script>";
    } else {
        // Zobrazení chybového hlášení
        echo "<script>alert('Došlo k chybě při odesílání objednávky: " . $stmt->error . "');</script>";
    }

    // Zavření připraveného dotazu a připojení k databázi
    $stmt->close();
    $conn->close();
}
