<?php
  include 'auth.php';
  if (checkAuth()) {
      header('Location: home.php');
      exit;
  }
  
  if(!empty($_POST["nome"]) && !empty($_POST["cognome"]) && !empty($_POST["email"]) && !empty($_POST["username"]) && !empty($_POST["password"]))
   {
     
     $conn = mysqli_connect("localhost", "root", "", "SHOP");
     $username = mysqli_real_escape_string($conn, $_POST["username"]);
     $query = "SELECT username FROM users WHERE username = '$username'";
     $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;
     if (mysqli_num_rows($res) > 0) {
        $error= true;
     }else{
        $password=mysqli_real_escape_string($conn,$_POST["password"]);
        $password = password_hash($password, PASSWORD_BCRYPT);
        $nome=mysqli_real_escape_string($conn,$_POST["nome"]);
        $cognome=mysqli_real_escape_string($conn,$_POST["cognome"]);
        $email=mysqli_real_escape_string($conn,$_POST["email"]);
        $query="INSERT INTO users(username, nome, cognome, email, password)
        VALUES('$username', '$nome', '$cognome', '$email', '$password')";
        echo $query;
        if( mysqli_query($conn,$query))
        {
            $_SESSION["iscrizione"]=true;
            header("Location: login.php");
            mysqli_close($conn);
            exit;
        }
      }
   }
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Ilenia'Shop</title>
        <link rel="stylesheet" href="home.css"/>
        <link rel="stylesheet" href="login.css"/>
        <link href="https://fonts.googleapis.com/css2?family=Hurricane&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@1,300&family=Dancing+Script&family=Merriweather:ital,wght@1,300&family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
        <meta name="viewpoint" content="width=device-width, initial-scale=1">
        <script src="registrazione.js" defer="true"></script>
        <meta charset="utf-8">
    </head>

    <body>
        <nav>
                <a href="home.php"> Home </a>
                <a href="prodotti.php"> Prodotti </a>
                <a href="contatti.php"> Chi Siamo </a>
                <a href="login.php"> Accedi </a>
                <a href="www.Carrello.it"> Carrello </a>
        </nav>
        
       
       
        <div id="overlay">
            <header>
                <h1>Ilenia' s Shop</h1>
            </header>
        </div> 
    
    

        <?php
        if (isset($error)) {
            echo "Username già in uso.";
        }
        ?>
       
    
        <!--PARTE DATI REGISTRAZIONE-->
        <main>
            <form action="" name="iscriviti" method="POST" ">
                <p>
                <label>Nome</label>
                <input type="text" name="nome" id="nome" pattern="[A-Za-z ]{2,20}$" title="Il nome deve contenere solo lettere e deve avere una lunghezza minima di 2 e massima di 20">
                </p>
                <p>
                <label>Cognome</label>
                <input type="text" name="cognome" id="cognome" pattern="[A-Za-z ]{2,20}$" title="Il cognome deve contenere solo lettere e deve avere una lunghezza minima di 2 e massima di 20">
                </p>
                <p>
                <label> Email</label>
                <input type="text" name="email" id="email" title="">
                </p>
                <p>
                <label>Username</label>
                <input type="text"  name="username" id="username" pattern="[A-Za-z0-9]{6,20}$" title="L'username deve contenere solo caratteri alfanumerici e deve avere una lunghezza minima di 6 e massima di 20">
                </p>
                <p>
                <label>Password</label>
                <input type="password" name="password" id="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$" title="La password deve contenere minimo 8, massimo 20 caratteri tra cui: una lettera maiuscola, una minuscola, un numero e un carattere speciale">
                </p>
                <input type="submit" value="Iscriviti">
            </form>  
        
        </main>

        <!--------------------------------------->



        <!--PARTE MESSAGGI DI ERRORE PER I DATI INSERITI-->
        <div id="error">
        </div>
        <!------------------------------------>



        <footer>
            <div id="me">
                <p>
                    Ilenia's Shop - via etnea 20, Catania(CT)</br>
                    Tel.:095 1234567</br>
                    email: ileniashop_hotmail.it</br>
                </br>
                ILENIA SERTINI 1000004431
                </p>    
            </div>
        </footer>


    </body>

</html>