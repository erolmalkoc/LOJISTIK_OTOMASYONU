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
<?php  include("../navbar.php");?>
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
