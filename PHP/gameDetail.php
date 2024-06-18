<?php
require_once "banco.php";

// Verifica se o ID do jogo foi passado via GET
if (!isset($_GET['id'])) {
    // Caso não tenha sido passado, redireciona para página de erro ou tratamento adequado
    header("Location: error.php");
    exit();
}

// Obtém o ID do jogo da URL
$id = $_GET['id'];

// Busca as informações do jogo pelo ID
$jogo = buscarJogoPorId($id);

// Verifica se o usuário está logado (supondo que 'usuario' seja o índice da sessão para o ID do usuário)
$userId = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($jogo['name']); ?></title>
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
        .game-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .game-buttons button {
            padding: 10px 20px;
            margin: 0 10px;
            font-size: 16px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
        }
        .game-buttons button.border-black {
            color: black;
            border-color: black;
            background-color: transparent;
        }
        .game-buttons button.black-background {
            color: white;
            background-color: black;
        }
        .game-buttons button:hover {
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>
    <?php require_once "../PHP/header.php"; ?>
    
    <main class="game-detail">
        <div class="game-header">
            <img src="<?php echo htmlspecialchars($jogo['imageUrl']); ?>" alt="<?php echo htmlspecialchars($jogo['name']); ?>" class="game-image">
            <div class="game-meta">
                <h1><?php echo htmlspecialchars($jogo['name']); ?></h1>
                <p class="producer">Produtora: <?php echo htmlspecialchars($jogo['producer']); ?></p>
                <p class="language">Idioma: <?php echo htmlspecialchars($jogo['language']); ?></p>
                <p class="price">R$<?php echo number_format($jogo['price'], 2); ?></p>
                
                <!-- Botões -->
                <div class="game-buttons">
                    <!-- Botão para adicionar ao carrinho -->
                    <form action="add_to_cart.php" method="post">
                        <input type="hidden" name="game_id" value="<?php echo htmlspecialchars($jogo['id']); ?>">
                        <button class="border-black" type="submit">
                        <?php 
                            $usuario_id = $_SESSION['usuario']; 
                            $gameFav_id = $jogo['id'];
                            $isFav = verificarCarrinho($usuario_id, $gameFav_id);
                            if ($isFav == false){
                                echo 'Adicionar ao Carrinho';
                            }else{
                                echo 'Remover do Carrinho';
                            };
                            ?>
                            </button>
                    </form>
                    
                    <!-- Botão para adicionar aos favoritos -->
                    <form action="add_to_favorites.php" method="post">
                        <input type="hidden" name="game_id" value="<?php echo htmlspecialchars($jogo['id']); ?>">
                        <button class="black-background" type="submit">
                        <?php 
                            $usuario_id = $_SESSION['usuario']; 
                            $gameFav_id = $jogo['id'];
                            $isFav = verificarFavorito($usuario_id, $gameFav_id);
                            if ($isFav == false){
                                echo 'Adicionar aos Favoritos';
                            }else{
                                echo 'Remover dos Favoritos';
                            };
                            ?>    
                      </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="game-info">
            <h2>Description</h2>
            <p><?php echo htmlspecialchars($jogo['description']); ?></p>
        </div>
        <div class="game-video-title">
            <h2>Trailer</h2>
        </div>
        <div class="game-video-container">
            <div class="video-responsive">
                <iframe id="youtube-video" src="https://www.youtube.com/embed/<?php echo htmlspecialchars($jogo['videoUrl']); ?>?autoplay=1&controls=1" title="YouTube video player" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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
