function OnJson(json){
    console.log("STEP_2--json per carico dati nella home page");
    console.log(json);
    section=document.querySelector("section");
    section.innerHTML="";
    



    for(element of json){
        prodotto=document.createElement('div');
        prodotto.classList.add('prodotto');
        

        intestazione=document.createElement('h1');
        intestazione.textContent=element.nome;
        intestazione.classList.add('intestazione');
        console.log(intestazione);

        immagine=document.createElement('img');
        immagine.src=element.immagine;
        immagine.classList.add('immagine');
        console.log(immagine);

        descrizione=document.createElement('p');
        descrizione.textContent=element.descrizione;
        descrizione.classList.add('descrizione');
        console.log(descrizione);



        prodotto.appendChild(intestazione);
        prodotto.appendChild(immagine);
        prodotto.appendChild(descrizione);
   
        section.appendChild(prodotto);   
    }


}


function onResponse(response){
    console.log("STEP_1--risposta per carico dati nella home page");
    console.log(response);
    return response.json();
}


fetch("home_upload.php").then(onResponse).then(OnJson);


