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

document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('#add-form').addEventListener('submit', async (e) => {
        e.preventDefault();
        console.log(e.target);

        const response = await fetch('/includes/ajout_competence.php', {
            method: 'POST',
            body: new FormData(e.target),
        });
        if (response.ok) {
            window.location.reload();
        }
    });
});

function showPopup2(skillName, skillId) {
    console.log('showPopup2 called with:', skillName, skillId);
    document.getElementById('name').value = skillName;
    document.getElementById('skillId').value = skillId;
    var popup2 = document.getElementById('popup2');
    if (popup2) {
        console.log('Setting display to block');
        popup2.style.display = 'block';
    }
}


function hidePopup2() {
    var popup2 = document.getElementById('popup2');
    if (popup2) {
        popup2.style.display = 'none';
    }
}


function hidePopup2() {
    var popup2 = document.getElementById('popup2');
    if (popup2) {
        popup2.style.display = 'none';
    }
}

document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('#add-pro').addEventListener('submit', async (e) => {
        e.preventDefault();

        // Ajout automatique de l'image r6_pack.png au champ d'image
        const imgInput = document.createElement('input');
        imgInput.type = 'hidden';
        imgInput.name = 'img_projets';
        imgInput.value = 'images/r6_pack.png';
        e.target.appendChild(imgInput);

        const response = await fetch('/includes/ajout_projets.php', {
            method: 'POST',
            body: new FormData(e.target),
        });

        if (response.ok) {
            window.location.reload();
        }
    });
});


function showPopup5() {
    var popup5 = document.getElementById('popup5');
    if (popup5) {
        popup5.style.display = 'block';
    }
}

function hidePopup5() {
    var popup5 = document.getElementById('popup5');
    if (popup5) {
        popup5.style.display = 'none';
    }
}

document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('#add-experience').addEventListener('submit', async (e) => {
        e.preventDefault();

        const response = await fetch('/includes/ajout_experience.php', {
            method: 'POST',
            body: new FormData(e.target),
        });

        if (response.ok) {
            window.location.reload();
        }
    });
});



function showPopup7() {
    var popup7 = document.getElementById('popup7');
    if (popup7) {
        popup7.style.display = 'block';
    }
}

function hidePopup7() {
    var popup7 = document.getElementById('popup7');
    if (popup7) {
        popup7.style.display = 'none';
    }
}


// Attendez que le DOM soit chargé
document.addEventListener("DOMContentLoaded", function () {
    // Sélectionnez tous les éléments avec la classe skill-name-hover
    var skillNames = document.querySelectorAll('.skill-name-hover');

    // Ajoutez un gestionnaire d'événements pour chaque élément
    skillNames.forEach(function (skillName) {
        // Lorsque la souris survole l'élément, ajoutez une classe à l'élément suivant (.icon)
        skillName.addEventListener('mouseover', function () {
            var icon = this.nextElementSibling;
            if (icon.classList.contains('icon')) {
                icon.style.display = 'block';
            }
        });

        // Lorsque la souris quitte l'élément, masquez l'élément suivant (.icon)
        skillName.addEventListener('mouseout', function () {
            var icon = this.nextElementSibling;
            if (icon.classList.contains('icon')) {
                icon.style.display = 'none';
            }
        });
    });
});
