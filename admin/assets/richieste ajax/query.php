<?php
include 'connessione.php';
$incasso=$_POST['incasso'];
$n=$_POST['n_scontrini'];
$pass=$_POST['pass'];
$pzv=$_POST['PZV'];
$meteo=$_POST['meteo'];
$id=$_POST['id'];
$data=$_POST['data'];
$res=$conn->query("UPDATE incassi SET incasso='$incasso', n_scontrini='$n',pass='$pass',PZV='$pzv',meteo='$meteo' WHERE punto_vendita='$id' AND data='$data'");
if($res){
    echo '<script>alert("modifica effettuata");location.href="?page=modInc.php";</script>';
}
?>