function OnJsonAcquisto(text){
    console.log(text);
    const error=document.querySelector('#error');
    error.innerHTML='';

    if(text=="no accesso"){
        console.log("Non aggiunto a causa del login");
        error.innerHTML='Non aggiunto. Devi prima effettuare il login.';
    }

}
 

function OnResponseAcquisto(event){
     console.log("STEP_2_Articolo da acquistare");
     return event.json();
}
 


function aggiungi_al_carrello(event){
     event.preventDefault;
     const bottone=event.currentTarget;
     const div_bottone=bottone.parentNode;

     const value=div_bottone.querySelector("h1").textContent;
     console.log(value);
    
     console.log('STEP_1_ aggiungi al carrello--Nome articolo: ' + value);
     fetch("carrello_aggiungi.php?&nome="+value).then(OnResponseAcquisto).then(OnJsonAcquisto);
}




function OnJson(json){
    console.log("STEP_2 prodotti_upload json");
    console.log(json);
    section=document.querySelector("section");
    section.innerHTML="";
    section.classList.add('sezione')



    for(element of json){
        prodotto=document.createElement('div');
        prodotto.classList.add('prodotti');
        

        intestazione=document.createElement('h1');
        intestazione.textContent=element.nome;
        intestazione.classList.add('intestazione');
        console.log(intestazione);


        immagine=document.createElement('img');
        immagine.src=element.immagine;
        immagine.classList.add('immagini');
        console.log(immagine);


        descrizione=document.createElement('div');
        descrizione.textContent=element.descrizione;
        descrizione.classList.add('descrizione');
        console.log(descrizione);



        costo=document.createElement("div");
        costo.textContent="$"+element.prezzo;
        console.log(costo);
        

        acquisto=document.createElement("button");
        acquisto.classList.add("bottone_acquisto");
        acquisto.addEventListener('click', aggiungi_al_carrello);


        testo_bottone=document.createElement("p");
        testo_bottone.textContent="Acquista";
        acquisto.appendChild(testo_bottone);


        prodotto.appendChild(intestazione);
        prodotto.appendChild(immagine);
        prodotto.appendChild(descrizione);
        prodotto.appendChild(costo);
        prodotto.appendChild(acquisto);


        section.appendChild(prodotto);   
    }


}


function onResponse(response){
    console.log("STEP_1 prodotti_upload risposta");
    console.log(response);
    return response.json();
}


fetch("prodotti_upload.php").then(onResponse).then(OnJson);