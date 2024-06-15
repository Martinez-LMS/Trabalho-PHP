<header>
        <div class="container">
            <div class="left">
                <div class="logo">
                    <a href="/">
                        <img src="assets/logo.png" alt="logo">
                    </a>
                    <a href="/">
                        <h1>GAMEHUB</h1>
                    </a>
                </div>
                <nav>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="PHP/allgames.html">Jogos</a></li>
                    </ul>
                </nav>
            </div>
            <div class="auth-buttons">
                <?php
                session_start();
                if (isset($_SESSION['usuario'])) {
                    echo '<a href="logout.php" class="sign-out">Logout (' . htmlspecialchars($_SESSION['nome']) . ')</a>';
                } else {
                    echo '<a href="login.php" class="sign-in">Sign In</a>';
                    echo '<a href="signup.html" class="sign-up">Sign Up</a>';
                }
                ?>
            </div>
        </div>
    </header>