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
<?php  include("../navbar.php");?>
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
        <tr>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
