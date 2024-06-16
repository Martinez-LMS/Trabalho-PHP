<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Cadastrar Jogo</title>
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
            grid-template-columns: 1fr 2fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group label {
            align-self: center;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group input[type="checkbox"] {
            width: auto;
            margin-top: 10px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
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
        .title{
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
           
            <form action="cadastrar_jogo.php" method="POST">
                <div class="form-group">
                    <label for="name">Nome do Jogo</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea id="description" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="imageUrl">URL da Imagem</label>
                    <input type="text" id="imageUrl" name="imageUrl" required>
                </div>
                <div class="form-group">
                    <label for="videoUrl">URL do Vídeo</label>
                    <input type="text" id="videoUrl" name="videoUrl" required>
                </div>
                <div class="form-group">
                    <label for="price">Preço</label>
                    <input type="number" id="price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="producer">Produtor</label>
                    <input type="text" id="producer" name="producer" required>
                </div>
                <div class="form-group">
                    <label for="language">Idioma</label>
                    <input type="text" id="language" name="language" required>
                </div>
                <div class="form-group">
                    <label for="isHero">Destacar na Hero Section?</label>
                    <input type="checkbox" id="isHero" name="isHero" value="1">
                </div>
                <div class="form-group">
                    <label for="isFeatured">Destacar na Seção em Destaque?</label>
                    <input type="checkbox" id="isFeatured" name="isFeatured" value="1">
                </div>
                <div class="form-actions">
                    <button type="submit" class="hero-btn-confira">Cadastrar</button>
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

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "banco.php";

    $name = $banco->real_escape_string($_POST["name"]);
    $description = $banco->real_escape_string($_POST["description"]);
    $imageUrl = $banco->real_escape_string($_POST["imageUrl"]);
    $videoUrl = $banco->real_escape_string($_POST["videoUrl"]);
    $price = $banco->real_escape_string($_POST["price"]);
    $producer = $banco->real_escape_string($_POST["producer"]);
    $language = $banco->real_escape_string($_POST["language"]);
    $isHero = isset($_POST["isHero"]) ? 1 : 0;
    $isFeatured = isset($_POST["isFeatured"]) ? 1 : 0;

    $query = "INSERT INTO games (name, description, imageUrl, videoUrl, price, producer, language, isHero, isFeatured) 
              VALUES ('$name', '$description', '$imageUrl', '$videoUrl', '$price', '$producer', '$language', '$isHero', '$isFeatured')";

    if ($banco->query($query) === TRUE) {
        echo "<p>Jogo cadastrado com sucesso!</p>";
    } else {
        echo "<p>Erro ao cadastrar jogo: " . $banco->error . "</p>";
    }
}
?>
