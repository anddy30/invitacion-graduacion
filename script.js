const form = document.getElementById('confirmationForm');
const confirmationMessage = document.getElementById('confirmationMessage');

form.addEventListener('submit', (event) => {
    event.preventDefault();

    const name = document.getElementById('name').value;
    const guests = document.getElementById('guests').value;

    // Crear un objeto con los datos del invitado
    const guestData = {
        name: name,
        guests: guests,
        date: new Date().toLocaleString()
    };

    // Convertir el objeto a un string en formato JSON
    const dataString = JSON.stringify(guestData);

    // Enviar una solicitud POST al servidor para guardar los datos
    fetch('save.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: dataString
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text();
    })
    .then(data => {
        confirmationMessage.textContent = '¡Gracias por confirmar tu asistencia!';
        form.reset();
    })
    .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
        confirmationMessage.textContent = 'Ha ocurrido un error al enviar los datos. Por favor, inténtalo de nuevo más tarde.';
    });
});