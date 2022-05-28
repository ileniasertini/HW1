<?php
  include 'auth.php';
  if (checkAuth()) {
      header('Location: home.php');
      exit;
  }
  

  if(!empty($_POST["username"]) && !empty($_POST["password"])){     
     $conn=mysqli_connect("localhost","root","","SHOP");
     $username=mysqli_real_escape_string($conn, $_POST["username"]);
     $password=mysqli_real_escape_string($conn, $_POST["password"]);
     $query="SELECT username, password FROM users WHERE username='$username'";
     $res= mysqli_query($conn,$query) or die(mysqli_error($conn));;
     if(mysqli_num_rows($res)>0)
     {
      $login = mysqli_fetch_assoc($res);
      if (password_verify($_POST['password'], $login['password'])) {
        $_SESSION["username"]=$_POST["username"];
        $_SESSION['log']=$login['id'];
        header("Location: home.php");
        mysqli_free_result($res);
        mysqli_close($conn);
        exit;
      }
      else{
        $error=true;
      }
    }
     else{
       $error=true;
     }
        
  }
?>

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
        <script src="login.js" defer="true"></script>
        <meta charset="utf-8">
    </head>

    <body>
        <nav>
                <a href="home.php"> Home </a>
                <a href="prodotti.php">Prodotti</a>
                <a href="contatti.php"> Chi Siamo </a>
                <a href="login.php"> Accedi </a>
                <a href="carrello_home.php"> Carrello </a>
        </nav>
        
       
       
        <div id="overlay">
            <header>
                <h1>Ilenia' s Shop</h1>
            </header>
        </div> 


        <?php
            // Verifica la presenza di errori
            if(isset($error))
            {
                echo "Credenziali Sbagliate";    
            }
        ?>

      
      <!--PARTE LOGIN DATI-->
        <main>
            <form id="dati_login" action="" name="login" method="POST">
                <p>
              <label>Username</label><input type="text" name="username" >
                </p>
                <p>
              <label>Password</label><input type="password" name="password" >
                </p>
                <p>
                <input type="submit" name="submit" id="submit" value="Login" action="home.php">
                </p>
            </form>
        </main>
        <!--PARTE LOGIN DATI-->

        <div id='registrazione'>
            <a href='registrazione_home.php'>Devi ancora registrarti?</a>
        </div>



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

