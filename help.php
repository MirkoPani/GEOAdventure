<!DOCTYPE html>
<html lang="it">
 <?php
 require 'conn.php';
 session_start();
 if(!isset($_SESSION['userid']))
     header("location: index.php"); 
 
 ?>
    
    
    <head>
            <link rel="icon" type="image/ico" href="img/icona.ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
<meta property="og:title" content="GEOADVENTURE" />
<meta property="og:description" content="Progetto Tesina" />
<meta property="og:image" content="img/logo.JPG" />

    <title>GEOAdventure- Vivi la tua avventura!</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
   <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- Custom Theme CSS -->
 <!--   <link href="css/grayscale.css" rel="stylesheet">  -->
     
     <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/generic.css" rel="stylesheet">
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

    <nav class="navbar navbar-custom  top-nav-collapse" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php">
                    <i class="fa fa-trello"></i>  <span class="light">GEO</span>Adventure
                </a>
            </div>
 
      <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="home.php">Bacheca</a>
                    </li>
                     <li class="page-scroll">
                        <a href="gioco.php" >Gioca</a>
                    </li>
                            <li class="page-scroll">
                            <a href="help.php">Help</a>
                        </li>  
                    <li class="page-scroll">
                        <a href="signout.php">Sign Out</a>
                    </li>
                </ul>
            </div>
      </div>
    </nav>
    <div class='container' style="padding-top: 40px;"'>
    <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Come si utilizza GEOAdventure?</h3>
  </div>
  <div class="panel-body">
      Lo scopo del gioco è quello di raggiungere un luogo che ti verrà indicato sulla mappa. Come? Ma è semplice!
      <br> Devi raggiungerlo fisicamente! Prendi in mano il tuo telefono e parti per una bella passeggiata, per scoprire nuovi luoghi!
    <br>Il sito è diviso in più pagine. Segue un elenco delle rispettive pagine e funzioni di ciascuna.
    <br><br><b>BACHECA:</b> E' la pagina per la visualizzazione delle statistiche. Permette di vedere quante quest hai completato e l'esperienza
    accumulata.<br> Nel menu a destra, è possibile accedere all'elenco delle quest completate e ad una mappa contenente tutti i luoghi che hai raggiunto finora!
    <br><br><b>GIOCA:</b>Questa pagina ti permette di giocare! Una volta scelta la difficoltà, si aprirà la mappa con il luogo da raggiungere! Forte eh?
    <br> Raggiungi l'area indicata per completare la quest!
    <br><b>N.B:</b> Abilita la geolocalizzazione del tuo telefono prima di giocare!
    
  </div>
</div>
    </div>
    
    
    
</body>
 <!-- Core JavaScript Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- JavaScript index -->
</html>
    