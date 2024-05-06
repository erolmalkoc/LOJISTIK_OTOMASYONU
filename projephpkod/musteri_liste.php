<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Müşteri Listesi</title>
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
    <h2>Müşteri Listesi</h2>
    <table>
        <thead>
            <tr>
                <th>Adı</th>
                <th>Soyadı</th>
                <th>Adres</th>
                <th>Telefon Numarası</th>
                <th>E-posta</th>
                <th>Siparişler</th>
                <th>Sipariş Ekle</th> <!-- Yeni sütun -->
            </tr>
        </thead>
        <tbody id="customerList">
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

            // Müşteri bilgilerini veritabanından al ve tabloya ekle
            $sql = "SELECT * FROM musteriler";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["adi"] . "</td>";
                    echo "<td>" . $row["soyadi"] . "</td>";
                    echo "<td>" . $row["adres"] . "</td>";
                    echo "<td>" . $row["telefon"] . "</td>";
                    echo "<td>" . $row["mail"] . "</td>";
                    echo "<td><button class='orderButton'>Siparişler</button></td>";
                    echo "<td><button class='addOrderButton'>Sipariş Ekle</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Hiç müşteri bulunamadı.</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<script>
    var orderButtons = document.querySelectorAll('.orderButton');
    var addOrderButtons = document.querySelectorAll('.addOrderButton');

    orderButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            window.location.href = 'siparisler.php';
        });
    });

    addOrderButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            window.location.href = 'siparis_ekle.php';
        });
    });
</script>
</body>
</html>
