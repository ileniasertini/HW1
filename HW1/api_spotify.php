<?php 
        include 'auth.php';
        checkAuth();   
    
        //VERIFICO PRIMA CHE SIA STATO EFFETTUATO L'ACCESSO
        if(isset($_SESSION['username'])){
        $client_id='5babc8c5609b4aada2404fc27a9634c9';
        $client_secret='67a2ae5b01844960bad42c6ca715b53f';

        // ACCESSO TOKEN
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token' );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials'); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); 
        $token=json_decode(curl_exec($ch), true);
        curl_close($ch);    
        
        //RICHIESTA
        $query = urlencode($_GET["q"]);
        $url = 'https://api.spotify.com/v1/search?type=album&q=' .$query;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token'])); 
        //$res = json_decode(curl_exec($ch),true);
        $res=curl_exec($ch);
        
        curl_close($ch);

        echo $res;
        }else{
                $risposta='errore';
                echo json_encode($risposta);
        }
?>