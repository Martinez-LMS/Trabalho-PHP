<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Jogo - GameHub</title>
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/login-styles.css">
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/styles.css">
</head>
<body>
<?php require_once "../PHP/header.php"; ?>

    
    <main>
        <section class="game-details">
            <div class="container">
                <h2>Nome do Jogo</h2>
                <div class="game-detail-content">
                    <img src="" alt="Imagem do Jogo">
                    <div class="game-info">
                        <p>Descrição do Jogo</p>
                        <p>Preço: R$ X,XX</p>
                        <p>Produtora: Nome da Produtora</p>
                        <p>Idioma: Português</p>
                    </div>
                </div>
                <button class="add-to-cart">Adicionar ao Carrinho</button>
                <button class="add-to-favorites">Adicionar aos Favoritos</button>
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
