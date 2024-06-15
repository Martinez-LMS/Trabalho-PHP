<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Cadastro</title>
    <link rel="stylesheet" href="../styles/login-styles.css">
    <link rel="stylesheet" href="../styles/styles.css">
</head>

<body>
    <?php $_POST = array(); ?>
    <?php require_once "../PHP/header.php"; ?>


    <main>
        <div class="container1">
            <div class="login-box">
                <h2>Cadastro</h2>
                <form action="" method="post">
                    <div class="user-box">
                        <input type="text" name="username" required>
                        <label>Usuário</label>
                    </div>
                    <div class="user-box">
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="password" required>
                        <label>Senha</label>
                    </div>
                    <a href="#" onclick="document.forms[0].submit(); return false;">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Cadastrar
                    </a>
                </form>
                <?php
                require_once "banco.php";


                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    $usu = $_POST["username"] ?? null;
                    $nom = $_POST["email"] ?? null;
                    $sen = $_POST["password"] ?? null;

                    if (empty($usu) || empty($nom) || empty($sen)) {
                        echo "<p>Por favor preencha todos os campos</p>";
                    } else {
                        criarUsuario($usu, $nom, $sen);
                        echo "<p>Usuário criado com sucesso!</p>";
                        $_POST = array();
                    }
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
