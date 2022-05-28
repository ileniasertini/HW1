<?php
    include 'auth.php';
    checkAuth();   
    if(isset($_SESSION['username'])){
        $conn = mysqli_connect("localhost", "root", "", "SHOP");
        $username=$_SESSION['username'];
        $descrizione=mysqli_real_escape_string($conn, $_GET['descrizione']);
        $query="INSERT INTO RECENSIONE(utente, descrizione)VALUES('$username', '$descrizione')";

        if(mysqli_query($conn,$query)){
            $risposta='aggiunta';
            echo json_encode($risposta);
        }else{
            $risposta='non aggiunta';
            echo json_encode($risposta);
        }

        mysqli_close($conn);
        exit;
    }else{
        $risposta='no accesso';
        echo json_encode($risposta);
    }
?>

