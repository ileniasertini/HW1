let token_ricevuto;
//const client_id='5babc8c5609b4aada2404fc27a9634c9';
//const client_secret='67a2ae5b01844960bad42c6ca715b53f';



//con questa funzione genero un numero random
function getRandom(a) {
    return Math.floor(Math.random() * a);
}



//questa funzione genera inizialmente un numero tra 0 o 1, 
//che corrisponde rispettivamente all'aver perso o vinto 
//la possibilità di ottenere un album del cantante inserito.
//in caso di vittoria, viene mostrato un album, tra quelli prodotti dall'autore
//in caso di sconfitta, viene mostrata un'immagine con scritto "hai perso".
//prima di tutto ciò verifico che non ci sia l'errore causato dal non accesso
function onJsonCanzone(json) {
    console.log('STEP3_spotify--json funzione cerca');
    console.log(json);

    let valore=getRandom(2);
    console.log('STEP4_spotify--VITT/SCON-->'+valore);

    const spotify=document.querySelector('#spotify_box');
    spotify.innerHTML = '';
    
    if(json=="errore"){
        spotify.innerHTML = 'Devi prima accedere!';
    }else{
    if(valore===1){ 
        spotify.innerHTML = 'HAI VINTO!';
        mondadori=document.querySelector('#spotify_vinto');
        mondadori.classList.remove('spotify_nascosto');
        mondadori.classList.add('spotify_mondadori');
     
        const album_view=document.querySelector('#album_view');
        album_view.innerHTML='';
        
        const results=json.albums.items;
        let one_results= getRandom(results.length);
        console.log('STEP5_spotify--ALBUM_Nº-->'+one_results);

        const select_image=json.albums.items[one_results].images[0].url;
        const album_box=document.createElement('div');
        const img=document.createElement('img');
        img.className='img_spotify';
        img.src=select_image;
    
        album_box.appendChild(img);
        album_view.appendChild(album_box);
    }
    if(valore===0){
        spotify.innerHTML = 'CI DISPIACE :(';

        const album_view=document.querySelector('#album_view');
        album_view.innerHTML='';

        const album_box=document.createElement('div');
        const img=document.createElement('img');
        img.src='HAIPERSO.png';
        img.classList.add('img_haiperso');
    
        album_box.appendChild(img);
        album_view.appendChild(album_box);
    }
    }
   
}



function onResponseCanzone(rispostaa){
    console.log('STEP2_spotify--risposta funzione cerca');
    return rispostaa.json();
}



//con questa funzione cerco tutti gli album prodotti dal cantante inserito 
//mando tutti i dati al file php, il quale provvederà ad ottenere il token e i dati richiesti
function cerca_album(event){
    event.preventDefault();
 
    const cantante_nome = document.querySelector('#cantante').value;
    const cantante_value= encodeURIComponent(cantante_nome);

    console.log('STEP1_spotify--Eseguo ricerca canzone');
    console.log('Authorization: Bearer ' + token_ricevuto);

    fetch('api_spotify.php?&q=' + cantante_value).then(onResponseCanzone).then(onJsonCanzone);
}



//quando clicco il pulsante cerca, si attiva la funzione cerca_album
const spotify=document.querySelector('#spotify_box');
spotify.addEventListener('submit', cerca_album);
