<?php 
    include 'auth.php';
    checkAuth();  
?>


<html>
    <head>
        <title>Ilenia'Shop</title>
        <link rel="stylesheet" href="home.css"/>
        <link href="https://fonts.googleapis.com/css2?family=Hurricane&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@1,300&family=Dancing+Script&family=Merriweather:ital,wght@1,300&family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
        <meta name="viewpoint" content="width=device-width, initial-scale=1">
        <script src="prodotti_upload.js" defer="true"></script>
        <script src="prodotti_cerca.js" defer="true"></script>
        <meta charset="utf-8">
    </head>

    <body>
            
        <nav>
            <?php
            if(!isset($_SESSION['username'])){
                echo "<a href='home.php'> Home </a>";
                echo "<a href='prodotti.php'>Prodotti</a>";
                echo "<a href='contatti.php'> Chi Siamo </a>";
                echo "<a href='login.php'>Accedi</a>";
                echo "<a href='carrello_home.php'> Carrello </a>";
            }
            if(isset($_SESSION['username'])){
                echo "<a href='home.php'> Home </a>";
                echo "<a href='prodotti.php'>Prodotti</a>";
                echo "<a href='contatti.php'> Chi Siamo </a>";
                echo "<a href='carrello_home.php'> Carrello </a>";
                echo "<a href='logout.php'>Logout</a>";
            }
            ?>
        </nav>
        
       
       
        <div id="overlay">
            <header>
                <h1>Ilenia' s Shop</h1>
            </header>
        </div> 


        
        <!--PARTE ERRORE PER IL NON LOGIN IN CASO DI ACQUISTO-->
        <div id="error">
        </div>
        <!--------------------------->


        <!--PARTE CERCA PRODOTTO-->
        <form  id="cerca_prodotto" method="get">
            <h3>CERCA PRODOTTO</h3>
            <input type="text" id="prodotto"></input> 
            <input type='submit' id="prodotto_invio"></input>
        </form>
        <!--------------------------->



        <!--PARTE VISUALIZZAZIONE PRODOTTI-->
        <section id=sezione> 
        </section>
        <!--------------------------->




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