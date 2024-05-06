<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teslimat Rotaları</title>
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
    <h2>Teslimat Rotaları</h2>
    <table>
        <thead>
        <tr>
            <th>Sipariş ID</th>
            <th>Başlangıç Noktası</th>
            <th>Varış Noktası</th>
            <th>Mesafe</th>
            <th>Tahmini Süre</th>
        </tr>
        </thead>
        <tbody id="deliveryRoutes">
        <?php
// Veritabanı bağlantı bilgilerini burada tanımlayın
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lojistik";

// Veritabanı bağlantısını oluşturun
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol edin
if ($conn->connect_error) {
    die("Veritabanına bağlantı sağlanamadı: " . $conn->connect_error);
}

// Teslimat rotası verilerini almak için sorguyu hazırlayın
$sql = "SELECT siparis.siparis_id, teslimat_rotasi.baslangic_noktası, siparis.teslimat_adresi, teslimat_rotasi.mesafe, teslimat_rotasi.tahmini_sure FROM siparis INNER JOIN teslimat_rotasi ON siparis.siparis_id = teslimat_rotasi.siparis_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Verileri satır satır alın ve tablo içine yerleştirin
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["siparis_id"] . "</td>";
        echo "<td>" . $row["baslangic_noktası"] . "</td>";
        echo "<td>" . $row["teslimat_adresi"] . "</td>";
        echo "<td>" . $row["mesafe"] . "</td>";
        echo "<td>" . $row["tahmini_sure"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>0 sonuç</td></tr>";
}

$conn->close();
?>
        </tbody>
    </table>
</div>


</body>
</html>
