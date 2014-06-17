<!DOCTYPE html>
<html lang="it">
    <?php
    require 'conn.php';
    session_start();
    if (!isset($_SESSION['userid']))
        header("location: index.php");
     if (!isset($_GET['type']))
        header('HTTP/1.1 405 Error: Nessun parametro GET specificato');
    ?>

    <head>
            <link rel="icon" type="image/ico" href="img/icona.ico">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
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
                            <a href="help.php">Help</a>
                        </li>  
                        <li class="page-scroll">
                            <a href="signout.php">Sign Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
        $encodedString = ""; //This is the string that will hold all your location data
        $x = 0; //This is a trigger to keep the string tidy
        $query;
      
        if($_GET['type']=="all")
        $query = "SELECT * FROM markers INNER JOIN users ON markers.IDuser=users.id INNER JOIN users_quest ON markers.IDuser_quest=users_quest.IDuser_quest";
        else if($_GET['type']=="me")
        $query = "SELECT * FROM markers INNER JOIN users ON markers.IDuser=users.id INNER JOIN users_quest ON markers.IDuser_quest=users_quest.IDuser_quest"
                . " WHERE markers.IDuser=".$_SESSION['userid'];
        
        
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_object($result)) {
            //This is to keep an empty first or last line from forming, when the string is split
            if ($x == 0) {
                $separator = "";
            } else {
                //Each row in the database is separated in the string by four *'s
                $separator = "****";
            }
            //Saving to the String, each variable is separated by three &'s
            $encodedString = $encodedString . $separator .
                    "<p class='content'><b>Scoperto da:</b> " . $row->username .
                    "<br><b>Long:</b> " . $row->lng.
                    "<br><b>Lat: </b>" . $row->lat .
                    "<br><b>Ora: </b>" . $row->timestamp .
                    "</p>&&&" . $row->lat . "&&&" . $row->lng;
            $x = $x + 1;
        }
        ?>
   
        <div id="map_canvas" style="width: 100%;height: 100%;"></div>
    </body>

    <!-- Core JavaScript Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <script>
        
    var map;

            var markersArray = [];
            var infos = [];
    function initialize() {
            var map_canvas = document.getElementById('map_canvas');
            var map_options = {
                center: new google.maps.LatLng(44.5403, -78.5463),
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map(map_canvas, map_options)
        
        //Ora dobbiamo aggiungere i marker
        
        
        //Initialize a variable that the auto-size the map to whatever you are plotting
            var bounds = new google.maps.LatLngBounds();
        var encodedString=" <?php echo $encodedString; ?> ";
 //Split the encoded string into an array the separates each location
        stringArray = encodedString.split("****");
 
        var x;
        for (x = 0; x < stringArray.length; x = x + 1)
        {
            var addressDetails = [];
            var marker;
            //Separate each field
            addressDetails = stringArray[x].split("&&&");
            //Load the lat, long data
            var lat = new google.maps.LatLng(addressDetails[1], addressDetails[2]);
            //Create a new marker and info window
            marker = new google.maps.Marker({
                map: map,
                position: lat,
                //Content is what will show up in the info window
                content: addressDetails[0]
            });
            //Pushing the markers into an array so that it's easier to manage them
            markersArray.push(marker);
            google.maps.event.addListener( marker, 'click', function () {
                closeInfos();
                var info = new google.maps.InfoWindow({content: this.content});
                //On click the map will load the info window
                info.open(map,this);
                infos[0]=info;
            });
           //Extends the boundaries of the map to include this new location
           bounds.extend(lat);
        }
        //Takes all the lat, longs in the bounds variable and autosizes the map
        map.fitBounds(bounds);
 
    }
        google.maps.event.addDomListener(window, 'load', initialize);

    
        //Manages the info windows
        function closeInfos(){
       if(infos.length > 0){
          infos[0].set("marker",null);
          infos[0].close();
          infos.length = 0;
       }
        }
 


    </script>



</html>