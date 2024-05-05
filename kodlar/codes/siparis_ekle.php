<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipariş Ekleme</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function calculatePrice() {
            var weight = parseFloat(document.getElementById("weight").value);
            var price = weight * 10;
            document.getElementById("price").value = price.toFixed(2) + " TL";
        }
    </script>
</head>
<body>
    <?php  include("../navbar.php");?>

    
    <div class="container">
        <h2>Sipariş Ekleme</h2>
        <form action="siparis_ekle.php" id="siparis_ekle_form" method="POST">
            
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
            <button type="submit">Sipariş Ekle</button>
        </form>
    </div>
    <?php
include('../contact.php');

// Formdan gelen verileri alıyoruz

$agirlik = $_POST['weight'];
$tfiyat = $_POST['price'];
$uad = $_POST['productName'];
$uadres = $_POST['address'];
$ntarih = $_POST['deliveryDate'];

$sql = "INSERT INTO siparis (ürün_agırlık, tasıma_fiyat, ürün_isim, teslimat_adres, nakliye_tarih) VALUES ( '$agirlik', '$tfiyat', '$uad', '$uadres', '$ntarih')";

// Sorguyu çalıştırma
if (mysqli_query($baglanti, $sql)) {
    echo "Yeni kayıt başarıyla eklendi.";
} else {
    echo "Hata: " . $sql. "<br>" . mysqli_error($baglanti);
}

// Veritabanı bağlantısını kapatma
mysqli_close($baglanti);
?>
</body>
</html>
