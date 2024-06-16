<?php
require_once "banco.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $jogo = buscarJogoPorId($id);

    if (!$jogo) {
        echo "<p>Jogo não encontrado.</p>";
        exit;
    }
} else {
    echo "<p>ID do jogo não especificado.</p>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $imageUrl = $_POST["imageUrl"];
    $videoUrl = $_POST["videoUrl"];
    $producer = $_POST["producer"];
    $language = $_POST["language"];
    $isHero = isset($_POST["isHero"]) ? 1 : 0;
    $isFeatured = isset($_POST["isFeatured"]) ? 1 : 0;

    if (atualizarJogo($id, $name, $description, $imageUrl, $videoUrl, $price, $producer, $language, $isHero, $isFeatured)) {
        echo "<p>Jogo atualizado com sucesso!</p>";
    } else {
        echo "<p>Erro ao atualizar jogo.</p>";
    }

    $jogo = buscarJogoPorId($id);
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Jogo - GameHub</title>
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/styles.css">
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/gameCard.css">
    <style>
        .form-section {
            padding: 50px 0;
            background-color: #f9f9f9;
        }

        .form-section .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .form-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group textarea {
            grid-column: span 2;
            resize: vertical;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            grid-column: span 2;
        }

        .form-actions button {
            background-color: #000;
            border: 2px solid #fff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-actions button:hover {
            background-color: #444;
        }

        .title {
            width: 80%;
            margin: auto;
            text-align: center;
        }
    </style>
</head>
<body>
<?php require_once "header.php"; ?>

<main>
    <section class="form-section">
        <div class="container">
            <h2 class="title">Editar Jogo - <?php echo htmlspecialchars($jogo['name']); ?></h2>
            <form action="editar_jogo.php?id=<?php echo $jogo['id']; ?>" method="POST">
                <div class="form-group">
                    <label for="name">Nome do Jogo</label>
                    <label for="price">Preço</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($jogo['name']); ?>" required>
                    <input type="number" id="price" name="price" value="<?php echo htmlspecialchars($jogo['price']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea id="description" name="description" required><?php echo htmlspecialchars($jogo['description']); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="imageUrl">URL da Imagem</label>
                    <label for="videoUrl">URL do Vídeo</label>
                    <input type="text" id="imageUrl" name="imageUrl" value="<?php echo htmlspecialchars($jogo['imageUrl']); ?>" required>
                    <input type="text" id="videoUrl" name="videoUrl" value="<?php echo htmlspecialchars($jogo['videoUrl']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="producer">Produtor</label>
                    <label for="language">Idioma</label>
                    <input type="text" id="producer" name="producer" value="<?php echo htmlspecialchars($jogo['producer']); ?>" required>
                    <input type="text" id="language" name="language" value="<?php echo htmlspecialchars($jogo['language']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="isHero">Destacar na Hero Section?</label>
                    <label for="isFeatured">Destacar na Seção em Destaque?</label>
                    <input type="checkbox" id="isHero" name="isHero" value="1" <?php echo $jogo['isHero'] ? 'checked' : ''; ?>>
                    <input type="checkbox" id="isFeatured" name="isFeatured" value="1" <?php echo $jogo['isFeatured'] ? 'checked' : ''; ?>>
                </div>
                <div class="form-actions">
                    <button type="submit" class="hero-btn-confira">Atualizar</button>
                </div>
            </form>
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
