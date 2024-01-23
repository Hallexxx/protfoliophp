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