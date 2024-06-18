<?php
session_start(); // Inicia a sessão
require_once "banco.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['game_id'])) {
    $usuario_id = $_SESSION['usuario']; 


        $gameId = $_POST['game_id'];
        
        adicionarAosFavoritos( $usuario_id, $gameId);

        header("Location: gameDetail.php?id=" . $gameId);
        exit();
  
} else {
    header("Location: error.php");
    exit();
}
?>
