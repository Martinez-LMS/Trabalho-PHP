<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="" method="post">
        <label for="">Usuario:</label>
        <input type="text" name="usuario" id="">
        <br>

        <label for="">Nome:</label>
        <input type="text" name="nome" id="">
        <br>

        <label for="">Senha:</label>
        <input type="text" name="senha" id="">
        <br>

        <input type="submit" value="Criar">
    </form>

    <?php
    require_once "banco.php";

    $usu = $_POST["usuario"] ?? null;
    $nom = $_POST["nome"] ?? null;
    $sen = $_POST["senha"] ?? null;

    if (is_null($usu) || is_null($nom) || is_null($sen)) {
        echo "<p>Por favor preencha todos os campos</p>";
    } else {
        criarUsuario($usu, $nom, $sen);
        echo "Usuario criado com sucesso!";
    }
    ?>

</body>

</html>