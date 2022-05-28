<?php
    $conn=mysqli_connect("localhost", "root", "", "SHOP");
    $query = "SELECT a.* FROM articolo a join novita n on a.codice=n.codice ";
    $res = mysqli_query($conn, $query);

    $invio=array();

    if(mysqli_num_rows($res)>0){
        
        while($element = mysqli_fetch_assoc($res)){
            $invio[]=array('codice'=>$element['codice'], 'nome'=>$element['nome'], 'descrizione'=>$element['descrizione'],
        'immagine'=>$element['immagine']);
        }
        echo json_encode($invio);
        mysqli_free_result($res);
        mysqli_close($conn);
        exit;
    }

?>