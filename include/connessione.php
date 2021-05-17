<?php
//variabili db
$db_server="localhost";
$db_username="root";
$db_password="";
$db_name="lavoro";

//variabile connessione

if(!$conn = new mysqli($db_server, $db_username, $db_password, $db_name)){
    echo '<h1>Errore connessione al database</h1>';
    system("exit",-1);
}
?>