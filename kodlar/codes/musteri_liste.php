<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Müşteri Listesi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php  include("../navbar.php");?>
<div id="container">
    <?php
    include ('../contact.php');

    $sec="SELECT * FROM musteriler";
    $sonuc = $baglanti->query($sec);
    if($sonuc->num_rows > 0) {
        // Tablo başlıklarını yazdırma
        echo "<table>
            <thead>
                <tr>
                    <th>Adı</th>
                    <th>Soyadı</th>
                    <th>Adres</th>
                    <th>Telefon Numarası</th>
                    <th>E-posta</th>
                    <th>Siparişler</th>
                    <th>Sipariş Ekle</th>
                </tr>
            </thead>
            <tbody>";

        // Verileri tabloya ekleme
        while($cek = $sonuc->fetch_assoc()) {
            echo "<tr>
                <td contenteditable='true'>" . $cek["isim"]. "</td>
                <td contenteditable='true'>" . $cek["soyisim"]. "</td>
                <td contenteditable='true'>" . $cek["adres"]. "</td>
                <td contenteditable='true'>" . $cek["telefon"]. "</td>
                <td contenteditable='true'>" . $cek["mail"]. "</td>
                <td><button class='orderButton'>Siparişler</button></td>
                <td><button class='addOrderButton'>Sipariş Ekle</button></td>
            </tr>";
        }

        // Tablo kapatma
        echo "</tbody>
        </table>";
    } else {
        echo "<p>Veri bulunamadı</p>";
    }

    // Bağlantıyı kapatma
    $baglanti->close();
    ?>
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
