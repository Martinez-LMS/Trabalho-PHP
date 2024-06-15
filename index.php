<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub</title>
    <link rel="stylesheet" href="../Trabalho-PHP/styles/styles.css">
    <link rel="stylesheet" href="../../Trabalho-PHP/styles/gameCard.css">
</head>
<body>
<?php require_once "PHP/header.php"; ?>

    
    <main>
        <section class="hero">
            <div class="video-container">
                <iframe src="https://www.youtube.com/embed/HLUY1nICQRY?autoplay=1&mute=1&controls=0&showinfo=0&rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <div class="hero-content">
                <h1>Jogue sempre para vencer</h1>
                <div class="hero-desc">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam commodi, dolorem illo veritatis illum laborum pariatur ex deserunt culpa voluptates, perspiciatis non voluptatem quisquam natus blanditiis iusto adipisci, at eos!</p>
                </div>
                <div class="hero-buttons-conteiner">
                    <button class="hero-btn-confira">CONFIRA</button>
                    <button class="hero-btn-vermais">VER MAIS</button>
                </div>
            </div>
        </section>
        
        
        <section class="popular-games">
            <div class="popular-games-container-cards">
                <div>
                    <h2>OS JOGOS MAIS POPULARES SOBRE LUTA E GUERRA</h2>
                </div>
                <div class="game-cards">
                    <div class="game-card">
                        <div class="heart-circle">
                            <img src="" alt="">
                        </div>                        
                        <div class="image"></div>
                        <div class="title">Image Title</div>
                        <div class="desc">Description</div>
                    </div>
                    <div class="game-card">
                        <div class="heart-circle">
                            <img src="" alt="">
                        </div>                        
                        <div class="image"></div>
                        <div class="title">Image Title</div>
                        <div class="desc">Description</div>
                    </div>
                    <div class="game-card">
                        <div class="heart-circle">
                            <img src="" alt="">
                        </div>                        
                        <div class="image"></div>
                        <div class="title">Image Title</div>
                        <div class="desc">Description</div>
                    </div>
                    <div class="game-card">
                        <div class="heart-circle">
                            <img src="" alt="">
                        </div>                        
                        <div class="image"></div>
                        <div class="title">Image Title</div>
                        <div class="desc">Description</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="featured-game">
            <div class="container">
                <div class="game-detail">
                    <img src="" alt="" class="image">
                    <div class="featured-game-content">
                        <h2 class="text-content">Um jogo de Guerra que fara seu sangue ferver</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut eros eu quam pharetra aliquet. Proin ut ex eros.</p>
                        <div class="buttons">
                            <button class="hero-btn-confira">CONFIRA</button>
                            <button class="hero-btn-vermais-bg">VER MAIS</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="recommended-games">
            <h2>Jogos recomendados para você nessa semana</h2>
            <div class="recommended-games-container">
                <div class="game-card">
                    <div class="image">Jogo</div>
                    <div class="desc">Ação, Aventura</div>
                    <button class="game-btn-confira">CONFIRA</button>
                </div>
                <div class="game-card">
                    <div class="image">Jogo</div>
                    <div class="desc">Estratégia, Ação</div>
                    <button class="game-btn-confira">CONFIRA</button>
                </div>
                <div class="game-card">
                    <div class="image">Jogo</div>
                    <div class="desc">Aventura</div>
                    <button class="game-btn-confira">CONFIRA</button>
                </div>
                <div class="game-card">
                    <div class="image">Jogo</div>
                    <div class="desc">Aventura</div>
                    <button class="game-btn-confira">CONFIRA</button>
                </div>
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