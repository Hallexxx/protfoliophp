function showPopup() {
    var popup = document.getElementById('popup');
    if (popup) {
        popup.style.display = 'block';
    }
}

function hidePopup() {
    var popup = document.getElementById('popup');
    if (popup) {
        popup.style.display = 'none';
    }
}

function addCompetence(e) {
    e.preventDefault();
    // Récupérez les données du formulaire
    var name = document.getElementById('name').value;
    var level = document.getElementById('level').value;

    // Créez un objet FormData pour envoyer les données du formulaire
    var formData = new FormData();
    formData.append('name', name);
    formData.append('level', level);

    // Créez et configurez l'objet XMLHttpRequest
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajout_competence.php', true);

    // Configurez la fonction de rappel pour gérer la réponse
    xhr.onload = function () {
        if (xhr.status === 200) {
            // La requête a réussi
            console.log(xhr.responseText);
            hidePopup(); // Cacher la popup après l'ajout de la compétence
        } else {
            // La requête a échoué
            console.error(xhr.statusText);
        }
    };

    // Envoyez les données du formulaire à l'aide de l'objet FormData
    xhr.send(formData);
}

function showPopup2() {
    var popup2 = document.getElementById('popup2');
    if (popup2) {
        popup2.style.display = 'block';
    }
}

function hidePopup2() {
    var popup2 = document.getElementById('popup2');
    if (popup2) {
        popup2.style.display = 'none';
    }
}