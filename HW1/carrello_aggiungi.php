<?php
    include 'auth.php';
    checkAuth();   

    if(isset($_SESSION['username'])){
        $conn = mysqli_connect("localhost", "root", "", "SHOP");
        $username=$_SESSION['username'];
        $nome=mysqli_real_escape_string($conn, $_GET['nome']);
        $query="INSERT INTO carrello(utente, nome)VALUES('$username', '$nome')";

        if(mysqli_query($conn,$query)){
            $res='mandato';
            echo json_encode($res);
        }else{
            $res='non mandato';
            echo json_encode($res);
        }
        mysqli_close($conn);
        exit;
    }else{
        $res='no accesso';
        echo json_encode($res);
    }
    
?>