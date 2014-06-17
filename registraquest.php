<?php

require './conn.php';

if ($_POST) { //run only if there's a post data
    //make sure request is comming from Ajax
    $xhr = $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    if (!$xhr) {
        header('HTTP/1.1 500 Error: Request must come from Ajax!');
        exit();
    }




//registriamo la quest
    $query = 'INSERT INTO users_quest(IDUser,IDQuest,durata) VALUES (' . $_POST['id'] . ',' . $_POST['livello'] . ',' . $_POST['durata'] . ')';
    $result = mysqli_query($mysqli, $query);
    if (!$result) {
        header('HTTP/1.1 500 Error: Impossibile inserire query!');
        exit();
    }
//registriamo il marker
    $iduser_quest=  mysqli_insert_id($mysqli);
    
    $query = 'INSERT INTO markers(lat,lng,IDuser,IDuser_quest) VALUES (' . $_POST['lat'] . ',' . $_POST['lng'] . ',' . $_POST['id'] . ',' . $iduser_quest .')';
    $result = mysqli_query($mysqli, $query);
    if (!$result) {
        header('HTTP/1.1 500 Error: Impossibile inserire il marker!');
        exit();
    }
    $query='SELECT exp FROM quest WHERE ID='.$_POST['livello'];
    $result=mysqli_query($mysqli, $query);
    $espobj=  mysqli_fetch_object($result);
    $esp=$espobj->exp;
   echo "Esperienza ottenuta: ".$esp."esp \nTempo Impiegato:".$_POST['durata']." secondi";
   
    
    
}
?>

