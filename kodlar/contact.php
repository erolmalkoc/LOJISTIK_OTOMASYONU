<?php 
$host="localhost";
$kullanici="root";
$sifre="";
$veritabani="veritabanı";
$tablo="musteriler";
$baglanti=mysqli_connect($host,$kullanici,$sifre,$veritabani);


if($baglanti){
echo "<p> bağlantı sağlandı </p>";
}
else
{
echo "<p>bağlantı sağlanamadı</p>";
}
/*veri tabanını bağlanmak seçmek*/@mysqli_select_db($baglanti,$veritabani)or die ("veri tabanına bağlanamadık
");
?>