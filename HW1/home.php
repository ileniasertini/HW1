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
        <script src="api_spotify.js" defer="true"></script>
        <script src="api_email.js" defer="true"></script>
        <script src="home_upload.js" defer="true"></script>
        <script src="recensione_aggiungi.js" defer="true"></script>
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


        
        <!--PARTE API SPOTIFTY-->
        <form id="spotify_box" class="spotify" >
            <h3>Prova a vincere un album del tuo CANTANTE PREFERITO!</h3>
            <h3>In collaborazione con <em>MondadoriStore</em></h3>
            <p>Inserisci nome cantante</p>
            <input type="text" id="cantante"></input> 
            <input type="submit" id="submit_spotify" value="cerca" ></input>
            
        </form>
    
        
        <a id="spotify_vinto" class='spotify_nascosto' href='https://www.mondadoristore.it/'> Clicca qui per riscuotere il tuo premio </a>
            
        <div id="album_view">
            
        </div>
        <!---------------------->
        



         <!--PARTE BENVENUTO-->
        <div id="intestazione_home">
            <h1>Alcune novità del mese!
            <?php
            if(isset($_SESSION['username'])){
                $user = $_SESSION['username'];
                echo "<p> Benvenuta/o $user</p>";
            }
            ?>
            </h1>
        </div>
        <!---------------------->





        <!--PARTE VISUALIZZAZIONE NOVITA-->
        <section id="section_home">
        </section>
        <!----------------------> 




        
         <!--PARTE RECENSIONE-->
        <div id="recensioni_risposta">
            </div>
            

        <section id="section_recensioni">
            <form id="recensioni" method="get">
                <h3>LASCIA UNA RECENSIONE!</h3>
                <p>La tua opinione è importante per noi :)</p>
                <textarea id="recensione_utente" style="width: 600px; height= 90px"></textarea> 
                <input type='submit' id="recensione_invio"></input>
            </form>
        </section>
        <!---------------------->



        

        <!--PARTE API EMAIL-->
        <form id="email_box" >
            <h3>CREA UN TUO ACCOUNT</h3>
            <p>Inserisci email </p>
            <input type="text" id="email"></input> 
            <input type='submit'></input>
        </form>

        <div id="email_error">
        </div>

        <a id="email_okk" class="class_email_ok" class="class_email_ok_2" 
        href="registrazione_home.php"> <em>Email valida</br>Clicca qui per completare la tua iscrizione</em></a>
        <!---------------------->

    
        

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