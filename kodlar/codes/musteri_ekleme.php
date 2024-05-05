<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Müşteri Ekleme</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php  include("../navbar.php");?>
    <div class="container">
	 

        <h2>Müşteri Ekleme</h2>
        <form action="musteri_ekleme.php" id="musteri_ekleme_form" method="POST">
            <label for="firstName">Adı:</label>
            <input type="text" id="firstName" name="firstName" required placeholder="Adı">
            <label for="lastName">Soyadı:</label>
            <input type="text" id="lastName" name="lastName" required placeholder="Soyadı">
            <label for="address">Adres:</label>
            <input type="text" id="address" name="address" required placeholder="Adres">
            <label for="phoneNumber">Telefon Numarası:</label>
            <input type="text" maxlength="11" id="phoneNumber" name="phoneNumber" required placeholder="Telefon">
            <label for="email">E-posta:</label>
            <input type="text" id="email" name="email" required placeholder="Mail">
            <button type="submit">Müşteri Ekle</button>
        </form> 
    </div>
    <?php 
        include ('../contact.php');

        // Formdan gelen verileri alıyoruz
        $ad = $_POST['firstName'];
        $soyad = $_POST['lastName'];
        $adres = $_POST['address'];
        $telefon = $_POST['phoneNumber'];
        $mail = $_POST['email'];

        // SQL sorgusu
        $sorgu = "INSERT INTO musteriler (isim, soyisim, adres, telefon, mail) VALUES ('$ad', '$soyad', '$adres', $telefon, '$mail')";

        // Sorguyu çalıştırma
        if (mysqli_query($baglanti, $sorgu)) {
            echo "Yeni kayıt başarıyla eklendi.";
        } else {
            echo "Hata: " . $sorgu . "<br>" . mysqli_error($baglanti);
        }

        // Veritabanı bağlantısını kapatma
        mysqli_close($baglanti);
    ?>
</body>
</html>
