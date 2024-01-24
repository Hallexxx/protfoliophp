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

////////////////////////////////////////// POPUP 2 //////////////////////////////////////////

function showPopup2(skillName, skillId) {
    console.log('showPopup2 called with:', skillName, skillId);

    // Mettez à jour les champs dans les formulaires avec les données de la compétence sélectionnée
    document.getElementById('update-comp-id').value = skillId;
    document.getElementById('delete-comp-id').value = skillId;
    document.getElementById('update-name').value = skillName;
    
    var popup2 = document.getElementById('popup2');
    if (popup2) {
        console.log('Setting display to block');
        popup2.style.display = 'block';
    }
}

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('update-comp-form').addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(e.target);

        const response = await fetch('/includes/update_comp.php', {
            method: 'POST',
            body: formData,
        });

        if (response.ok) {
            window.location.reload();
        } else {
            console.error('Error updating competence:', response.status);
        }
    });

    document.getElementById('delete-comp-form').addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(e.target);

        const response = await fetch('/includes/delete_comp.php', {
            method: 'POST',
            body: formData,
        });

        if (response.ok) {
            window.location.reload();
        } else {
            console.error('Error deleting competence:', response.status);
        }
    });
});


function hidePopup2() {
    var popup2 = document.getElementById('popup2');
    if (popup2) {
        popup2.style.display = 'none';
    }
}

////////////////////////////////////////// POPUP 5 //////////////////////////////////////////


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


////////////////////////////////////////// POPUP 6 //////////////////////////////////////////

function showPopup6(projectId) {
    console.log('Clicked on project with ID:', projectId);

    var popup6 = document.getElementById('popup6');
    if (popup6) {
        popup6.style.display = 'block';

        // Mettez à jour les champs dans les formulaires avec l'ID du projet sélectionné
        document.getElementById('update-project-id').value = projectId;
        document.getElementById('delete-project-id').value = projectId;
    }
}


document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('update-project-form').addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(e.target);

        const response = await fetch('/includes/update_projets.php', {
            method: 'POST',
            body: formData,
        });

        if (response.ok) {
            window.location.reload();
        } else {
            console.error('Error updating project:', response.status);
        }
    });

    document.getElementById('delete-project-form').addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(e.target);

        const response = await fetch('/includes/delete_projets.php', {
            method: 'POST',
            body: formData,
        });

        if (response.ok) {
            window.location.reload();
        } else {
            console.error('Error deleting project:', response.status);
        }
    });
});

function hidePopup6() {
    var popup6 = document.getElementById('popup6');
    if (popup6) {
        popup6.style.display = 'none';
    }
}

////////////////////////////////////////// POPUP 7 //////////////////////////////////////////


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




////////////////////////////////////////// AFFICHAGE //////////////////////////////////////////


// document.addEventListener("DOMContentLoaded", function () {
//     var skillNames = document.querySelectorAll('.skill-name-hover');

//     skillNames.forEach(function (skillName) {
//         skillName.addEventListener('mouseover', function () {
//             var icon = this.nextElementSibling;
//             if (icon.classList.contains('icon')) {
//                 icon.style.display = 'block';
//             }
//         });

//         skillName.addEventListener('mouseout', function () {
//             var icon = this.nextElementSibling;
//             if (icon.classList.contains('icon')) {
//                 icon.style.display = 'none';
//             }
//         });
//     });
// });
