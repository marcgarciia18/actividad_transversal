<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-toggle">
                <button id="login-toggle" onclick="window.location.href='login.php'">LOGIN</button>
                <button id="register-toggle" onclick="window.location.href='registro.php'">REGISTER</button>
            </div>
            <form id="register-form" class="form" action="register_action.php" method="POST">
                <h2>Register</h2>
                <input type="text" name="username" placeholder="Username" required onblur="validateUsername(this)">
                <span id="username-error" style="color: red; display: none;">Campo vacío</span>
                <input type="email" name="email" placeholder="Email" required onblur="validateEmail(this)">
                <span id="email-error" style="color: red; display: none;">Campo vacío</span>
                <input type="password" name="password" placeholder="Password" required onblur="validatePassword(this)">
                <span id="password-error" style="color: red; display: none;">Campo vacío</span>
                <button type="submit">REGISTRARSE</button>
                <p>Eres usuario ya? <a href="login.php">Iniciar Sesion</a></p>
            </form>
        </div>
    </div>
    <script src="../assets/js/script.js"></script>
</body>
</html>
