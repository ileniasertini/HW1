<?php
    $conn=mysqli_connect("localhost", "root", "", "SHOP");
    if(isset($_GET['nome_articolo'])){
        $nome_articolo = mysqli_real_escape_string($conn, $_GET['nome_articolo']);
        $query = "SELECT * FROM articolo where nome like '%$nome_articolo%';";
        $res = mysqli_query($conn, $query);
        
        $invio=array();

        if(mysqli_num_rows($res)>0){
            
            while($element = mysqli_fetch_assoc($res)){
                $invio[]=array('codice'=>$element['codice'], 'nome'=>$element['nome'], 'descrizione'=>$element['descrizione'],
            'immagine'=>$element['immagine'],'prezzo'=>$element['prezzo']);
            }
            
            echo json_encode($invio);
            mysqli_free_result($res);
            mysqli_close($conn);
            exit;
        }
    }    
?>