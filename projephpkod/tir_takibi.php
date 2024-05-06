<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harita Değiştirme</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/logo.jpg" type="image/jpeg">
    <style>
        img {
            max-width: 100%;
            height: auto;
        }
        #haritaImg {
            width: 500px; 
        }
    </style>
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
<a href="#" id="haritaLink" onclick="changeMap(); return false;">
    <img src="img/bos_harita.jpg" alt="Boş Harita" id="haritaImg">
</a>

<script>
    function changeMap() {
        // Resmi değiştirme
        var haritaImg = document.getElementById("haritaImg");
        haritaImg.src = "img/dolu_harita.jpg";
        haritaImg.style.width = "100%";

        // Linki kaldırma
        var haritaLink = document.getElementById("haritaLink");
        haritaLink.removeAttribute("onclick");
        haritaLink.style.cursor = "default";
    }
</script>

</body>
</html>
