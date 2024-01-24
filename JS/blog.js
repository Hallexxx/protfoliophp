document.addEventListener("DOMContentLoaded", function () {
    var tag4 = document.getElementById("tag4");

    if (tag4) {
        tag4.addEventListener("click", function () {
            // Afficher le sélecteur
            var selectContainer = document.getElementById("selectContainer");

            if (selectContainer) {
                selectContainer.style.display = "block";

                fetch("Categories.php")
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log("Categories data:", data);

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
                })
                .catch(error => console.error("Error fetching categories:", error));


            }
        });
    }
});

function filterPosts() {
    var selectedCategory = document.getElementById("categorySelect").value;

    console.log("Selected category:", selectedCategory);

    // Effectuer une requête AJAX pour récupérer les articles filtrés
    fetch("FilterPosts.php?category=" + encodeURIComponent(selectedCategory))
        .then(response => response.json())
        .then(data => {
            console.log("Filtered posts data:", data);

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
        })
        .catch(error => console.error("Error filtering posts:", error));
}


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
document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('#add-art').addEventListener('submit', async (e) => {
        e.preventDefault();

        const response = await fetch('/includes/ajout_blog.php', {
            method: 'POST',
            body: new FormData(e.target),
        });

        if (response.ok) {
            window.location.reload();
            console.log("oui")
        } else {
            console.error('Error:', response.statusText);
        }
    });
});



function showPopup4(postId, title, category, descriptions, author) {
    console.log('showPopup4 called with:', postId, title, category, descriptions, author);

    // Mettez à jour les champs dans les formulaires avec les données du post sélectionné
    document.getElementById('update-post-id').value = postId;
    document.getElementById('delete-post-id').value = postId;
    // ... autres champs ...

    var popup4 = document.getElementById('popup4');
    if (popup4) {
        console.log('Setting display to block');
        popup4.style.display = 'block';
    }
}


document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('update-post-form').addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(e.target);

        const response = await fetch('/includes/update_post.php', {
            method: 'POST',
            body: formData,
        });

        if (response.ok) {
            window.location.reload();
        } else {
            const errorData = await response.json();
            console.error('Error updating post:', errorData.message);
        }
    });

    document.getElementById('delete-post-form').addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(e.target);

        const response = await fetch('/includes/delete_post.php', {
            method: 'POST',
            body: formData,
        });

        if (response.ok) {
            window.location.reload();
        } else {
            console.error('Error deleting post:', response.status);
        }
    });
});

function hidePopup4() {
    var popup4 = document.getElementById('popup4');
    if (popup4) {
        popup4.style.display = 'none';
    }
}
