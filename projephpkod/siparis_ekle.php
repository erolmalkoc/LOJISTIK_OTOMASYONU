<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipariş Ekleme</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/logo.jpg" type="image/jpeg">
    <script>
        function calculatePrice() {
            var weight = parseFloat(document.getElementById("weight").value);
            var price = weight * 10;
            document.getElementById("price").value = price.toFixed(2) + " TL";
        }
    </script>
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
        <h2>Sipariş Ekleme</h2>
        <form action="siparis_ekle.php" method="post">
            <label for="customerID">Müşteri ID:</label>
            <input type="text" id="customerID" name="customerID" required placeholder="Müşteri id">
            <label for="weight">Ürünün Ağırlığı (kg):</label>
            <input type="text" id="weight" name="weight" min="0" step="0.01" required onchange="calculatePrice()">
            <label for="price">Taşıma Fiyatı (TL):</label>
            <input type="text" id="price" name="price" readonly>
            <label for="productName">Ürünün İsmi İsmi:</label>
            <input type="text" maxlength="20" id="productName" name="productName" required placeholder="Ürün İsmi">
            <label for="address">Teslimat Adresi:</label>
            <input type="text" id="address" name="address" required placeholder="Teslimat Adresi">
            <label for="deliveryDate">Nakliye Tarihi:</label>
            <input type="date" id="deliveryDate" name="deliveryDate" required placeholder="Nakliye Tarihi">
            <button type="submit" name="submit">Sipariş Ekle</button>
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
    $customerID = $_POST['customerID'];
    $weight = $_POST['weight'];
    $price = $_POST['price'];
    $productName = $_POST['productName'];
    $address = $_POST['address'];
    $deliveryDate = $_POST['deliveryDate'];

    // Veritabanına ekleme sorgusu
    $sql = "INSERT INTO siparis (musteri_id, urun_agirligi, tasima_fiyati, urunun_ismi, teslimat_adresi, nakliye_tarihi) VALUES ('$customerID', '$weight', '$price', '$productName', '$address', '$deliveryDate')";

    if ($conn->query($sql) === TRUE) {
        echo "Yeni sipariş başarıyla eklendi";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}

// Veritabanı bağlantısını kapat
$conn->close();
?>

</body>
</html>
