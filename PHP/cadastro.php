<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Login</title>
    <link rel="stylesheet" href="../styles/login-styles.css">
    <link rel="stylesheet" href="../styles/styles.css">


</head>

<body>
    <header>
        <div class=" container">
            <div class="left">
                <div class="logo">
                    <a href="/">
                        <img src="assets/logo.png" alt="logo">
                    </a>
                    <a href="/">
                        <h1>GAMEHUB</h1>
                    </a>
                </div>
                <nav>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Categorias</a></li>
                    </ul>
                </nav>
            </div>
            <div class="auth-buttons">
                <a href="login.html" class="sign-in">Sign In</a>
                <a href="signup.html" class="sign-up">Sign Up</a>
            </div>
        </div>
    </header>

    <main>
        <div class="container1">
            <div class="login-box">
                <h2>Cadastro</h2>
                <form action="" method="post">
                    <div class="user-box">
                        <input type="text" name="usuario" required>
                        <label>Usuário</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="nome" required>
                        <label>Nome</label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="senha" required>
                        <label>Senha</label>
                    </div>
                    <input type="submit" value="Criar">
                    <?php
                    require_once "banco.php";

                    $usu = $_POST["usuario"] ?? null;
                    $nom = $_POST["nome"] ?? null;
                    $sen = $_POST["senha"] ?? null;

                    if (is_null($usu) || is_null($nom) || is_null($sen)) {
                        echo "<p>Por favor preencha todos os campos</p>";
                    } else {
                        criarUsuario($usu, $nom, $sen);
                        echo "<p>Usuario criado com sucesso!</p>";
                    }
                    ?>
                </form>
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