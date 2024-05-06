<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faturalar</title>
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
    <h2>Faturalar</h2>
    <table>
        <thead>
        <tr>
            <th>Sipariş ID</th>
            <th>Tutar</th>
            <th>Oluşturma Tarihi</th>
            <th>Ödeme Durumu</th>
        </tr>
        </thead>
        <tbody id="invoiceList">
        <?php
        // Veritabanı bağlantısı
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "lojistik";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Bağlantı kontrolü
        if ($conn->connect_error) {
            die("Veritabanına bağlantı sağlanamadı: " . $conn->connect_error);
        }

        // Sorgu: Siparişler ve Faturalar tablolarından gerekli verileri al
        $sql = "SELECT siparis.siparis_id, siparis.tasima_fiyati, siparis.nakliye_tarihi, faturalar.odeme_durumu FROM siparis INNER JOIN faturalar ON siparis.siparis_id = faturalar.siparis_id";
        $result = $conn->query($sql);

        // Verileri tabloya ekle
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["siparis_id"] . "</td>";
                echo "<td>" . $row["tasima_fiyati"] . "</td>";
                echo "<td>" . $row["nakliye_tarihi"] . "</td>";
                echo "<td>" . $row["odeme_durumu"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Veri bulunamadı.</td></tr>";
        }
        $conn->close();
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
