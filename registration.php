<!DOCTYPE html>
<html lang="it">
<?php 
require 'conn.php';
session_start();
if(isset($_SESSION['userid'])) //se l'utente è già loggato non deve vedere questa pagina!
{
    header("Location: home.php"); 
    exit();
}

?>
    
    
<head>
        <link rel="icon" type="image/ico" href="img/icona.ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9 user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

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
     <link href="css/registration.css" rel="stylesheet">
     <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/image-picker.css" rel="stylesheet">
    
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
    </nav>
    
    
<?php
if(!isset($_POST['conferma'])) //Non sono stati inviati dati: mostriamo la pagina per la registrazione
{
echo '

   <div class="panel panel-default col-md-8 col-md-offset-2" >
 <div class="panel-heading">
  <h3 class="panel-title">Registrati</h3>
 </div>
  <div class="panel-body">
      
 <form class="form-horizontal" name="form" role="form" method="POST" action="registration.php" onsubmit="return CheckPassword();" >
     
     
  <div class="form-group">
    <label for="nome" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username"
       placeholder="Username" required name="txtUsername">
    </div>
      </div>
      
  <div class="form-group">
    <label for="nome" class="col-sm-2 control-label">Nome</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nome"
       placeholder="Nome" required name="txtNome">
    </div>
      </div>      


     <div class="form-group">
    <label for="cognome" class="col-sm-2 control-label">Cognome</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="cognome"
       placeholder="Cognome" required name="txtCognome">
    </div>
     </div>
     
   <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
 <div class="col-sm-10">
   <div class="input-group input-group-sm">
     <span class="input-group-addon">@</span>
    <input type="email" class="form-control" placeholder="Email" required name="txtEmail">
  </div>
  </div>
  </div>
  
    <div class="form-group">
    <label for="pass" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="pass" required name="txtPass">
    </div>
  </div>
  
    <div class="form-group">
    <label for="confirmpass" class="col-sm-2 control-label">Conferma la tua Password
    </label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="confirmpass" required name="txtPassConf">
    </div>
  </div>

  <div class="form-group">
    <label for="indirizzo" class="col-sm-2 control-label">Indirizzo</label>
    <div class="col-sm-10">
        <input type="text" id="indirizzo" name="txtIndirizzo" cols="" rows="" required class="form-control"></input>
    </div>
  </div>
  
   <div class="form-group"> 
<div class="container">
 <select id="avatar" name="avatar" class="image-picker"> 
     ';

$query="SELECT * from avatars";
$result= mysqli_query($mysqli, $query);
while($row=  mysqli_fetch_object($result))
{
     
    echo '<option data-img-src="img/avatar/'.$row->Nome.'.jpg" value="'.$row->ID.'">'.$row->Nome.'</option>';

    
}

echo '
</select>    
</div>
</div>

  <div class="panel-footer" style="overflow:hidden;text-align:right;">
    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="conferma" class="btn btn-success btn-sm" value="Conferma">

        <a href="index.php">  <button type="button" class="btn btn-default btn-sm">Torna indietro</button></a>
    </div>
  </div>  
  </div>
</div>
  </form>  ';
}

if(isset($_POST['conferma'])) //sono stati inviati dati: dobbiamo effettuare la registrazione
{
 $username=mysqli_real_escape_string($mysqli,$_POST['txtUsername']);
 $nome=mysqli_real_escape_string($mysqli,$_POST['txtNome']);
 $cognome=mysqli_real_escape_string($mysqli,$_POST['txtCognome']);
 $email=mysqli_real_escape_string($mysqli,$_POST['txtEmail']);
 $password=md5(mysqli_real_escape_string($mysqli,$_POST['txtPass']));
   $indirizzo=  mysqli_real_escape_string($mysqli,$_POST['txtIndirizzo']);
   $idavatar=mysqli_real_escape_string($mysqli,$_POST['avatar']);
 $checkusername = mysqli_query($mysqli,"SELECT * FROM users WHERE username = '".$username."'");
     if(mysqli_num_rows($checkusername) != 0)
     {
        echo "<h1>Errore</h1>";
           echo '<div class="alert alert-danger">
                <strong>Errore!</strong> Il nome è già in uso. <a href=registration.php>Riprova</a></div>';
     }
     else //se il nome non è stato già preso..
     {
        $registerquery = mysqli_query($mysqli,"INSERT INTO users (username, password, email,cognome,nome,indirizzo,IDAvatar) VALUES('".$username."', '".$password."', '".$email."','".$cognome."','".$nome."','".$indirizzo."','.$idavatar.')");
        if($registerquery)
        {
         
            echo '<div class="alert alert-success">
        <strong>Account creato con successo!</strong> <a href=index.php>Clicca qui per fare il login</a>
      </div>';

        }
        else
        {
           
            echo '<div class="alert alert-danger">
                <strong>Errore!</strong> C\'è stato un errore, per favore riprova. </div>';

        }       
     }
    
}

    

   
?>
    
</body>


  <!-- Core JavaScript Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/jquery.parallax.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <!-- JavaScript index -->
    <script src="js/grayscale.js"></script>
  <script src="js/registration.js"></script>
  <script src="js/image-picker.min.js"></script>

</html>
    