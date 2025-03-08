<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="images/logo.png">
    <link rel="stylesheet" href="css/eshop.css">
    <title>E-Shop</title>
    <link rel="icon" type="image/png" href="images/logo_FG.png">
</head>
<header>
    <h1>Filip Knap</h1>
    <nav class="nav">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="Me.html">O mě</a></li>
            <li><a href="Projects.html">Projekty</a></li>
            <li><a href="Contact.html">Kontakt</a></li>
            <li><a class="active" href="eshop.php">E-shop</a></li>
            <li><a href="price_page.html">Ceník</a></li>
            <button class="log-reg" style="margin: 1%;"><a href="wip.html" style="color: rgb(255, 255, 255); text-decoration: none;">Přihlásit se</a></button>
            <button class="log-reg"><a href="wip.html" style="color: rgb(255, 255, 255); text-decoration: none;">Vytvořit účet</a></button>
        </ul>
    </nav>
</header>
<br>
<br>

<body>
    <div class="eshop">
        <div class="uvod">
            <h2>E-Shop</h2>
            <p>Vítejte na mém E-shopu. Kde si můžete objednat tvorbu webu a to v HTML, CSS, PHP, Javascriptu a databází (MySQL) <br> vše na míru podle toho co si budete přát.</p>
            <br>
            <p>Přijímám aktuálně další práci: <img src="images/yes.png" alt="Ano" width="20px" height="20px"></p>
            <p>Termín dodání: Mezi 2 až 8 týdny</p>
            <p>Všechny objednávky jsou řešeny přes discord nebo email. Do budoucna bude možnost přímo na webu</p>
        </div>
    </div>
    <br>
    <br>
    <div class="sluzby">
        <h2>Nabízené služby</h2>
        <p>Pokud máte zájem o jakoukoliv službu níže stačí mě kontaktovat přes objednávkový formulář níže.</p>
        <div class="web">
            <h3>Web</h3>
            <p>Tvorba webu v HTML, CSS, PHP, Javascriptu a databází (MySQL) na míru. Všechny věci s vámi zkonzultuji a případně vám poradím jak to udělat jinak nebo efektivněji.</p>
        </div>
    </div>
    <div class="order_form">
        <h2>Objednávkový formulář</h2>
        <form action="php/order.php" method="post" class="Contact" enctype="multipart/form-data">
            <h3>Kontaktní údaje</h3>
            <label for="name">Jméno</label><br>
            <input type="text" id="name" name="name" required placeholder="Filip"><br>

            <label for="surname">Příjmení</label><br>
            <input type="text" id="surname" name="surname" required placeholder="Knap"><br>

            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" required placeholder="KnapFilip@email.cz"><br>

            <label for="phone">Telefon</label><br>
            <input type="tel" id="phone" name="phone" required placeholder="+420 731 XXX 329"><br>

            <label for="address">Adresa</label><br>
            <input type="text" id="address" name="address" required placeholder="Ulice, Číslo popisné, Město, směrovací číslo" style="font-size: medium;"><br>

            <h3>Objednávka</h3>
            <div class="order">
                <div class="web_form">
                    <label for="web">Webové stránky 1500kč (základ)</label><br>

                    <label for="web_name">Jméno webu</label><br>
                    <input type="text" id="web_name" name="web_name"><br>

                    <label for="web_type">Typ webu</label><br>
                    <select name="web_type" id="web_type">
                        <option value="static">Statický</option>
                        <option value="dynamic">Dynamický</option>
                    </select><br>

                    <label for="web_use">Hlavní využití webu</label><br>
                    <input type="text" id="web_use" name="web_use"><br>

                    <label for="colors">Barevné schéma (jpg s kódy)</label><br>
                    <input type="file" id="colors" name="colors"><br>

                    <label for="logo">Logo</label><br>
                    <input type="file" id="logo" name="logo"><br>

                    <label for="pages">Požadované stránky</label><br>
                    <input type="text" id="pages" name="pages" placeholder="Úvod, O nás, atd."><br>

                    <!-- Checkboxy -->
                    <input type="checkbox" id="login" name="login"><label for="login">Login/registrace formulář +250kč</label><br>
                    <input type="checkbox" id="admin" name="admin"><label for="admin">Admin stránka +200kč</label><br>
                    <input type="checkbox" id="shop" name="shop"><label for="shop">E-shop +500kč</label><br>
                    <input type="checkbox" id="db" name="db"><label for="db">Propojení s databází +50kč</label><br>
                    <input type="checkbox" id="hosting" name="hosting"><label for="hosting">Zajištění hostingu +50kč</label><br>
                    <input type="checkbox" id="domain" name="domain"><label for="domain">Zajištění domény +50kč</label><br>
                    <input type="checkbox" id="contact_form" name="contact_form"><label for="contact_form">Kontaktní formulář s propojením na email 50 kč</label><br>
                    <br>
                    <label for="other">Jiné +100kč (Každý požadavek oddělovat čárkou)</label><br>
                    <textarea name="other" id="other_text"></textarea><br>

                    <label for="total_price">Celková cena</label><br>
                    <input type="text" id="total_price" name="total_price" readonly>
                </div><br><br>
            </div>

            <h3>Platba</h3>
            <label for="payment">Způsob platby</label><br>
            <select name="payment" id="payment">
                <option value="bank">Převodem</option>
                <option value="paypal">Paypal</option>
            </select><br>

            <p>Pokud by při zadání objednávky došlo k chybě nebo špatnému zadání cena na faktuře se může lišit. Tyto změny budou obeznámeny kupujícímu.</p>

            <input type="checkbox" id="gdpr" name="gdpr" required>
            <label for="gdpr"><a href="other/GDPR.pdf" target="_blank">Souhlasím se zpracováním osobních údajů</a></label><br>

            <input type="checkbox" id="vos" name="vos" required>
            <label for="vos"><a href="other/obchodni-podminky.pdf" target="_blank">Souhlasím s obchodními podmínkami</a></label><br><br>

            <input type="submit" value="Odeslat objednávku">
        </form>

    </div>
</body>
<footer>
    <!--Odkazy na sociální sítě-->
    <a href="https://www.instagram.com/fida_knap/" target="_blank" style="padding: 10px;"><img src="images/instagram.png" alt="instagram" style="width: 4%; height: 4%;" class="IG"></a>
    <a href="https://discord.gg/Msv22AUx3m" target="_blank" style="padding: 10px;"><img src="images/discord.png" alt="discord" style="width: 5%; height: 7%;" class="DC"></a>
    <p>Created by Filip Knap with lot of ☕ and ❤️</p>
    <p>© 2025 Knap Filip</p>
</footer>

</html>

<script src="JS/checkbox.js"></script>
<script src="JS/prices.js"></script>
<script src="JS/ban.js"></script>