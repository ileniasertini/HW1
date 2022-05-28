
function validazione(event){
    //dichiaro alcune caratteristiche che dovranno avere i parametri
    const caratteri_minuscolo = new RegExp("[a-z]");
    const caratteri_maiuscolo= new RegExp("[A-Z]");
    const numeri = new RegExp("[0-9]");
    const caratteri_speciali = new RegExp("[!@#\$%\^&\*]");


    //dichiaro l'array che conterra i messaggi d'errore
    let messages = [];  



    //primo check se tutti i dati sono stati inseriti
    if (username.value == '' || username.value == null) {   
        messages.push("Username richiesto!");
    }
    if (email.value == '' || email.value == null) {
        messages.push("Email richiesta!");
    }
    if (password.value == '' || password.value == null) {
        messages.push("Password richiesta!");
    }
    if (nome.value == '' || nome.value == null) {   
        messages.push("Nome richiesto!");
    }
    if (cognome.value == '' || cognome.value == null) {   
        messages.push("Cognome richiesto!");
    }



    //check nome e cognome
    if (nome.value.length >= 21 || nome.value.length<=2) {
        messages.push('Il nome  deve avere una lunghezza minima di 2 e massima di 20');
    }

    if (cognome.value.length >= 21 || cognome.value.length<=2) {
        messages.push('Il cognome  deve avere una lunghezza minima di 2 e massima di 20');
    }

    if(numeri.test(nome.value)) {
        messages.push('Il nome non può contenere numeri');
    }

    if(numeri.test(cognome.value)) {
        messages.push('Il cognome non può contenere numeri');
    }

    if(caratteri_speciali.test(nome.value)) {
        messages.push('Il nome non può contenere caratteri speciali');
    }

    if(caratteri_speciali.test(cognome.value)) {
        messages.push('Il cognome non può contenere caratteri speciali');
    }




    //check username
    if (username.value.length >= 21 || username.value.length<=5) {
        messages.push('Username deve avere una lunghezza minima di 6 e massima di 20');
    }

    if(caratteri_speciali.test(username.value)) {
        messages.push('Username non può contenere caratteri speciali');
    }




    //check password
    if (password.value.length >= 21 || password.value.length<=7) {
        messages.push('La password deve avere una lunghezza minima di 8 e massima di 20');
    }

    if(!caratteri_speciali.test(password.value)) {
        messages.push('La password deve contenere almeno un carattere speciale');
    }

    if(!caratteri_maiuscolo.test(password.value)) {
        messages.push('La password deve contenere almeno un carattere maiuscolo');
    }

    if(!caratteri_minuscolo.test(password.value)) {
        messages.push('La password deve contenere almeno un carattere minuscolo');
    }


    //check email
    //controllo base: deve esserci almeno la '@' e il '.' 
    const email_caratteri = new RegExp("[@.]");
    if(!email_caratteri.test(email.value)) {
        messages.push('Email non valida');
    }
    


    //verifico la presenza di errori
    if (messages.length > 0) { 
        event.preventDefault();
        
        error.innerText = messages.join('\n');
    }
}


const username = document.querySelector('#username');
const email = document.querySelector('#email');
const password = document.querySelector('#password');
const nome = document.querySelector('#nome');
const cognome = document.querySelector('#cognome');
const error = document.querySelector('#error');
const form = document.querySelector('form');

form.addEventListener('submit', validazione);