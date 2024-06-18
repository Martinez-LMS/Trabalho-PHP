<?php
require_once "banco.php";
session_start();
$jogos = buscaJogos();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['game_id'])) {
    $game_id = $_POST['game_id'];
    $usuario_id = $_SESSION['usuario']; 
    adicionarAosFavoritos($usuario_id, $game_id);
    unset($_POST['game_id']);
    header('Location: allgames.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/styles.css">
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/gameCard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<?php require_once "../PHP/header.php"; ?>

<main>
    <div class="game-cards">
        <?php foreach ($jogos as $jogo): ?>
            <div class="game-card">
                <div class="heart-circle">
                    <form action="" method="post">
                        <input type="hidden" name="game_id" value="<?php echo $jogo['id']; ?>">
                        <button type="submit">
                            <?php 
                            $usuario_id = $_SESSION['usuario']; 
                            $gameFav_id = $jogo['id'];
                            $isFav = verificarFavorito($usuario_id, $gameFav_id);
                            if ($isFav == true){
                                echo '<i class="fa-solid fa-heart" style="color: red;"></i>';
                            }else{
                                echo '<i class="fa-regular fa-heart" style="color: red;"></i>';
                            };
                            ?>
                            
                        </button>
                    </form>
                </div>
                <div class="image">
                    <img src="<?php echo $jogo['imageUrl']; ?>" alt="<?php echo $jogo['name']; ?>">
                </div>
                <div class="title"><?php echo $jogo['name']; ?></div>
                <div class="desc">R$<?php echo $jogo['price']; ?></div>
                <form action="gameDetail.php" method="GET">
                    <input type="hidden" name="id" value="<?php echo $jogo['id']; ?>">
                    <button type="submit">Ver Mais</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
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
