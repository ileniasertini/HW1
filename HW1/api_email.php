<?php
    $api_key='ea8a0cbd96fb47028d9ecb2d59ae3c29';

    $query = urlencode($_GET["email"]);
    $url ='https://emailvalidation.abstractapi.com/v1/?api_key='.$api_key.'&email='.$query.'';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $res= curl_exec($ch);
    $json = json_decode($res, true);
   
    curl_close($ch);
    echo json_encode($json);
?>