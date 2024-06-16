<?php

require_once "banco.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    deletarJogo($id);
} else {
    header("Location: ../../Trabalho-PHP/PHP/area_admin.php");
    exit;
}
?>
