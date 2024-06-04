<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Login</title>
    <link rel="stylesheet" href="/styles/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="left">
                <div class="logo">
                    <a href="/">
                        <img src="assets/logo.png" alt="logo">
                    </a>
                    <a href="">
                        <h1>GAMEHUB</h1>
                    </a>
                </div>
                <nav>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Categorias</a></li>
                    </ul>
                </nav>
            </div>
            <div class="auth-buttons">
                <a href="login.php" class="sign-in">Sign In</a>
                <a href="signup.php" class="sign-up">Sign Up</a>
            </div>
        </div>
    </header>

    <main>
        <section class="login-section">
            <div class="container">
                <h2>Login</h2>
                <form action="login_process.php" method="post">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required><br><br>
                    
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required><br><br>
                    
                    <button type="submit">Login</button>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-left">
                <div class="logo">GameHub</div>
                <p>All right reserved &copy; GameHub 2024</p>
            </div>
            <div class="footer-right">
                <ul>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>
