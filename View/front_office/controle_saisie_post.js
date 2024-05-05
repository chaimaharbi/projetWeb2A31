document.addEventListener("DOMContentLoaded", function() {
    var form = document.querySelector('form');

    form.addEventListener('submit', function(event) {
        var idpostInput = document.getElementById('idpost');
        var datepostInput = document.getElementById('datepost');
        var adressInput = document.getElementById('adress');
        var titreInput = document.getElementById('titre');
        var desInput = document.getElementById('des');
        var nblikeInput = document.getElementById('nblike');
        var nbdislikeInput = document.getElementById('nbdislike');
        var isValid = true;

        // Validation de l'ID Post
        if (idpostInput.value.trim() === '') {
            isValid = false;
            alert('Please enter ID Post.');
        } else if (!/^\d{8}$/.test(idpostInput.value.trim())) {
            isValid = false;
            alert('ID Post must be composed of exactly 8 digits.');
        }

        // Validation de la date de publication
        if (datepostInput.value.trim() === '') {
            isValid = false;
            alert('Please enter Posting date.');
        }

        // Validation de l'adresse
        if (adressInput.value.trim() === '') {
            isValid = false;
            alert('Please enter your email address.');
        }

        // Validation du titre
        if (titreInput.value.trim() === '') {
            isValid = false;
            alert('Please enter your title.');
        }

        // Validation de la description
        if (desInput.value.trim() === '') {
            isValid = false;
            alert('Please enter your description.');
        }

        // Validation du nombre de likes
        if (nblikeInput.value.trim() === '') {
            isValid = false;
            alert('Please enter Likes number.');
        }

        // Validation du nombre de dislikes
        if (nbdislikeInput.value.trim() === '') {
            isValid = false;
            alert('Please enter Dislikes number.');
        }

        // Si le formulaire n'est pas valide, empêcher son envoi
        if (!isValid) {
            event.preventDefault();
        }
    });

    function isValidEmail(email) {
        var emailRegex = /\S+@\S+\.\S+/;
        return emailRegex.test(email);
    }
});
