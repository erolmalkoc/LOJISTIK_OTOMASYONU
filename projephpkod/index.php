<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Girişi</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/logo.jpg" type="image/jpeg">
</head>
<body>
    <div class="container">
        <h2>Admin Girişi</h2>
        <form id="loginForm">
            <label for="username">Kullanıcı Adı:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Şifre:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Giriş</button>
        </form>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Formun varsayılan davranışını engelle
            
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            
            // Kullanıcı adı ve şifre kontrolü
            if (username === 'admin' && password === '1234') {
                window.location.href = 'secim.html'; // Doğruysa müşteri ekleme sayfasına yönlendir
            } else {
                alert('Hatalı kullanıcı adı veya şifre. Lütfen tekrar deneyin.'); // Yanlışsa uyarı ver
            }
        });
    </script>
</body>
</html>
