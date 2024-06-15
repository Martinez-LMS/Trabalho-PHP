<?php
$banco = new mysqli("localhost:3306", "root", "", "gamehub");

function createOnDB($into, $values)
{
    global $banco;
    $q = "INSERT INTO $into VALUES $values";
    $banco->query($q);
}

function criarUsuario(string $email, string $username, string $password, $debug = false): void
{
    global $banco;

    $password = password_hash($password, PASSWORD_DEFAULT);

    $q = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";

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

function buscaJogoPorId($id) : object
{
    global $banco;

    $q = "SELECT * FROM GAMES WHERE ID = $id";
    $gameResult = $banco->query($q);

    return $gameResult->fetch_object();
}

?>
