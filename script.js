document.getElementById('rsvpForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const name = document.getElementById('name').value;
    const guests = document.getElementById('guests').value;

    document.getElementById('confirmationMessage').textContent = 
        `Gracias ${name}, has confirmado ${guests} invitado(s). ¡Nos vemos en la graduación!`;
    
    document.getElementById('rsvpForm').reset();
});
