function OnJsonElimina(json){
    console.log(json);

    if(json=="eliminato"){
        console.log('eliminato con successo!');
    }
    if(json=="non eliminato"){
        console.log('non eliminato');
    }
}


function onResponseElimina(response){
    console.log("STEP_2 recensione");
    console.log(response);
    return response.json();
}


function elimina_articolo(event){
    event.preventDefault();
    
    const x=event.currentTarget;
    const x_div=x.parentNode;

    const prodoct = x_div.querySelector("h1").textContent;
    console.log("STEP1-- eliminazione articolo da carrello:"+prodoct);

    
    fetch('carrello_elimina.php?&nome_articolo='+prodoct).then(onResponseElimina).then(OnJsonElimina);

    x_div.remove();
}



function OnJson(json){
    console.log("STEP_3 json");
    console.log(json);
    section=document.querySelector("#section_visualizza_carrello");
    section.innerHTML="";



    for(element of json){
        prodotto=document.createElement('div');
        prodotto.classList.add('prodotto_carrello');
        

        elimina=document.createElement('img');
        elimina.src="delete2.png";
        elimina.classList.add('delete_carrello');
        elimina.addEventListener('click', elimina_articolo);


        intestazione=document.createElement('h1');
        intestazione.textContent=element.nome;
        console.log(intestazione);


        immagine=document.createElement('img');
        immagine.src=element.immagine;
        immagine.classList.add('immagine_carrello');
        console.log(immagine);


        costo=document.createElement("div");
        costo.textContent="$"+element.prezzo;
        console.log(costo);


        prodotto.appendChild(elimina);
        prodotto.appendChild(intestazione);
        prodotto.appendChild(immagine);
        prodotto.appendChild(costo);


        section.appendChild(prodotto);   
    }


}

function onResponse(response){
    console.log("STEP_2 risposta");
    console.log(response);
    return response.json();
}


fetch("carrello_upload.php").then(onResponse).then(OnJson);

