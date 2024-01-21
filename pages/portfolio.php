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
        <script src="/animation.js"></script>
    </head>

    <?php
        $database = new Database();
        $pdo = $database->getConnection();

        // Récupérer les compétences depuis la base de données
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
                $skills_group_1 = array_slice($skills, 0, count($skills) / 2);
                $skills_group_2 = array_slice($skills, count($skills) / 2);

                echo '<div class="details-container">';
                echo '<h2 class="experience-sub-title">Frontend Development</h2>';
                echo '<img src="plus.png" alt="">';
                echo '<div class="article-container">';
                foreach ($skills_group_1 as $skill) {
                    echo '<article>';
                    echo '<img src="images/checkmark.png" alt="Experience icon" class="icon"/>';
                    echo '<img src="info.png" alt="">';
                    echo '<div>';
                    echo '<h3>' . $skill['skill_name'] . '</h3>';
                    echo '<p>Maîtrise ' . $skill['niveau'] . '</p>';
                    echo '</div>';
                    echo '</article>';
                }
                echo '</div>';
                echo '</div>';

                // Afficher le deuxième groupe
                echo '<div class="details-container">';
                echo '<h2 class="experience-sub-title">Frontend Development</h2>';
                echo '<div class="article-container">';
                foreach ($skills_group_2 as $skill) {
                    echo '<article>';
                    echo '<img src="images/checkmark.png" alt="Experience icon" class="icon"/>';
                    echo '<div>';
                    echo '<h3>' . $skill['skill_name'] . '</h3>';
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

    <section id="projects">
        <h1 class="title">Mes Projets</h1>
        <div class="experience-details-container" >
            <div class="about-containers">
                <?php
                foreach ($projets as $projet) {
                    echo '<div class="details-container color-container">';
                    echo '<div class="article-container">';
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

    <!-- <section id="projects">
        <h1 class="title">Mes Projets</h1>
        <div class="experience-details-container">
            <div class="about-containers">
                <div class="details-container color-container">
                    <div class="article-container">
                        <img src="images/r6_pack.png" alt="Project 3" class="project-img"/>
                    </div>
                    <h2 class="experience-sub-title project-title">Site R6 Packs</h2>
                    <div class="btn-container">
                        <button class="btn btn-color-2 project-btn" onclick="location.href='r6_pack.fr'">Live Demo</button>
                    </div>
                </div>
                <div class="details-container color-container1">
                    <div class="article-container">
                        <img src="images/r6_pack.png" alt="Project 3" class="project-img"/>
                    </div>
                    <h2 class="experience-sub-title project-title">Portfolio PHP</h2>
                    <div class="btn-container">
                        <button class="btn btn-color-2 project-btn" onclick="location.href='portfoliophp.fr'">Live Demo</button>
                    </div>
                </div>
                <div class="details-container color-container">
                    <div class="article-container">
                        <img src="images/2d.png" alt="Project 3" class="project-img"/>
                    </div>
                    <h2 class="experience-sub-title project-title">Site Planning</h2>
                    <div class="btn-container">
                        <button class="btn btn-color-2 project-btn" onclick="location.href='planning.fr'">Live Demo</button>
                    </div>
                </div>
            </div>
        </div>
    </section> -->


    <section id="stage">
        <h1 class="title">Mes Expériences</h1>
        <div class="experience-details-container">
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

</html>
        <?php
        include('includes/footer.php');
        ?>