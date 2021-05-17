<?php
session_start();
include 'include/connessione.php';
if(isset($_SESSION['tipo'])){
    if($_SESSION['tipo']=='admin'){
        include 'admin/index.php';
    }else{
        include 'punto_vendita/index.php';
    }
}else{
    include 'auth/index.php';
}

?>

