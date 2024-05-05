<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipariş Listesi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include("../navbar.php"); ?>

<div class="container">
<?php
    include ('../contact.php');

    $sec = "SELECT * FROM siparis";
    $sonuc = $baglanti->query($sec);
    if($sonuc->num_rows > 0) {
        // Tablo başlıklarını yazdırma
        echo "<h2>Sipariş Listesi</h2>
        <table>
            <thead>
            <tr>
              
                <th>Ürün Ağırlığı (kg)</th>
                <th>Taşıma Fiyatı (TL)</th>
                <th>Ürün İsmi</th>
                <th>Teslimat Adresi</th>
                <th>Teslimat Tarihi</th>
                <th>Tır Takibi</th> 
            </tr>
            </thead>
            <tbody id=\"orderList\">"; // orderList id'sini çift tırnak içine aldım

        // Verileri tabloya ekleme
        while($cek = $sonuc->fetch_assoc()) {
            echo "<tr>
            
            <td contenteditable=\"true\">" . $cek["ürün_agırlık"] . "</td>
            <td contenteditable=\"true\">" . $cek["tasıma_fiyat"] . "</td>
            <td contenteditable=\"true\">" . $cek["ürün_isim"] . "</td>
            <td contenteditable=\"true\">" . $cek["teslimat_adres"] . "</td>
            <td contenteditable=\"true\">" . $cek["nakliye_tarih"] . "</td>
            <td><a href=\"tir_takibi.html\"><button class=\"orderButton\">Tır Takibi</button></a></td>
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
</body>
</html>