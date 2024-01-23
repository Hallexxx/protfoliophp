document.addEventListener("DOMContentLoaded", function () {
    var tag4 = document.getElementById("tag4");

    if (tag4) {
        tag4.addEventListener("click", function () {
            // Afficher le sélecteur
            var selectContainer = document.getElementById("selectContainer");

            if (selectContainer) {
                selectContainer.style.display = "block";

                fetch("Categories.php")
                    .then(response => response.json())
                    .then(data => {
                        var select = document.getElementById("categorySelect");

                        // Supprimer les anciennes options
                        select.innerHTML = "";

                        // Ajouter une option par catégorie
                        data.forEach(function (category) {
                            var option = document.createElement("option");
                            option.value = category;
                            option.textContent = category;
                            select.appendChild(option);
                        });
                    });
            }
        });
    }
});

function filterPosts() {
    var selectedCategory = document.getElementById("categorySelect").value;

    // Effectuer une requête AJAX pour récupérer les articles filtrés
    fetch("FilterPosts.php?category=" + encodeURIComponent(selectedCategory))
        .then(response => response.json())
        .then(data => {
            var blogPostsContainer = document.getElementById("blog");
            blogPostsContainer.innerHTML = ""; // Effacer les anciens articles

            // Afficher les nouveaux articles
            data.forEach(function (post) {
                var card = document.createElement("div");
                card.className = "card";

                blogPostsContainer.appendChild(card);
            });

            var selectContainer = document.getElementById("selectContainer");
            if (selectContainer) {
                selectContainer.style.display = "none";
            }
        });
}

document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('#add-art').addEventListener('submit', async (e) => {
        e.preventDefault();

        const response = await fetch('/includes/ajout_blog.php', {
            method: 'POST',
            body: new FormData(e.target),
        });

        if (response.ok) {
            // window.location.reload();
            console.log("oui")
        } else {
            console.error('Error:', response.statusText);
        }
    });
});


function showPopup3() {
    var popup3 = document.getElementById('popup3');
    if (popup3) {
        popup3.style.display = 'block';
    }
}

function hidePopup3() {
    var popup3 = document.getElementById('popup3');
    if (popup3) {
        popup3.style.display = 'none';
    }
}

function showPopup4(postId) {
    // Récupérer les détails du post en fonction de l'ID et les afficher dans le formulaire
    fetch('get_post_details.php?id=' + postId)
        .then(response => response.text())
        .then(data => {
            try {
                const jsonData = JSON.parse(data);
                document.getElementById('title').value = jsonData.title;
                document.getElementById('category').value = jsonData.category;
                document.getElementById('descriptions').value = jsonData.description;
                document.getElementById('author').value = jsonData.author;

                var popup4 = document.getElementById('popup4');
                if (popup4) {
                    popup4.style.display = 'block';
                }
            } catch (error) {
                console.error("Error parsing JSON:", error);
            }
        })
        .catch(error => console.error("Fetch error:", error));
}

function hidePopup4() {
    var popup4 = document.getElementById('popup4');
    if (popup4) {
        popup4.style.display = 'none';
    }
}
