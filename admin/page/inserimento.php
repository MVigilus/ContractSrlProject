<?php
if(isset($_POST['conferma_value'])){
            $IDPV=$_POST['IDPV'];
            $NomePV=$_POST['nomePV'];
            $password=$_POST['passwordPV'];
            $Insegna=$_POST['InsegnaPV'];
            $Localita=$_POST['localitaPV'];
            $Indirizzo=$_POST['indirizzoPV'];
$anno=date("Y");
$mese=date("m");
$res=$conn->query("INSERT INTO punti_vendita(id,modulo,password,insegna,localita,indirizzo) VALUES('$IDPV','$NomePV','$password','$Insegna','$Localita','$Indirizzo') ");
$res2=$conn->query("INSERT INTO progressivo_mese(id,punto_vendita,mese,anno,incasso,pass,scontrini) VALUES('','$IDPV','$mese','$anno','0','0','0') ");

if($res AND $res2){
    echo '<script>alert("Punto Vendita Inserito Con Successo")</script>';
}

}




?>

<div class="wrapper">
    <form class="form-signin" method="POST">       
    <h2 class="form-signin-heading">Inserisci Punto Vendita</h2>
    <input type="text" class="form-control" name="IDPV" placeholder="Id" required autofocus />
    <input type="text" class="form-control" name="nomePV" placeholder="Punto Vendita" required />   
    <input type="password" class="form-control" name="passwordPV" placeholder="Password" required />  
    <input type="text" class="form-control" name="InsegnaPV" placeholder="Insegna" required />
    <input type="text" class="form-control" name="localitaPV" placeholder="Località" required />  
    <input type="text" class="form-control" name="indirizzoPV" placeholder="Indirizzo" required />  
    <button class="btn btn-lg btn-primary btn-block"  name="conferma_value" value="Salva">Salva</button>   
    </form>
</div>