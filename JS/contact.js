document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('#contact-form').addEventListener('submit', async (e) => {
        e.preventDefault();
        // e.target.elements.name.value = '';
        // e.target.elements.email.value = '';
        // e.target.elements.message.value = '';
        console.log(e.target);

        const response = await fetch('/includes/traitement_contact.php', {
            method: 'POST',
            body: new FormData(e.target),
        });

        // const result = await response.json();

        // if (result.success) {
        //     alert(result.message);
        //     window.location.href = '/';
        // } else {
        //     alert(result.message);
        // }
    });
});