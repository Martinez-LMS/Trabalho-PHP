<?php
require_once "banco.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];
    deletarJogo($deleteId);
}

$jogos = buscaJogos(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Lista de Jogos</title>
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/styles.css">
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/gameCard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .game-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .game-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .game-item {
            border: 1px solid #ddd;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 10px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .game-info {
            padding: 10px;
        }

        .game-info h2 {
            margin: 0;
            font-size: 20px;
        }

        .game-info p {
            margin: 5px 0;
            color: #555;
        }

        .game-actions {
            margin-top: 10px;
        }

        .game-actions a {
            text-decoration: none;
            color: #007bff;
            margin-right: 10px;
        }

        .game-actions a:hover {
            color: #0056b3;
        }

        .game-actions form {
            display: inline;
        }

        .btn-cadastrar {
            background-color: #000;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            display: inline-block;
            margin-bottom: 20px;
        }

        .btn-cadastrar:hover {
            background-color: #0056b3;
        }

        .delete-button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <?php require_once "../PHP/header.php"; ?>

    <main>
        <div class="game-container">
            <a href="cadastrar_jogo.php" class="btn-cadastrar">Cadastrar Novo Jogo</a>
            
            <ul class="game-list">
                <?php if (!empty($jogos)): ?>
                    <?php foreach ($jogos as $jogo): ?>
                        <li class="game-item">
                            <div class="game-info">
                                <h2><?php echo htmlspecialchars($jogo['name']); ?></h2>
                                <div class="game-actions">
                                    <a href="editar_jogo.php?id=<?php echo $jogo['id']; ?>">Editar</a>
                                    <form method="POST" action="">
                                        <input type="hidden" name="delete_id" value="<?php echo $jogo['id']; ?>">
                                        <button type="submit" class="delete-button">Excluir</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Nenhum jogo cadastrado.</p>
                <?php endif; ?>
            </ul>
        </div>
    </main>
    
    <footer>
        <div class="container">
            <div class="footer-left">
                <div class="logo">GameHub</div>
                <p>All rights reserved &copy; GameHub 2024</p>
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
