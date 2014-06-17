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

 
<!--[if lte IE 7]>
<link type="text/css" rel="stylesheet" media="all" href="css/screen_ie.css" />
<![endif]-->

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
    
    
    
        <div class="col-md-5 col-sm-12"  style="padding-top: 40px;"   >
            <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Bentornato, <?php echo $_SESSION['username']?>!</div>
  <div class="panel-body">
      <img class="avatar" src="img/avatar/<?php 
      $query="SELECT Nome from avatars WHERE ID=".$_SESSION['IDAvatar'];
      $result=mysqli_query($mysqli,$query);
      while($row=  mysqli_fetch_object($result))
      {
          echo $row->Nome;
      }
      
      ?>.jpg">
  </div>
  
  <!-- List group -->
  <ul class="list-group">
    <li class="list-group-item">
    <?php
    $query="SELECT COUNT(IDUser) as NQUEST FROM users_quest WHERE IDUser=".$_SESSION['userid'];
    $result=  mysqli_query($mysqli, $query);
      while($row=  mysqli_fetch_object($result))
      {
          if($row->NQUEST==0)
          {
              echo "Non hai completato alcuna quest!";
          }
          else
              echo "Hai completato ".$row->NQUEST." quest!";
      }
    ?>
    
    </li>
    
    
    
    <li class="list-group-item"> <?php 
    $query="SELECT SUM(exp) AS Esperienza 
             FROM users_quest INNER JOIN quest ON users_quest.IDQuest = quest.ID  
             WHERE IDUser=".$_SESSION['userid'];
      
    
    $result=mysqli_query($mysqli,$query);
      while($row=  mysqli_fetch_object($result))
      {
          if($row->Esperienza=="")
              echo "Non hai guadagnato punti esperienza!";
              else
          echo "Hai guadagnato: ".$row->Esperienza." punti esperienza!";
      }   ?> 
    </li>
    <li class="list-group-item"><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2F79.21.184.43%2Fgeoadventure%2F&amp;width&amp;layout=button&amp;action=like&amp;show_faces=false&amp;share=true&amp;height=35" 
           scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:35px;" 
           allowTransparency="true"></iframe></li>

  </ul>
</div>
            
            
        </div>
        
    <div class="col-md-5 " style="padding-top: 40px;">

        </div>
    

        
        <div class="col-md-2" style="padding-top: 40px;" >
             <ul class="nav nav-pills nav-stacked" style="border-radius: 5px; background-color:whitesmoke;">
                <li><a href="questlist.php"><i class="fa fa-home fa-fw"></i>Quest Completate</a></li>
                <li><a href="mappa.php?type=me"><i class="fa fa-list-alt fa-fw"></i>Mappa Personale</a></li>
                <li><a href="mappa.php?type=all"><i class="fa fa-map-marker fa-fw"></i>Mappa Globale</a></li>

            </ul>
   
        </div>

    
    
    
    
    
    
    
    
    

</body>


  <!-- Core JavaScript Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- JavaScript index -->

</html>
    
