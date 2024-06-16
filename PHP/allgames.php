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
    
    <?php
    require_once "banco.php";

    $jogos = buscaJogos();
    ?>

    <main>
        <div class="game-cards">
            <?php foreach ($jogos as $jogo): ?>
                <div class="game-card">
                    <div class="heart-circle">
                        <i class="fa-regular fa-heart" style="color: red;"></i>
                    </div>
                    <div class="image">
                        <img src="<?php echo $jogo['imageUrl']; ?>" alt="<?php echo $jogo['name']; ?>">
                    </div>
                    <div class="title"><?php echo $jogo['name']; ?></div>
                    <div class="desc"><?php echo $jogo['description']; ?></div>
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
