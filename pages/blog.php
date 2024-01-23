<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/blog.css">
        <script src="https://unpkg.com/gsap@3.9.0/dist/gsap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <script src="/JS/animation.js"></script>
        <script src="/JS/blog.js"></script>
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
                        echo '<li class="menu-deroulant""><a href="/login">Se connecter</a></li>';
                    }
                ?>
    </nav>
    <aside class="navleft">
        <div class="div_tags">
            <div class="element_tag">
                <h4 class="fil fil1"><span class="hover-underline-animation">Messagerie</span><img src="../images/email.png" alt=""></h4>
                <h4 class="fil fil2"><span class="hover-underline-animation">Tous mes postes</span><img src="../images/post.png" alt=""></h4>
                <h4 class="fil fil3"><span class="hover-underline-animation">Trier par date</span><img src="../images/mobile.png" alt=""></h4>
                <h4 class="fil fil4" id="tag4"><span class="hover-underline-animation">Tag 4</span></h4>
            </div>
        </div>
        <form id="selectContainer" style="display: none;">
            <div id="select-box">
                <select id="categorySelect">
                </select>
                <button type="button" onclick="filterPosts()">Filtrer</button>
            </div>
        </form>
    </aside>
    <?php
        $database = new Database();
        $pdo = $database->getConnection();
        $sql = "SELECT * FROM `blog_posts` ORDER BY `created_at` DESC";
        $result = $pdo->query($sql);
    ?>
      
    <div class="container">
        <?php
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="card">';
                    echo '<div class="card__header">';
                    echo '<img src="https://source.unsplash.com/600x400/?' . urlencode($row['category']) . '" alt="card__image" class="card__image" width="600">';
                    echo '</div>';
                    echo '<div class="card__body">';
                    echo '<span class="tag tag-blue">' . htmlspecialchars($row['category']) . '</span>';
                    echo '<h4>' . htmlspecialchars($row['title']) . '</h4>';
                    echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                    echo '<a href="/article/' . $row['id'] . '">En savoir plus</a>';
                    echo '</div>';
                    echo '<div class="card__footer">';
                    echo '<div class="user">';
                    echo '<div class="user__info">';
                    echo '<h5>' . htmlspecialchars($row['author']) . '</h5>';
                    echo '<small>' . date('F j, Y, g:i a', strtotime($row['created_at'])) . '</small>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo 'Aucun article de blog trouvé.';
            }
            ?>
    </div>
</html>
