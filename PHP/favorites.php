<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoritos - GameHub</title>
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/login-styles.css">
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/styles.css">
</head>
<body>
<?php require_once "../PHP/header.php"; ?>

    
    <main>
        <section class="favorite-games">
            <div class="container">
                <h2>Jogos Favoritos</h2>
                <div class="game-cards">
                    <!-- Exemplo de jogo favorito -->
                    <div class="game-card">
                        <div class="heart-circle">
                            <img src="" alt="">
                        </div>                        
                        <div class="image"></div>
                        <div class="title">Nome do Jogo Favorito</div>
                        <div class="desc">Descrição do Jogo Favorito</div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <footer>
        <div class="container">
            <div class="footer-left">
                <div class="logo">GameHub</div>
                <p>All right reserved &copy; GameHub 2024</p>
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
