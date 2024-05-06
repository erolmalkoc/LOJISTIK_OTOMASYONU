<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipariş Listesi</title>
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
    <h2>Sipariş Listesi</h2>
    <table>
        <thead>
        <tr>
            <th>Müşteri ID</th>
            <th>Ürün Ağırlığı (kg)</th>
            <th>Taşıma Fiyatı (TL)</th>
            <th>Ürün İsmi</th>
            <th>Teslimat Adresi</th>
            <th>Teslimat Tarihi</th> 
        </tr>
        </thead>
        <tbody id="orderList">
        <?php
        // Veritabanı bağlantısı
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "lojistik";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Veritabanı bağlantı hatası kontrolü
        if ($conn->connect_error) {
            die("Veritabanına bağlanılamadı: " . $conn->connect_error);
        }

        // Sipariş bilgilerini veritabanından al ve tabloya ekle
        $sql = "SELECT siparis.*, musteriler.adi, musteriler.soyadi FROM siparis
                INNER JOIN musteriler ON siparis.musteri_id = musteriler.musteri_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["musteri_id"] . "</td>";
                echo "<td>" . $row["urun_agirligi"] . "</td>";
                echo "<td>" . $row["tasima_fiyati"] . "</td>";
                echo "<td>" . $row["urunun_ismi"] . "</td>";
                echo "<td>" . $row["teslimat_adresi"] . "</td>";
                echo "<td>" . $row["nakliye_tarihi"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>Hiç sipariş bulunamadı.</td></tr>";
        }
        $conn->close();
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
