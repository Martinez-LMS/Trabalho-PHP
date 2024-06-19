<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub</title>
    <link rel="stylesheet" href="../Trabalho-PHP/styles/styles.css">
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/gameCard.css">
</head>
<body>
<?php require_once "PHP/header.php"; ?>

<?php 
require_once "PHP/banco.php";

$jogoHero = buscaUm();

$jogos = buscaFeatures();

$jogoUnico = buscaUm();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $game_id = $_POST['game_id'];
    $usuario_id = $_SESSION['usuario']; 
    adicionarAosFavoritos($usuario_id, $game_id);
    header('Location: ../../Trabalho-PHP/');
    exit;
}
?>

<main>
    <section class="hero">
        <?php foreach ($jogoHero as $game): ?>
            <div class="video-container">
                <iframe src="https://www.youtube.com/embed/<?php echo $game['videoUrl']; ?>?autoplay=1&mute=1&controls=0&showinfo=0&rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <div class="hero-content">
                <h1><?php echo $game['name'] ?></h1>
                <div class="hero-desc">
                    <p><?php echo $game['description'] ?></p>
                </div>
                <div class="hero-buttons-conteiner">
                    <form action="PHP/gameDetail.php" method="GET">
                        <input type="hidden" name="id" value="<?php echo $game['id']; ?>">
                        <button type="submit" class="hero-btn-confira">CONFIRA</button>
                    </form>
                    <form action="PHP/gameDetail.php" method="GET">
                        <input type="hidden" name="id" value="<?php echo $game['id']; ?>">
                        <button type="submit" class="hero-btn-vermais">VER MAIS</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>

    <section class="popular-games">
        <div class="popular-games-container-cards">
            <div>
                <h2>DESCOBERTAS QUE FARÃO SUA JOGATINA MELHOR</h2>
            </div>
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
                                    } else {
                                        echo '<i class="fa-regular fa-heart" style="color: red;"></i>';
                                    }
                                    ?>
                                </button>
                            </form>
                        </div>
                        <div class="image">
                            <img src="<?php echo $jogo['imageUrl']; ?>" alt="<?php echo $jogo['name']; ?>">
                        </div>
                        <div class="title"><?php echo $jogo['name']; ?></div>
                        <div class="desc">R$<?php echo $jogo['price']; ?></div>
                        <form action="PHP/gameDetail.php" method="GET">
                            <input type="hidden" name="id" value="<?php echo $jogo['id']; ?>">
                            <button type="submit">Ver Mais</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="featured-game">
        <div class="container">
            <?php foreach ($jogoUnico as $game): ?>
                <div class="game-detail">
                    <img src="<?php echo $game['imageUrl']; ?>" alt="<?php echo $game['name']; ?>" class="image">
                    <div class="featured-game-content">
                        <h2 class="text-content"><?php echo $game['name']; ?></h2>
                        <p><?php echo $game['description']; ?></p>
                        <div class="buttons">
                            <form action="PHP/gameDetail.php" method="GET">
                                <input type="hidden" name="id" value="<?php echo $game['id']; ?>">
                                <button type="submit" class="hero-btn-confira">CONFIRA</button>
                            </form>
                            <form action="PHP/gameDetail.php" method="GET">
                                <input type="hidden" name="id" value="<?php echo $game['id']; ?>">
                                <button type="submit" class="hero-btn-vermais-bg">VER MAIS</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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
