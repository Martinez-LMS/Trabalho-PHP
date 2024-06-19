<?php
$banco = new mysqli("localhost:3306", "root", "", "gamehub");

if ($banco->connect_error) {
    die("Erro de conexão com o banco de dados: " . $banco->connect_error);
}

function criarUsuario(string $username, string $email, string $password, $isAdmin = false): bool
{
    global $banco;

    $password = password_hash($password, PASSWORD_DEFAULT);
    $isAdmin = $isAdmin ? 1 : 0;

    $query = "INSERT INTO users (username, email, password, isAdmin) VALUES ('$username', '$email', '$password', $isAdmin)";
    return $banco->query($query);
}

function buscarUsuarioPorId($id)
{
    global $banco;

    $query = "SELECT * FROM users WHERE id = $id";
    $result = $banco->query($query);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

function buscaJogos(): array
{
    global $banco;

    $query = "SELECT * FROM games";
    $result = $banco->query($query);

    $jogos = array();

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $jogos[] = $row;
        }
    }

    return $jogos;
}

function buscarJogoPorId($id)
{
    global $banco;

    $query = "SELECT * FROM games WHERE id = $id";
    $result = $banco->query($query);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

function cadastrarJogo($name, $description, $imageUrl, $videoUrl, $price, $producer, $language, $isHero, $isFeatured)
{
    global $banco;

    $query = "INSERT INTO games (name, description, imageUrl, videoUrl, price, producer, language, isHero, isFeatured) 
              VALUES ('$name', '$description', '$imageUrl', '$videoUrl', '$price', '$producer', '$language', '$isHero', '$isFeatured')";
    return $banco->query($query);
}

function atualizarJogo($id, $name, $description, $imageUrl, $videoUrl, $price, $producer, $language, $isHero, $isFeatured)
{
    global $banco;

    $query = "UPDATE games SET 
              name = '$name', 
              description = '$description', 
              imageUrl = '$imageUrl', 
              videoUrl = '$videoUrl', 
              price = '$price', 
              producer = '$producer', 
              language = '$language', 
              isHero = '$isHero', 
              isFeatured = '$isFeatured' 
              WHERE id = '$id'";
    return $banco->query($query);
}

function deletarJogo($id): void
{
    global $banco;

    $query = "DELETE FROM games WHERE id = $id";
    $banco->query($query);
}

function adicionarAosFavoritos($userId, $gameId): void
{
    global $banco;

    $query = "SELECT * FROM favorites WHERE user_id = $userId AND game_id = $gameId";
    $result = $banco->query($query);

    if ($result->num_rows > 0) {
        $query = "DELETE FROM favorites WHERE user_id = $userId AND game_id = $gameId";
    } else {
        $query = "INSERT INTO favorites (user_id, game_id) VALUES ($userId, $gameId)";
    }

    $banco->query($query);
}

function verificarFavorito($userId, $gameId): bool
{
    global $banco;

    $query = "SELECT * FROM favorites WHERE user_id = $userId AND game_id = $gameId";
    $result = $banco->query($query);

    return $result->num_rows > 0;
}

function adicionarAoCarrinho($userId, $gameId): bool
{
    global $banco;

    $query = "SELECT * FROM cart WHERE user_id = $userId AND game_id = $gameId";
    $result = $banco->query($query);

    if ($result->num_rows > 0) {
        $query = "DELETE FROM cart WHERE user_id = $userId AND game_id = $gameId";
    } else {
        $query = "INSERT INTO cart (user_id, game_id) VALUES ($userId, $gameId)";
    }

    if ($banco->query($query)) {
        return true; 
    } else {
        return false;
    }
}

function verificarCarrinho($userId, $gameId): bool
{
    global $banco;

    $query = "SELECT * FROM cart WHERE user_id = $userId AND game_id = $gameId";
    $result = $banco->query($query);

    return $result->num_rows > 0;
}

function buscarFavoritos($userId): Array
{
    global $banco;

    $query = "SELECT * FROM favorites WHERE user_id = $userId";
    $result = $banco->query($query);

    $jogos = array();

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $jogos[] = $row;
        }
    }

    return $jogos;
}


function buscaFeatures() : Array
{
    global $banco;

    $query = "SELECT * FROM games WHERE isFeatured = true ORDER BY RAND() LIMIT 4";
    $result = $banco->query($query);

    $jogos = array();

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $jogos[] = $row;
        }
    }

    return $jogos;
}

function buscaUm(): object
 {
    global $banco;

    $query = "SELECT * FROM games WHERE isHero = true ORDER BY RAND() LIMIT 1;";
    $result = $banco->query($query);

    $jogo = array();

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $jogo[] = $row;
        }
    }

    return $jogo;
}

function buscaCarrinho($userId): Array
{
    global $banco;

    $query = "SELECT * FROM cart WHERE user_id = $userId";
    $result = $banco->query($query);

    $jogos = array();

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $jogos[] = $row;
        }
    }

    return $jogos;
}
?>
