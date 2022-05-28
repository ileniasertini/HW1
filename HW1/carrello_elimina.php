<?php
  include 'auth.php';
  checkAuth();   
  if(isset($_SESSION['username'])){
      $conn= mysqli_connect("localhost", "root", "", "SHOP");
      $username=$_SESSION['username'];
      $nome_articolo = mysqli_real_escape_string($conn, $_GET['nome_articolo']);
      $query="DELETE FROM carrello where utente like '$username' and nome like'$nome_articolo' ";

      if(mysqli_query($conn,$query)){
         $risposta='eliminato';
         echo json_encode($risposta);
     }else{
         $risposta='non eliminato';
         echo json_encode($risposta);
     }

      mysqli_close($conn);
      exit;
   }
?>

