

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

    $q = "INSERT INTO users ( email, username, password) VALUES ( '$email', '$username', '$password')";

    $resp = $banco->query($q);

    if ($debug) {
        echo "<br> Query: $q";
        echo var_dump($resp);
    }
}
?>

