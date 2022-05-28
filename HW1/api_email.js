function onJsonEmail(json){
    console.log("STEP_3_Email json ricevuto");
    const validazione=json.deliverability;
    console.log("STEP_4_Email"+validazione);

    if(validazione==="DELIVERABLE"){
        const email_container = document.querySelector('#email_box');
        email_container.innerHTML = '';
        const email_error=document.querySelector('#email_error');
        email_error.innerHTML='';
        const ok=document.querySelector('#email_okk');
        ok.classList.remove('class_email_ok');
        ok.classList.add('class_email_ok_2');
    }

    if(validazione==="UNDELIVERABLE"){
        const email_error=document.querySelector('#email_error');
        email_error.innerHTML='';
        email_error.textContent="EMAIL NON VALIDA!";
    } 
 
}



function onSuccessEmail(resp){
    console.log("STEP_2_Email");
    return resp.json();
}



//tale funzione rileva l'email inserita e la passa al fetch.
function identificazione(event){
    event.preventDefault();
    const email_input = document.querySelector('#email').value;
    console.log('STEP_1_Email ricevuta: ' + email_input);

    fetch('api_email.php?&email='+email_input).then(onSuccessEmail).then(onJsonEmail);
}

//quando clicco il pulsante invia, si attiva la funzione identificazione
const email=document.querySelector('#email_box');
email.addEventListener('submit', identificazione);


//https://emailvalidation.abstractapi.com/v1/?api_key=ea8a0cbd96fb47028d9ecb2d59ae3c29&email="