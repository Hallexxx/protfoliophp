<?php
session_start();
?>
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
            </ul>
    </nav>
    <aside class="navleft">
        <div class="div_tags">
            <div class="element_tag">
            <?php
                if(isset($_SESSION['admin_log'])):
                    echo '<h4 class="fil fil1" onclick="redirectToMessage()"><span class="hover-underline-animation">Messagerie</span><img src="../images/email.png" alt=""></h4>';
                else:
                    echo '<h4 class="fil fil1" onclick="noadmin()"><span class="hover-underline-animation">Messagerie</span><img src="../images/email.png" alt=""></h4>'; 
                endif;
            ?>

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

        $blog_posts = $result->fetchAll(PDO::FETCH_ASSOC);
    ?>
     
    <?php
        if(isset($_SESSION['admin_log'])):
            echo '<img class="add_blog" src="/images/plus.png" onclick="showPopup3()" alt="">';
        endif;
    ?>
        
    <div class="container">
    <?php
        if ($result->rowCount() > 0) {
            foreach ($blog_posts as $post) {
                echo '<div class="card">';
                echo '<div class="card__header">';
                if(isset($_SESSION['admin_log'])):
                    echo '<img class="mod_blog" src="/images/info.png" alt="Experience icon" class="icon" onclick="showPopup4(' . $post['id'] . ')"/>';
                endif;
                echo '<img src="https://source.unsplash.com/600x400/?' . urlencode($post['category']) . '" alt="card__image" class="card__image" width="600">';
                echo '</div>';
                echo '<div class="card__body">';
                echo '<span class="tag tag-blue">' . htmlspecialchars($post['category']) . '</span>';
                echo '<h4>' . htmlspecialchars($post['title']) . '</h4>';
                echo '<p>' . htmlspecialchars($post['description']) . '</p>';
                echo '<a href="/article/' . $post['id'] . '">En savoir plus</a>';
                echo '</div>';
                echo '<div class="card__footer">';
                echo '<div class="user">';
                echo '<div class="user__info">';
                echo '<h5>' . htmlspecialchars($post['author']) . '</h5>';
                echo '<small>' . date('F j, Y, g:i a', strtotime($post['created_at'])) . '</small>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo 'Aucun article de blog trouvé.';
        }
    ?>

    <div id="popup3" style="display: none;">
        <form class="add_art" id="add-art" method="post" action="ajout_blog.php" enctype="multipart/form-data">
            <h3 id="popupTitle">Ajouter un post</h3>
            <input type="hidden" id="postId" name="postId" value="">

            <label for="title">title</label>
            <input type="text" placeholder="title" id="title" name="title">

            <label for="category">category</label>
            <input type="text" placeholder="category" id="category" name="category">

            <label for="descriptions">descriptions</label>
            <input type="text" placeholder="descriptions" id="descriptions" name="descriptions">
            
            <label for="author">author</label>
            <input type="text" placeholder="author" id="author" name="author">

            <button type="submit">Ajouter la compétence</button>
            <button type="button" onclick="hidePopup3()">Annuler</button>
        </form>;
    </div>

    <div id="popup4" style="display: none;">
        <form class="modif_blog" method="post" action="">
            <h3>Modifier le post</h3>

            <label for="title">title</label>
            <input type="text" placeholder="title" id="title" name="title">

            <label for="category">category</label>
            <input type="text" placeholder="category" id="category" name="category">

            <label for="descriptions">descriptions</label>
            <input type="text" placeholder="descriptions" id="descriptions" name="descriptions">
            
            <label for="author">author</label>
            <input type="text" placeholder="author" id="author" name="author">

            <button type="submit" name="update">Modifier la compétence</button>
            <button type="submit" name="delete">Supprimer la compétence</button>
            <button type="button" onclick="hidePopup4()">Annuler</button>
        </form>
    </div>
    <script>
        function redirectToMessage() {
            // Ajoutez ici le code pour rediriger vers l'URL souhaitée
            window.location.href = "/message";
        }
        function noadmin() {
            alert("Vous devez être admin");
        }
    </script>
</html>
