<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Login</title>
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/login-styles.css">
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/styles.css">
</head>

<body>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require_once "../PHP/header.php"; 
    ?>

    <main>
        <div class="container1">
            <div class="login-box">
                <h2>Login</h2>
                <form action="login.php" method="post" id="loginForm">
                    <div class="user-box">
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="password" required>
                        <label>Senha</label>
                    </div>
                    <a href="#" onclick="document.getElementById('loginForm').submit(); return false;">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Entrar
                    </a>
                </form>

                <?php
                function processaFormulario()
                {
                    require_once "banco.php";

                    if (isset($_SESSION['usuario'])) {
                        return;
                    }

                    $e = $_POST["email"] ?? null;
                    $s = $_POST["password"] ?? null;

                    if ($e && $s) {
                        $e = $banco->real_escape_string($e);

                        $q = "SELECT email, password, username, id, isAdmin FROM users WHERE email='$e'";
                        $busca = $banco->query($q);

                        if ($busca && $busca->num_rows > 0) {
                            $usu = $busca->fetch_object();

                            if (password_verify($s, $usu->password)) {
                                $_SESSION['usuario'] = $usu->id;
                                $_SESSION['nome'] = $usu->username;
                                $_SESSION['admin'] = $usu->isAdmin;
                                echo "{$usu->isAdmin}, adiministrador";
                                echo "<p>Login bem-sucedido. Bem-vindo, {$usu->username}!</p>";
                            } else {
                                echo "<p>Senha Inválida</p>";
                            }
                        } else {
                            echo "<p>Usuário não encontrado</p>";
                        }
                    }
                }

                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    processaFormulario();
                }
                ?>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="footer-left">
                <div class="logo">GameHub</div>
                <p>All rights reserved &copy; GameHub 2024</p>
            </div>
            <div class="footer-right">
                <ul>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>
