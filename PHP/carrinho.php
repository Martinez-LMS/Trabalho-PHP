<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho - GameHub</title>
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/login-styles.css">
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/styles.css">
</head>
<body>
    <?php require_once "PHP/header.php"; ?>

    
    <main>
        <section class="cart-games">
            <div class="container">
                <h2>Carrinho de Compras</h2>
                <div class="game-cards">
                    <!-- Exemplo de jogo no carrinho -->
                    <div class="game-card">
                        <div class="heart-circle">
                            <img src="" alt="">
                        </div>                        
                        <div class="image"></div>
                        <div class="title">Nome do Jogo no Carrinho</div>
                        <div class="desc">Descrição do Jogo no Carrinho</div>
                    </div>
                </div>
                <button class="checkout-btn">Finalizar Compra</button>
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
