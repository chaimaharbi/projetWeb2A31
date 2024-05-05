document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Empêcher l'envoi du formulaire par défaut

        // Validation des champs
        const id = document.getElementById('id').value.trim();
        const nom = document.getElementById('nom').value.trim();
        const des = document.getElementById('des').value.trim();
        const date = document.getElementById('date').value.trim();
        const statue = document.getElementById('statue').value.trim();

        // Validation de l'ID
        if (!/^\d{4}$/.test(id)) {
            alert('L\'ID doit contenir exactement 4 chiffres.');
            return;
        }

        // Vérification que tous les champs sont remplis
        if (id === '' || nom === '' || des === '' || date === '' || statue === '') {
            alert('Veuillez remplir tous les champs.');
            return;
        }

        // Validation supplémentaire si nécessaire...

        // Envoi du formulaire si toutes les validations passent
        form.submit();
    });
});
