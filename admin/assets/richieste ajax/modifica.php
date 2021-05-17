<?php
$id=$_POST['q'];
if($id!="string"){
    include 'connessione.php';
$PV=$conn->query("SELECT * FROM punti_vendita WHERE id='$id'")->fetch_assoc();

    echo '<form method="POST" style="padding-top:3em">
    <div class="form-heading"><h3>Modifica Punto Vendita</h3></div><br>
    <div class="form-group">
        <label for="IDPV">Id</label>
        <input type="text" class="form-control" aria-describedby="Id" name="IdPV" value="'.$PV['id'].'" placeholder="'.$PV['id'].'" required>
    </div>
  <div class="form-group">
    <label for="modulo">Modulo</label>
    <input type="text" name="modulo"  class="form-control" id="Modulo" value="'.$PV['modulo'].'" placeholder="'.$PV['modulo'].'" required>
  </div>
  <div class="form-group">
    <label for="modulo">Insegna</label>
    <input type="text" name="insegna"  class="form-control" id="Modulo" value="'.$PV['insegna'].'" placeholder="'.$PV['insegna'].'" required>
  </div>
  <div class="form-group">
    <label for="modulo">Localita</label>
    <input type="text" name="localita"  class="form-control" id="Modulo" value="'.$PV['localita'].'" placeholder="'.$PV['localita'].'" required>
  </div>
  <div class="form-group">
    <label for="modulo">Indirizzo</label>
    <input type="text" name="indirizzo"  class="form-control" id="Modulo" value="'.$PV['indirizzo'].'" placeholder="'.$PV['indirizzo'].'" required>
  </div> 
    <input type="hidden" name="page" value="modPV.php">
    <input type="hidden" name="idvecchio" value="'.$PV['id'].'">
  <button type="submit" name="modificaPV" class="btn btn-primary">Salva</button>
</form>';
}else{
    echo '';
}

    
?>
