<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho - GameHub</title>
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/login-styles.css">
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/styles.css">
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/gameCard.css">
    <style>
        .container-main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .cart-items {
            background-color: #fff;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .checkout-button {
            background-color: #f56c2d;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
            display: block; /
            width: 100%;
        }

        .checkout-button:hover {
            background-color: #e55b1f;
        }
    </style>
</head>

<?php 
    session_start();
    $usuario_id = $_SESSION['usuario']; 
    require_once "banco.php";


    $jogos = buscaCarrinho($usuario_id);
?>

<body>
    <?php require_once "../PHP/header.php"; ?>
    
    <main>
        <section class="cart-items">
       
            <div class="container-main">
                <h2>Carrinho de Compras</h2>
                <div class="game-cards">
                    <?php foreach ($jogos as $jogo): ?>
                        <div class="game-card">
                        <div class="image">
                            <img src="<?php echo $jogo['imageUrl']; ?>" alt="<?php echo $jogo['name']; ?>">
                        </div>
                        <div class="title"><?php echo $jogo['name']; ?></div>
                        <div class="desc">R$<?php echo $jogo['price']; ?></div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <button class="checkout-button">Finalizar Compra</button>
            </div>
        </section>
    </main>
    
    <footer class="footer-main">
        <div class="container-main">
            <p>All right reserved &copy; GameHub 2024</p>
            <ul>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
