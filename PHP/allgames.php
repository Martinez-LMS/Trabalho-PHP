<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/styles.css">
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/gameCard.css">
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
                        <img src="path/to/heart-icon.png" alt="Favorite">
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
</body>
</html>
