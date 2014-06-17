<!DOCTYPE html>
<html lang="it">
    <?php
    require 'conn.php';
    session_start();
    if (!isset($_SESSION['userid']))
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
               <!--         <li class="page-scroll">
                            <a href="registration.php">Impostazioni</a>
                        </li>  -->
                        <li class="page-scroll">
                            <a href="signout.php">Sign Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container" style="padding-top: 40px;">
            <?php
            $query = "SELECT * FROM markers INNER JOIN users ON markers.IDuser=users.id INNER JOIN users_quest ON markers.IDuser_quest=users_quest.IDuser_quest"
                    . " WHERE markers.IDuser=" . $_SESSION['userid'];
            $result = mysqli_query($mysqli, $query);
            $numero=1;
            $difficolta= array("Facile","Medio","Difficile");
            
                    
            while ($row = mysqli_fetch_object($result)) {
                
                  echo '<div class="panel panel-default" style="padding:10px; "  >
                      <div class="media" >
 <a class="" href="https://maps.google.com/maps?q=&layer=c&cbll='.$row->lat.','.$row->lng.'&cbp=11,0,0,0,0&ll=31.335198,-89.287204&z=10" >
 <img class="media-object"  src="http://maps.googleapis.com/maps/api/streetview?size=400x250&location='.$row->lat.','.$row->lng.'&fov=90&heading=235&pitch=10"">
 </a>

  <h4 class="">Quest #'.$numero.'</h4>
 <b>Long:</b>  '. $row->lng .'<br><b>Lat: </b> '. $row->lat .'<br><b>Ora: </b>'.$row->timestamp. '<br><b>Difficoltà: </b> '.$difficolta[$row->IDQuest-1] .'
</div>  
   </div> '  ;
                  
             
                  
                  
                  
                  
                  
                  
  $numero++;
            }
            ?>
        </div>

    </body>
    <!-- Core JavaScript Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
</html>