<?php
$banco = new mysqli("localhost:3306", "root", "", "gamehub");

function createOnDB($into, $values)
{
    global $banco;
    $q = "INSERT INTO $into VALUES $values";
    $banco->query($q);
}

function criarUsuario(string $username , string $email, string $password, $debug = false): void
{
    global $banco;

    $password = password_hash($password, PASSWORD_DEFAULT);

    $q = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    $resp = $banco->query($q);

    if ($debug) {
        echo "<br> Query: $q";
        echo var_dump($resp);
    }
}

function buscaJogos() : array 
{
    global $banco;

    $q = "SELECT * FROM games";
    $result = $banco->query($q);

    $jogos = array();

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $jogos[] = $row; 
        }
    }

    return $jogos;
}

function buscarJogoPorId($id) {
    global $banco;

    $id = $banco->real_escape_string($id);
    $q = "SELECT * FROM games WHERE id = $id";
    $result = $banco->query($q);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null; 
    }
}

function cadastrarJogo($name, $description, $imageUrl, $videoUrl, $price, $producer, $language, $isHero, $isFeatured)
{
    global $banco;

    $name = $banco->real_escape_string($name);
    $description = $banco->real_escape_string($description);
    $imageUrl = $banco->real_escape_string($imageUrl);
    $videoUrl = $banco->real_escape_string($videoUrl);
    $price = $banco->real_escape_string($price);
    $producer = $banco->real_escape_string($producer);
    $language = $banco->real_escape_string($language);
    $isHero = $isHero ? 1 : 0; 
    $isFeatured = $isFeatured ? 1 : 0; 

    $query = "INSERT INTO games (name, description, imageUrl, videoUrl, price, producer, language, isHero, isFeatured) 
              VALUES ('$name', '$description', '$imageUrl', '$videoUrl', '$price', '$producer', '$language', '$isHero', '$isFeatured')";

    if ($banco->query($query) === TRUE) {
        return true; 
    } else {
        return false; 
    }
}

function atualizarJogo($id, $name, $description, $imageUrl, $videoUrl, $price, $producer, $language, $isHero, $isFeatured)
{
    global $banco;

    $id = $banco->real_escape_string($id);
    $name = $banco->real_escape_string($name);
    $description = $banco->real_escape_string($description);
    $imageUrl = $banco->real_escape_string($imageUrl);
    $videoUrl = $banco->real_escape_string($videoUrl);
    $price = $banco->real_escape_string($price);
    $producer = $banco->real_escape_string($producer);
    $language = $banco->real_escape_string($language);
    $isHero = $isHero ? 1 : 0; 
    $isFeatured = $isFeatured ? 1 : 0; 

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

    if ($banco->query($query) === TRUE) {
        return true; 
    } else {
        return false;
    }
}


function deletarJogo($id) : void
{
    global $banco;

    $id = $banco->real_escape_string($id);

    $q = "DELETE FROM games WHERE id = $id";
    $banco->query($q);

    header("Location: ../../area_admin.php");
    exit;
}
?>
