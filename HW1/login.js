function validazione(event)
{
    // Verifica se tutti i campi sono riempiti
    if(form.username.value.length == 0 ||
       form.password.value.length == 0)
    {
        // Avviso per utente di inserire i dati
        alert("Compilare tutti i campi.");
        // Blocca l'invio del form
        event.preventDefault();
    }
        
}


const form = document.querySelector('#dati_login');
form.addEventListener('submit', validazione);