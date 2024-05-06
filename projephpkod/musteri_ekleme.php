<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Müşteri Ekleme</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/logo.jpg" type="image/jpeg">
</head>
<body>
   <div class="menu">
        <ul>
            <li><a href="secim.php">Ana Menü</a></li>
            <li><a href="musteri_ekleme.php">Müşteri Ekleme</a></li>
            <li><a href="musteri_liste.php">Müşteri Liste</a></li>
            <li><a href="siparis_ekle.php">Sipariş Ekle</a></li>
            <li><a href="siparisler.php">Siparişler</a></li>
            <li><a href="tir_takibi.php">Tır Takibi</a></li>
            <li><a href="faturalar.php">Faturalar</a></li>
            <li><a href="teslimat_rotası.php">Teslimat Rotası</a></li>
        </ul>
    </div>
    <div class="container">
        <h2>Müşteri Ekleme</h2>
        <form action="musteri_ekleme.php" method="post" id="muster_ekleme_form">
            <label for="firstName">Adı:</label>
            <input type="text" id="firstName" name="firstName" required placeholder="Adı">
            <label for="lastName">Soyadı:</label>
            <input type="text" id="lastName" name="lastName" required placeholder="Soyadı">
            <label for="address">Adres:</label>
            <input type="text" id="address" name="address" required placeholder="Adres">
            <label for="phoneNumber">Telefon Numarası:</label>
            <input type="text" maxlength ="11" id="phoneNumber" name="phoneNumber" required placeholder="Telefon">
            <label for="email">E-posta:</label>
            <input type="text" id="email" name="email" required placeholder="Mail">
            <button type="submit" name="submit">Müşteri Ekle</button>
        </form>
    </div>
    <?php
// Veritabanı bağlantısı
$servername = "localhost"; // Veritabanı sunucusu (genellikle localhost)
$username = "root"; // Veritabanı kullanıcı adı
$password = ""; // Veritabanı şifresi
$dbname = "lojistik"; // Veritabanı adı

// Veritabanı bağlantısını oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// Formdan gelen verileri al
if(isset($_POST['submit'])) {
    $adi = $_POST['firstName'];
    $soyadi = $_POST['lastName'];
    $adres = $_POST['address'];
    $telefon = $_POST['phoneNumber'];
    $mail = $_POST['email'];

    // Veritabanına ekleme sorgusu
    $sql = "INSERT INTO musteriler (adi, soyadi, adres, telefon, mail) VALUES ('$adi', '$soyadi', '$adres', '$telefon', '$mail')";

    if ($conn->query($sql) === TRUE) {
        echo "Yeni müşteri başarıyla eklendi";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}

// Veritabanı bağlantısını kapat
$conn->close();
?>

</body>
</html>


