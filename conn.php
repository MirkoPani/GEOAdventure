<?php
$dbuser="root";
$dbpass="";
$dbname="geoadventure";
$mysqli= mysqli_connect("localhost",$dbuser,$dbpass,$dbname);

if (mysqli_connect_errno()) {

        echo "Errore in connessione al DBMS: ".mysqli_connect_error();

        exit(); 
}
?>