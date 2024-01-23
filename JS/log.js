function deconnecter() {
    fetch('/includes/logout.php', {
        method: 'POST',
    })
    .then(response => {
        if (response.ok) {
            // Actualiser la page après la déconnexion
            window.location.reload();
        } else {
            console.error('Erreur lors de la déconnexion');
        }
    })
    .catch(error => console.error('Erreur lors de la déconnexion:', error));
}
