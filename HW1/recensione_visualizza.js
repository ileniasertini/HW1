function OnJson(json){
    console.log(json);


    const mostra_recensioni=document.querySelector("#tutte_recensioni");
    mostra_recensioni.innerHTML="";
    mostra_recensioni.classList.add('sezione_recensione');
    intestazione=document.createElement('p');
    intestazione.textContent='Le vostre opinioni su di noi..';
    intestazione.classList.add('intestazione');

    mostra_recensioni.appendChild(intestazione);


    for(element of json){
        blocco=document.createElement('div');
        blocco.classList.add('recensioni_div');

        utente=document.createElement('p');
        utente.textContent=element.utente;
        utente.classList.add('recensioni_p');
        console.log(utente);

        descrizione=document.createElement('p');
        descrizione.textContent=element.descrizione;
        descrizione.classList.add('recensioni_p2');
        console.log(descrizione);


        blocco.appendChild(utente);
        blocco.appendChild(descrizione);

        mostra_recensioni.appendChild(blocco);
    }

}


function onResponse(response){
    console.log("STEP_2 recensioni visualizza");
    console.log(response);
    return response.json();
}


function mostra(event){
    event.preventDefault();
    console.log("STEP_1 recensioni visualizza");

    fetch('recensione_visualizza.php').then(onResponse).then(OnJson);
}


const mostra_recensioni=document.querySelector("button");
mostra_recensioni.addEventListener('click', mostra);