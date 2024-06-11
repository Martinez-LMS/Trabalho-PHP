<pre>

<?php
$banco = new mysqli("localhost:3307", "root", "", "trabalhoPHP");
function createOnDB($into, $values)
{
    global $banco;
    $q = "INSERT INTO $into VALUES $values";
    $banco->query($q);
}

function criarUsuario(string $usuario, string $nome, string $senha, $debug = false): void
{
    global $banco;

    $senha = password_hash($senha, PASSWORD_DEFAULT);

    $q = "INSERT INTO usuarios(cod, usuario, nome, senha) VALUES (NULL, '$usuario', '$nome', '$senha')";

    $resp = $banco->query($q);

    if ($debug) {
        echo "<br> Query: $q";
        echo var_dump($resp);
    }
}
?>

</pre>