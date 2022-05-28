function OnJson(json){
    console.log(json);
    const risposta=document.querySelector("#recensioni_risposta");
    risposta.innerHTML='';

    if(json=="aggiunta"){
        risposta.innerHTML='Recensione memorizzata con successo!';
    }
    if (json=="non aggiunta"){
        risposta.innerHTML='Recensione non memorizzata, ritenta!';
    }

    if (json=="no accesso"){
        risposta.innerHTML='Recensione non memorizzata. Devi prima accedere';
    }
}


function onResponse(response){
    console.log("STEP_2 recensione");
    console.log(response);
    return response.json();
}


function recensione(event){
    event.preventDefault();
    console.log("STEP_1 recensione ");
    const risposta = document.querySelector('#recensione_utente').value;
    console.log(risposta);

    fetch('recensione_aggiungi.php?&descrizione='+risposta).then(onResponse).then(OnJson);
}


const bottone=document.querySelector("#recensioni");
bottone.addEventListener('submit', recensione);