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
<?php  include("../navbar.php");?>
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
        <tr>
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
