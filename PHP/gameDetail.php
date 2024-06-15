<?php
require_once "banco.php";

$id = $_GET['id'];
$jogo = buscaJogoPorId($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $jogo->name; ?></title>
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/styles.css">
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/gameDetail.css">
    <style>
        .game-video-container {
            position: relative;
            width: 100%;
            padding-top: 56.25%; /* Proporção 16:9 */
        }
        .game-video-title {
            position: relative;
            width: 100%;
        }
        .game-video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <?php require_once "../PHP/header.php"; ?>
    
    <main class="game-detail">
        <div class="game-header">
            <img src="<?php echo $jogo->imageUrl; ?>" alt="<?php echo $jogo->name; ?>" class="game-image">
            <div class="game-meta">
                <h1><?php echo $jogo->name; ?></h1>
                <p class="producer">Produtora: <?php echo $jogo->producer; ?></p>
                <p class="language">Idioma: <?php echo $jogo->language; ?></p>
                <p class="price">R$<?php echo number_format($jogo->price, 2); ?></p>
            </div>
        </div>
        <div class="game-info">
            <h2>Description</h2>
            <p><?php echo $jogo->description; ?></p>
        </div>
        <div class="game-video-title">
            <h2>Trailer</h2>
        </div>
        <div class="game-video-container">
            <div class="video-responsive">
                <iframe id="youtube-video" src="https://www.youtube.com/embed/<?php echo $jogo->videoUrl; ?>?autoplay=1&controls=1" title="YouTube video player" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>
    </main>

    <script>
        function resizeIframe() {
            var iframe = document.getElementById('youtube-video');
            var container = iframe.parentNode;
            var width = container.clientWidth;
            iframe.style.height = (width * 9 / 16) + 'px'; 
        }

        window.onload = resizeIframe;
        window.onresize = resizeIframe;
    </script>
</body>
</html>
