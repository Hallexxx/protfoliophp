<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/blog.css">
        <script src="https://unpkg.com/gsap@3.9.0/dist/gsap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <script src="/animation.js"></script>
    </head>
    <nav class="navbar">
            <div class="logo">Alexandre Perez</div>
            <ul class="nav-list">
                <li class="menu-deroulant"><a href="/">Accueil</a></li>
                <li class="menu-deroulant"><a href="/contact">Contact</a></li></li>
                <?php
                    // Vérifier si l'utilisateur est en mode admin
                    if (isset($_SESSION['admin']) && $_SESSION['admin']) {
                        echo '<li class="menu-deroulant" id="logout-link"><a href="#">Déconnexion</a></li>';
                    }else{
                        echo '<li class="menu-deroulant" id="logout-link"><a href="#">Se connecter</a></li>';
                    }
                ?>
    </nav>
    <aside class="navleft">
        <div class="div_tags">
            <div class="element_tag">
                <h4 class="fil fil1"><span class="hover-underline-animation">Messagerie</span><img src="../images/email.png" alt=""></h4>
                <h4 class="fil fil2"><span class="hover-underline-animation">Tous mes postes</span><img src="../images/post.png" alt=""></h4>
                <h4 class="fil fil3"><span class="hover-underline-animation">Trier par date</span><img src="../images/mobile.png" alt=""></h4>
                <h4 class="fil fil4"><span class="hover-underline-animation">Tag 4</span></h4>
            </div>
        </div>
    </aside>
    <div class="container">
        <div class="card">
            <div class="card__header">
            <img src="https://source.unsplash.com/600x400/?computer" alt="card__image" class="card__image" width="600">
            </div>
            <div class="card__body">
            <span class="tag tag-blue">Technology</span>
            <h4>What's new in 2022 Tech</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!</p>
            </div>
            <div class="card__footer">
            <div class="user">
                <img src="https://i.pravatar.cc/40?img=1" alt="user__image" class="user__image">
                <div class="user__info">
                <h5>Jane Doe</h5>
                <small>2h ago</small>
                </div>
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card__header">
            <img src="https://source.unsplash.com/600x400/?food" alt="card__image" class="card__image" width="600">
            </div>
            <div class="card__body">
            <span class="tag tag-brown">Food</span>
            <h4>Delicious Food</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!</p>
            </div>
            <div class="card__footer">
            <div class="user">
                <img src="https://i.pravatar.cc/40?img=2" alt="user__image" class="user__image">
                <div class="user__info">
                <h5>Jony Doe</h5>
                <small>Yesterday</small>
                </div>
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card__header">
            <img src="https://source.unsplash.com/600x400/?car,automobile" alt="card__image" class="card__image" width="600">
            </div>
            <div class="card__body">
            <span class="tag tag-red">Automobile</span>
            <h4>Race to your heart content</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!</p>
            </div>
            <div class="card__footer">
            <div class="user">
                <img src="https://i.pravatar.cc/40?img=3" alt="user__image" class="user__image">
                <div class="user__info">
                <h5>John Doe</h5>
                <small>2d ago</small>
                </div>
            </div>
            </div>
        </div>
    </div>
</html>
