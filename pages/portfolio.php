<?php
session_start();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portfolio</title>
        <link rel="stylesheet" href="/css/portfolio.css">
        <script src="https://unpkg.com/gsap@3.9.0/dist/gsap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="icon" href="img/ynovb.png" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
        <script src="/JS/animation.js"></script>
        <script src="/JS/log.js"></script>
        <script src="/JS/popup.js"></script>
    </head>

    <?php
        $database = new Database();
        $pdo = $database->getConnection();

        $query = $pdo->query("SELECT * FROM skills");
        $skills = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = $pdo->query("SELECT * FROM projets");
        $projets = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = $pdo->query("SELECT * FROM experience");
        $experiences = $query->fetchAll(PDO::FETCH_ASSOC);
    ?>
    
    <nav class="socials">
        <ul class="sociale">
            <li class="sociali"><a href="https://twitter.com/HallexxP">Twitter <i class="fa fa-twitter"></i></a></li>
            <li class="sociali"><a href="https://github.com/Hallexxx">Github <i class="fa fa-github"></i></a></li>
            <li class="sociali"><a href="https://www.linkedin.com/in/alexandre-perez-b3309b267/">Linkedin <i class="fa fa-linkedin"></i></a></li>
        </ul>
    </nav>

    <section id="home">
        <div class="container scroll-animation">
            <div class="image-container">
                <img src="images/perez.jpg" alt="Image" class="rounded-image">
                <div class="overlay-text">
                    <p>Nom : Perez <br></p>
                    <p>Prénom : Alexandre <br></p>
                    <p>Téléphone : 0667619382<br></p>
                    <p>Etude : Bachelor 2 Informatique <br></p>
                    <p>E-mail : alex.perezab470@gmail.com <br></p>
                    <p>Baccalauréat : Baccalauréat professionnel SN Mention Bien</p>
                </div>
            </div>
            <div class="container">
                <div class="pres">
                    <div class="text">
                        <h1>Bienvenue<br></h1>
                            <p>
                                Je m'appelle <span id="test">Alexandre Perez</span>, je suis actuellement en <em>deuxieme</em> année de Bachelor <em>Informatique</em> à l'école Ynov.<br>
                                J'aime le développement WEB <em>Front/End</em> et le développement Jeu Vidéo notamment sur <em>Unity</em> que j'ai déjà pratiqué.
                            </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="experience">
        <h1 class="title">Mes Compétences</h1>
        <div class="experience-details-container">
            <div class="about-containers">
                <?php
                $skills_group_1 = [];
                $skills_group_2 = [];
                
                if (count($skills) >= 2) {
                    $skills_group_1 = array_slice($skills, 0, ceil(count($skills) / 2));
                    $skills_group_2 = array_slice($skills, ceil(count($skills) / 2));
                } elseif (count($skills) == 1) {
                    $skills_group_1 = $skills;
                }
                
                echo '<div class="details-container">';
                if(isset($_SESSION['admin_log'])):
                    echo '<img class="info_img" src="/images/info.png" alt="" onclick="showPopup()">';
                endif;
                echo '<h2 class="experience-sub-title">Frontend Development</h2> ';
                echo '<img src="plus.png" alt="">';
                echo '<div class="article-container">';
                foreach ($skills_group_1 as $skill) {
                    echo '<article>';
                    echo '<img src="images/checkmark.png" alt="Experience icon" class="icon"/>';
                    echo '<div>';
                    if(isset($_SESSION['admin_log'])):
                        echo '<img src="/images/info.png" alt="Experience icon" class="icon" onclick="showPopup2(\'' . $skill['skill_name'] . '\', \'' . $skill['id'] . '\')"/>';
                    endif;
                    echo '<h3 class="skill-name">' . $skill['skill_name'] . '</h3>';
                    echo '<p>Maîtrise ' . $skill['niveau'] . '</p>';
                    echo '</div>';
                    echo '</article>';
                }
                echo '</div>';
                echo '</div>';

                echo '<div class="details-container">';
                if(isset($_SESSION['admin_log'])):
                    echo '<img class="info_img" src="/images/info.png" alt="" onclick="showPopup()">';
                endif;
                echo '<h2 class="experience-sub-title">Frontend Development</h2>';
                echo '<div class="article-container">';
                foreach ($skills_group_2 as $skill) {
                    echo '<article>';
                    echo '<img src="images/checkmark.png" alt="Experience icon" class="icon"/>';
                    echo '<div>';
                    if(isset($_SESSION['admin_log'])):
                        echo '<img src="/images/info.png" alt="Experience icon" class="icon" onclick="showPopup2(\'' . $skill['skill_name'] . '\', \'' . $skill['id'] . '\')"/>';
                    endif;
                    echo '<h3 class="skill-name">' . $skill['skill_name'] . '</h3>';
                    echo '<p>Maîtrise ' . $skill['niveau'] . '</p>';
                    echo '</div>';
                    echo '</article>';
                }
                echo '</div>';
                echo '</div>';
                ?>
            </div>
        </div>
    </section>

    <div id="popup" style="display: none;">
        <form class="add_comp" id="add-form" method="post" action="ajout_competence.php" enctype="multipart/form-data">
            <h3 id="popupTitle">Ajouter une compétence</h3>

            <label for="name">Nom</label>
            <input type="text" placeholder="Name" id="name" name="name">

            <label for="level">Niveau</label>
            <input type="text" placeholder="Niveau" id="level" name="level">

            <button type="submit">Ajouter la compétence</button>
            <button type="button" onclick="hidePopup()">Annuler</button>
        </form>
    </div>

    <div id="popup2" style="display: none;">
        <form id="update-comp-form">
            <input type="hidden" id="update-comp-id" name="comp-id" value="">
            
            <label for="update-name">Nom</label>
            <input type="text" placeholder="Name" id="update-name" name="new-name">

            <label for="update-niveau_comp">Niveau</label>
            <input type="text" placeholder="Niveau" id="update-niveau_comp" name="new-level">

            <button type="submit">Modifier la compétence</button>
        </form>

        <form id="delete-comp-form">
            <input type="hidden" id="delete-comp-id" name="comp-id" value="">

            <button type="submit">Supprimer la compétence</button>
        </form>

        <button type="button" onclick="hidePopup2()">Annuler</button>
    </div>



    <section id="projects">
        <h1 class="title">Mes Projets</h1>
        <div class="experience-details-container" >
            <div class="about-containers" id="reduc">
                <?php
                    if(isset($_SESSION['admin_log'])):
                        echo '<img class="plus_pro" src="/images/plus.png" alt="" onclick="showPopup5()">';
                    endif;
                ?>
                <?php
                foreach ($projets as $projet) {
                    echo '<div class="details-container color-container">';
                    echo '<div class="article-container">';
                    if(isset($_SESSION['admin_log'])):
                        echo '<img class="infos_img" src="/images/info.png" alt="" onclick="showPopup6(' . $projet['id'] . ')">';
                    endif;
                    echo '<img src="' . $projet['img_projets'] . '" alt="' . $projet['name_projets'] . '" class="project-img"/>';
                    echo '</div>';
                    echo '<h2 class="experience-sub-title project-title">' . $projet['name_projets'] . '</h2>';
                    echo '<div class="btn-container">';
                    echo '<button class="btn btn-color-2 project-btn" onclick="location.href=\'#\'">Live Demo</button>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>

    <div id="popup5" style="display: none;">
        <form class="add_pro" id="add-pro" method="post" action="ajout_projets.php" enctype="multipart/form-data">
            <h3 id="popupTitle">Ajouter un projet</h3>

            <label for="name">Nom</label>
            <input type="text" placeholder="Name" id="name" name="name">

            <label for="img_projets">Image du Projet</label>
            <input type="file" id="img_projets" name="img_projets" accept="image/*">

            <button type="submit">Ajouter le projets</button>
            <button type="button" onclick="hidePopup5()">Annuler</button>
        </form>
    </div>

    <div id="popup6" style="display: none;">
        <form id="update-project-form">
            <input type="hidden" id="update-project-id" name="project-id" value="">
            
            <label for="update-name">Nom</label>
            <input type="text" placeholder="Name" id="update-name" name="new-name">

            <label for="update-img_projets">Image du Projet</label>
            <input type="file" id="update-img_projets" name="new-image" accept="image/*">

            <button type="submit">Modifier le projet</button>
        </form>

        <form id="delete-project-form">
            <input type="hidden" id="delete-project-id" name="project-id" value="">

            <button type="submit">Supprimer le projet</button>
        </form>

        <button type="button" onclick="hidePopup6()">Annuler</button>
    </div>



    <section id="stage">
        <h1 class="title">Mes Expériences</h1>
        <div class="experience-details-container">
            <?php
                if(isset($_SESSION['admin_log'])):
                    echo '<img class="plus_pro" src="/images/plus.png" alt="" onclick="showPopup7()">';
                endif;
            ?>
            <div class="about-containers">
                <i class="slider">
                    <?php
                    foreach ($experiences as $experience) {
                        echo '<input checked type="radio" name="s" style="background-image: url(\'' . $experience['img_experience'] . '\');" title="' . $experience['name_experience'] . '">';
                    }
                    ?>
                </i>
            </div>
        </div>
    </section>


    <div id="popup7" style="display: none;">
        <form class="add_pro" id="add-experience" method="post" action="ajout_experience.php" enctype="multipart/form-data">
            <h3 id="popupTitle">Ajouter une expérience</h3>

            <label for="name_experience">Nom de l'expérience</label>
            <input type="text" placeholder="Nom" id="name_experience" name="name_experience">

            <label for="img_experience">Image de l'Expérience</label>
            <input type="file" id="img_experience" name="img_experience" accept="image/*">

            <button type="submit">Ajouter l'expérience</button>
            <button type="button" onclick="hidePopup7()">Annuler</button>
        </form>
    </div>


    <div id="popup8" style="display: none;">
        <form class="modif_comp" method="post" action="">
            <h3>Modifier la compétence</h3>

            <label for="name">Nom</label>
            <input type="text" placeholder="Name" id="name" name="name">
            <input type="hidden" id="skillId" name="id" value="">

            <label for="level">Niveau</label>
            <input type="text" placeholder="Niveau" id="level" name="level">

            <button type="submit" name="update">Modifier la compétence</button>
            <button type="submit" name="delete">Supprimer la compétence</button>
            <button type="button" onclick="hidePopup8()">Annuler</button>
        </form>
    </div>

</html>
        <?php
        include('includes/footer.php');
        ?>