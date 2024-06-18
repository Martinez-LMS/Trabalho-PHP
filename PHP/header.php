<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    .cart-icon {
        color: white;
        cursor: pointer;
    }
</style>

</head>

<header>
    <div class="container">
        <div class="left">
            <div class="logo">
                <a href="/">
                    <img src="../../Trabalho-PHP/assets/logo.png" alt="logo">
                </a>
                <a href="../../Trabalho-PHP/">
                    <h1>GAMEHUB</h1>
                </a>
            </div>
            <nav>
                <ul>
                    <li><a href="../../Trabalho-PHP/">Home</a></li>
                    <li><a href="../../Trabalho-PHP/PHP/allgames.php">Jogos</a></li>
                    <?php
                    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                        echo '<li><a href="../../Trabalho-PHP/PHP/area_admin.php">Admin Area</a></li>';
                    }
                    ?>
                    
                    
                </ul>
            </nav>
        </div>
        <div class="auth-buttons">
            <section class="carts">
            <?php
            if (isset($_SESSION['usuario'])) {
                echo '<a href="../../Trabalho-PHP/PHP/carrinho.php"><i class="fa fa-shopping-cart cart-icon"></i></a>';
                echo '<a href ="../../Trabalho-PHP/PHP/favorites.php" class="fa-regular fa-heart" style="color: white;"></a>';
            }
            ?>
            </section>
            <?php
            if (isset($_SESSION['usuario'])) {
                echo '<span class="user-name">' . htmlspecialchars($_SESSION['nome']) . '</span>'; 
                echo '<a href="../../Trabalho-PHP/PHP/logout.php" class="sign-out">Log-out</a>';           
            } else {
                echo '<a href="../../Trabalho-PHP/PHP/login.php" class="sign-in">Sign In</a>';
                echo '<a href="../../Trabalho-PHP/PHP/cadastro.php" class="sign-up">Sign Up</a>';
            }
            ?>
        </div>
    </div>
</header>
