<?php
require 'conn.php';
session_start();
$username=  htmlspecialchars($_POST['username']);
$password= md5($_POST['password']);

// effettuo la query per verificare la correttezza del login
$result = mysqli_query($mysqli,"SELECT * FROM users WHERE username = '" . $username . "'");

// verifico che ci siano dei risultati...
if (mysqli_num_rows($result) > 0)
{
  $row = mysqli_fetch_assoc($result);
  // effettuo la comparazione della password digitata con quella salvata nel DB
  if (strcmp($row['password'], $password) == 0) {
    // in caso di successo creo la sesione
      $_SESSION['username']=$row['username'];
    $_SESSION['userid'] = $row['id'];
    $_SESSION['IDAvatar']=$row['IDAvatar'];
    $_SESSION['nome']=$row['nome'];
    $_SESSION['cognome']=$row['cognome'];
    $_SESSION['indirizzo']=$row['indirizzo']; //not sure if useful lol
    //
    // e stampo 1 (che identifica il successo)
    echo 1;
  }
  else{
    // in caso di comparazione non riuscita stampo zero
    echo 0;
  }
}else{
  // se non ci sono risultati stampo zero
  echo 0;
}

?>