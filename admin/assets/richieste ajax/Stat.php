<?php
$mod=$_POST['mod'];
$current_year=date("Y");
$l='';
for($i=1;$i<32;$i++){
    $l.='<option value="'.$i.'">'.$i.'</option>';
}
switch($mod){
    case 'mod1':
        echo '<form  method="post" >
        <input type="date" name="" id="" onkeyup="mod1(this.value)">
        
        </form>';
        break;
    case 'mod2':
        echo '<form  method="post" >
        <select name="giorno" id="giorno">
        <option value="">Giorno</option>
        '.$l.'
        </select>
        <select name="mese" id="mese">
        <option value="">Mese</option>
        <option value="1">Gennaio</option>
        <option value="2">Febbraio</option>
        <option value="3">Marzo</option>
        <option value="4">Aprile</option>
        <option value="5">Maggio</option>
        <option value="6">Giugno</option>
        <option value="7">Luglio</option>
        <option value="8">Agosto</option>
        <option value="9">Settembre</option>
        <option value="10">Ottobre</option>
        <option value="11">Novembre</option>
        <option value="12">Dicembre</option>
        </select> <select name="anno" id="anno">
        <option value="">Anno</option>
        <option value="'.$current_year.'">'.$current_year.'</option>
        <option value="'.($current_year-1).'">'.($current_year-1).'</option>
        <option value="'.($current_year-2).'">'.($current_year-2).'</option>
        <option value="'.($current_year-3).'">'.($current_year-3).'</option>
        <option value="'.($current_year-4).'">'.($current_year-4).'</option>
        </select> <input type="button" value="Invia" onclick="mod2()" style="padding: left 10px;">
        </form>';
        break;
    case 'mod3':
        break;
}
?>
