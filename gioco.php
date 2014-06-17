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
        <meta name="viewport" content="width=device-width, initial-scale=0.9 user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="Mirko Pani">



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
        <link href="css/gioco.css" rel="stylesheet">


<!--<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAhPXcWRAupzqF2OZqdu9PqjEhYFvZJ5o8&sensor=true"></script>-->
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

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
                            <a href="gioco.php">Gioca</a>
                        </li>
                              <li class="page-scroll">
                            <a href="help.php">HELP</a>
                        </li> 
                        <li class="page-scroll">
                            <a href="signout.php">Sign Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">

            <?php
            if (!isset($_GET['livello'])) {  //non è stato scelto nulla, vuol dire che dobbiamo presentare la form per la scelta
                echo "<div class='panel panel-default col-md-8 col-md-offset-2' style='margin-top:50px; '>
 <div class='panel-heading'>
  <h3 class='panel-title'>Scegli il livello di difficoltà!</h3>
 </div>
  <div class='panel-body'>
      
            <form name='form' method='POST' action='gioco.php'>
   <ul class='list-group'>
  <li class='list-group-item list-group-item-success'><a href='gioco.php?livello=1'><span class='glyphicon glyphicon-tree-conifer'></span> Facile </a>: Verranno assegnati 10 ESP </li>
  <li class='list-group-item list-group-item-info'><a href='gioco.php?livello=2'><span class='glyphicon glyphicon-tree-conifer'></span> Medio </a>: Verranno assegnati 15 ESP</li>
  <li class='list-group-item list-group-item-danger'><a href='gioco.php?livello=3'><span class='glyphicon glyphicon-tree-conifer'></span> Difficile </a>: Verranno assegnati 30 ESP</li>
      </ul>
      
            </form><br>
            <div class='well well-sm'>
            <p>In base al livello di difficoltà che sceglierai, verrà assegnato un punteggio diverso! </P>
            
</div>



</div>
            </div>
            
            </div>
            </body>
            <!-- Core JavaScript Files -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
        
            ";
            } else if (isset($_GET['livello'])) {  //se è stato scelto il livello di difficoltà
                if ($_GET['livello'] > 3 || $_GET['livello'] < 0)  //Non esistono altri livelli di difficoltà! Controllo
                    header("location: index.php");
                else {
                    $query="SELECT MAX,MIN FROM quest WHERE ID=".$_GET['livello'];
                    $result=  mysqli_query($mysqli, $query);
                    if ($result==false)
                        exit();
                    else
                    {
                    $row=mysqli_fetch_object($result);
                    $max=$row->MAX;
                    $min=$row->MIN;
             
                   echo '

                  
                    <input id="pos_ora" value="" readonly style="width:100%">
                    
            <div class="col-md-1" style="background-color: #176e61">
                    
            </div>

            <div class="col-md-2" style="background-color: #357ebd">

            </div>
        </div>




</div>
    </body>


    <!-- Core JavaScript Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- JavaScript index -->
    <script type="text/javascript">
       var max='.$max.

                   
       ";var min=".$min;
       
     echo <<<STRINGA
                    
        var x = (Math.random() * (max - min) + min);
        var y = (Math.random() * (max - min) + min);

        // variabili, specifichiamo un punto a caso per inizializzare
        var map,
                currentPositionMarker,
                mapCenter = new google.maps.LatLng(14.668626, 121.24295),
                map;
        var posizioneattuale_lat;
        var posizioneattuale_lng;
        var posizioneattuale;
        var posizionequest;
        var raggio=30;
                    

        var start, end;  //contatori tempo
        //
        function initializeMap()
        {
                    geocoder = new google.maps.Geocoder();
            var mapcanvas = document.createElement('div');
            mapcanvas.id = 'mapcontainer';
            mapcanvas.style.height = '100%';
            mapcanvas.style.width = '100%';

                    
                    
                    
            document.querySelector('.container-fluid').appendChild(mapcanvas);
            var options = {
                zoom: 15,
                center: mapCenter,
                mapTypeControl: false,
                disableDefaultUI: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("mapcontainer"), options);

            // 
            // Crea il div con i controlli custom, e chiamiamo il costruttore
            // 
            var homeControlDiv = document.createElement('div');
            var homeControl = new HomeControl(homeControlDiv, map, mapCenter);

            homeControlDiv.index = 1;
            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(homeControlDiv);



        }

        function locError(error) {
            // Errore! non può trovare posizione.. non prende?
            alert("Impossibile trovare la tua posizione!");
        }

        // fissa la posizione attuale
        function setCurrentPosition(pos) {
            currentPositionMarker = new google.maps.Marker({
                map: map,
                position: new google.maps.LatLng(
                        pos.coords.latitude,
                        pos.coords.longitude
                        ),
                title: "Posizione attuale"
            });
            map.panTo(new google.maps.LatLng(
                    pos.coords.latitude,
                    pos.coords.longitude
                    ));
            posizioneattuale = new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude);
        }

        function displayAndWatch(position) {

            // set current position
            setCurrentPosition(position);
            setQuestMarker(position);
            // watch position
            watchCurrentPosition();

        }
        function setQuestMarker(position)
        { var a=Math.random();
       if(a<=.25)
            posizionequest = new google.maps.LatLng(position.coords.latitude + x, position.coords.longitude + y);
       else if(a>.25 && a<=.50)
            posizionequest = new google.maps.LatLng(position.coords.latitude + x, position.coords.longitude - y);
       else if (a>.50 && a<=.75)
            posizionequest = new google.maps.LatLng(position.coords.latitude - x, position.coords.longitude + y);
       else 
            posizionequest = new google.maps.LatLng(position.coords.latitude - x, position.coords.longitude - y);
            
   var quest_marker = new google.maps.Marker({
                position: posizionequest,
                map: map,
                title: "Devi andare qui!",
                icon: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
            });
                    var quest_circle=new google.maps.Circle({
                    strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.35,
      map: map,
      center: posizionequest,
      radius: raggio
                    
                    });
                    

        }
        function watchCurrentPosition() {
            var positionTimer = navigator.geolocation.watchPosition(
                    function(position) {
                        setMarkerPosition(
                                currentPositionMarker,
                                position
                                );

                        posizioneattuale = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
codeLatLng(posizioneattuale);
                        
   //controlliamo che la persona abbia raggiunto l'obiettivo
                   
                    if (pointInCircle(posizioneattuale,raggio,posizionequest) )
                        {
                            alert("Ce l'hai fatta! Hai raggiunto l'obiettivo!");
                        //    $("#mapcontainer").remove();
                  //  $("#pos_ora").remove();
                            end = new Date();
                            var secondi = Math.floor((end - start) / 1000);
                            $('#durata').val(secondi);
             
                     $.post( "registraquest.php", { id:
STRINGA;
                    echo $_SESSION['userid'].",";
                    echo "livello:".$_GET['livello'];
                    echo <<<STRINGA2
                            , durata: secondi, lat: posizionequest.lat(), lng: posizionequest.lng() } ).done(function( data ) {
    alert( data );
window.location.href = "home.php";
   
   });;       
                        }
                    }
            );
        }
function pointInCircle(point, radius, center)
{
    return (google.maps.geometry.spherical.computeDistanceBetween(point, center) <= radius)
}
                    
        function setMarkerPosition(marker, position) {
            marker.setPosition(
                    new google.maps.LatLng(
                            position.coords.latitude,
                            position.coords.longitude)
                    );
        }

        function initLocationProcedure() {
            initializeMap();
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(displayAndWatch, locError);
            } else {
                // l'utente non supporta l'API
                alert("Il tuo browser non supporta la Geolocation API!");
            }
        }

        // initialize with a little help of jQuery
        $(document).ready(function() {
            start = new Date();
            initLocationProcedure();
        });
        //FINE LOGICA SENZA OPTIONS DIV



 // Creiamo la proprietà dove tenere il nostro luogo attuale
        HomeControl.prototype.home_ = null;

 // Set e GEt della proprietà NON USATE AL MOMENTO 
        HomeControl.prototype.getHome = function() {
            return this.home_;
        }

        HomeControl.prototype.setHome = function(home) {
            this.home_ = home;
        }
        /** @constructor */
        function HomeControl(controlDiv, map, home) {

            
            var control = this;

            
            control.home_ = home;

            // Set CSS styles for the DIV containing the control
            // Setting padding to 5 px will offset the control
            // from the edge of the map
            controlDiv.style.padding = '5px';

            // Set CSS for the control border
            var goHomeUI = document.createElement('div');
            goHomeUI.style.backgroundColor = 'white';
            goHomeUI.style.borderStyle = 'solid';
            goHomeUI.style.borderWidth = '2px';
            goHomeUI.style.cursor = 'pointer';
            goHomeUI.style.textAlign = 'center';
            goHomeUI.title = 'Clicca qui per vedere il tuo luogo attuale';
            controlDiv.appendChild(goHomeUI);

            // Set CSS for the control interior
            var goHomeText = document.createElement('div');
            goHomeText.style.fontFamily = 'Arial,sans-serif';
            goHomeText.style.fontSize = '25px';
            goHomeText.style.paddingLeft = '10px';
            goHomeText.style.paddingRight = '10px';
            goHomeText.innerHTML = '<b>Dove sei</b>';
            goHomeUI.appendChild(goHomeText);

            // Set CSS for the setHome control border
            var setHomeUI = document.createElement('div');
            setHomeUI.style.backgroundColor = 'white';
            setHomeUI.style.borderStyle = 'solid';
            setHomeUI.style.borderWidth = '2px';
            setHomeUI.style.cursor = 'pointer';
            setHomeUI.style.textAlign = 'center';
            setHomeUI.title = 'Clicca per vedere dove devi andare';
            controlDiv.appendChild(setHomeUI);

            // Set CSS for the control interior
            var setHomeText = document.createElement('div');
            setHomeText.style.fontFamily = 'Arial,sans-serif';
            setHomeText.style.fontSize = '25px';
            setHomeText.style.paddingLeft = '10px';
            setHomeText.style.paddingRight = '10px';
            setHomeText.innerHTML = '<b>Quest</b>';
            setHomeUI.appendChild(setHomeText);

            // Setup the click event listener for Home (dove siamo):
            // Evento click
            google.maps.event.addDomListener(goHomeUI, 'click', function() {
                // map.setCenter(new google.maps.LatLng(posizioneattuale_lat,posizioneattuale_lng));
                map.setCenter(posizioneattuale);
            });

            // Setup the click event listener for Set Home (posizione quest):
            // Evento click 
            google.maps.event.addDomListener(setHomeUI, 'click', function() {

                map.setCenter(posizionequest);

            });
        }
function codeLatLng(posizioneattuale) {
    
    var latlng = posizioneattuale;
    geocoder.geocode({'latLng': posizioneattuale}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[0]) {
          $('#pos_ora').val(results[1].formatted_address);
        }
      } else {
        $('#pos_ora').val("Impossibile trovare l'indirizzo.");
      }
    });
  }
                                </script>

STRINGA2;
                    }
                    }
            }
            ?>

</html>
