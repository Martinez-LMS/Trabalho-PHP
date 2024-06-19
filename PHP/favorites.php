<?php
$usuario_id = $_SESSION['usuario']; 
require_once "banco.php";

$jogosCarrinho = buscaCarrinho($usuario_id);
$jogos = [];

foreach ($jogosCarrinho as $item) {
    $jogo = buscarJogoPorId($item['game_id']);
    if ($jogo && isset($jogo['name'])) {
        $jogos[] = $jogo;
    }
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho - GameHub</title>
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/login-styles.css">
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/styles.css">
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/gameCard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <?php require_once "../PHP/header.php"; ?>

    <main>
        <section class="cart-items">
            <div class="container-main">
                <h2>Carrinho de Compras</h2>
                <div class="game-cards">
                    <?php if (empty($jogos)): ?>
                        <p>Nenhum jogo encontrado no carrinho.</p>
                    <?php else: ?>
                        <?php foreach ($jogos as $jogo): ?>
                            <div class="game-card">
                                <div class="image">
                                    <img src="<?php echo $jogo['imageUrl']; ?>" alt="<?php echo $jogo['name']; ?>">
                                </div>
                                <div class="title"><?php echo $jogo['name']; ?></div>
                                <div class="desc"><?php echo $jogo['description']; ?></div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
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
