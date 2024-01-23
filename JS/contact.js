document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('#contact-form').addEventListener('submit', async (e) => {
        e.preventDefault();
        console.log(e.target);

        const response = await fetch('/includes/traitement_contact.php', {
            method: 'POST',
            body: new FormData(e.target),
        });
        if (response.ok) {
            window.location.reload();
        }
    });
});