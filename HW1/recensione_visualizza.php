<?php
    $conn = mysqli_connect("localhost", "root", "", "SHOP");
    $query="SELECT * FROM RECENSIONE";
    $res = mysqli_query($conn, $query);
    
    $invio=array();

    if(mysqli_num_rows($res)>0){
        
        while($element = mysqli_fetch_assoc($res)){
            $invio[]=array('utente'=>$element['utente'], 'descrizione'=>$element['descrizione']);
        }
        
        echo json_encode($invio);
        mysqli_free_result($res);
        mysqli_close($conn);
        exit;
    }
?>
