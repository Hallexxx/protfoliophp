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