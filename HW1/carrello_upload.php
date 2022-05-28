<?php
  include 'auth.php';
  checkAuth();   
  if(isset($_SESSION['username'])){
      $conn= mysqli_connect("localhost", "root", "", "SHOP");
      $username=$_SESSION['username'];
      $query="SELECT a.nome, a.immagine, a.prezzo FROM carrello c join articolo a on c.nome=a.nome WHERE utente='$username' ";
      $res = mysqli_query($conn, $query);
    
        $invio=array();

        if(mysqli_num_rows($res)>0){
            
            while($element = mysqli_fetch_assoc($res)){
                $invio[]=array('nome'=>$element['nome'],'immagine'=>$element['immagine'], 'prezzo'=>$element['prezzo']);
            }
            echo json_encode($invio);
            mysqli_free_result($res);
            mysqli_close($conn);
            exit;
        }
   }
?>