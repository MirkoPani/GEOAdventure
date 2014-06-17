<!DOCTYPE html>
<html lang="it">
<?php
session_start();
if(isset($_SESSION['userid'])) //se l'utente è già loggato non deve vedere questa pagina!
{
    header("location: home.php"); 
    exit();
}
?>
<head>
    <link rel="icon" type="image/ico" href="img/icona.ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9 user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
<meta property="og:image" content="http://79.21.184.43/geoadventure/img/logo.JPG" />
    <title>GEOAdventure- Vivi la tua avventura!</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- Custom Theme CSS -->
    <link href="css/grayscale.css" rel="stylesheet">


</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">
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
                        <a href="#about">About</a>
                    </li>
                     <li class="page-scroll">
                        <a href="#myModal" data-toggle="modal" data-target="#modale">Login</a>
                    </li>
                    <li class="page-scroll">
                        <a href="registration.php">Registrati</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Contatti</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
    <div class="modal fade" id="modale" >
	<div class="modal-dialog" >
            <div class="modal-content" id="modal-index">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Log-in</h4> 
          
          
       
          
          
        </div>
        <div class="modal-body">
          <div class="form-group">
              <form method="POST" id="formlogin">
    		<label for="username">Username</label>
    		<input class="form-control" name="username" id="username" placeholder="Username" type="input">
  		  </div>
		  <div class="form-group">
		  	<label for="password">Password</label>
			<input class="form-control" name="password" id="password" placeholder="Password" type="password">
		  </div>
        </div>
        <div class="modal-footer">
               <!-- --> <span id="messaggio" class="label-warning" ></span> 
          <a href="#" data-dismiss="modal" class="btn">Chiudi</a>
          <input type="submit" class="btn btn-primary" value="Log-in">
         
          </form>

        </div>
      </div>
    </div>
</div>
    

    <section class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">GeoAdventure</h1>
                        <p class="intro-text">Un nuovo modo di giocare. Ti basta uno smartphone con connessione internet, e sei pronto per la tua avventura!</p>
                        <div class="page-scroll">
                            <a href="#about" class="btn btn-circle">
                                <i class="fa fa-angle-double-down animated"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>About GEOAdventure</h2>
                <p>GEOAdventure è un gioco basato sulla geo-localizzazione. Sfruttando la nuova tecnologia HTML5 e il sensore GPS del tuo smartphone è possibile creare esperienze di
                gioco uniche!</p>
                <p>Vivi un'avventura unica! Crea il tuo personaggio ed entra in questo fantastico gioco di ruolo!</p>
            </div>
        </div>
    </section>

    <section id="registration" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>Come partecipare</h2>
                    <p>Partecipare è facilissimo! Ti basta semplicemente cliccare qui sotto e registrarti:</p>
                    <a href="registration.php" class="btn btn-default btn-lg">Registrati</a>
                </div>
            </div>
        </div>
    </section>


    <section id="contact" class="container content-section text-center">  
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Creato da Pani Mirko</h2>
                <p>Progetto Tesina ITT G. Chilesotti Anno Scolastico 2013/2014</p>
                <p>panimirko95@gmail.com</p>
                <ul class="list-inline banner-social-buttons">
                    <li><a href="https://www.facebook.com/mirko.pani" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                    </li>
                    <li><a href="https://github.com/NastyKill" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                    </li>
                   
                </ul>
           
            </div>
        </div>
    </section>
    <!-- <div id="map"></div> -->

    <!-- Core JavaScript Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - You will need to use your own API key to use the map feature -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- JavaScript index -->
    <script src="js/grayscale.js"></script>
    <script src="js/index.js"></script>

</body>

</html>
