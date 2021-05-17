<?php
$giorno1=date("D");
$l4;
switch($giorno1){
    case 'Tue':
        $giorno1="Martedì";
        $ngiorno=3;
        break;
        case 'Sun':
            $giorno1="Domenica";
            $ngiorno=1;
            break;
            case 'Mon':
                $giorno1="Lunedì";
            $ngiorno=2;

                break;
                case 'Thu':
                    $giorno1="Mercoledì";
            $ngiorno=4;

                    break;
    case 'Wed':
        $giorno1="Giovedì";
        $ngiorno=5;

        break;
        case 'Fri':
            $giorno1="Venerdì";
            $ngiorno=6;

            break;
            case 'Sat':
                $giorno1="Sabato";
            $ngiorno=7;

                break;
}
//var_dump($giorno1);
$l2='';
$PV=$conn->query("SELECT id,modulo FROM punti_vendita WHERE id<>'Contractadmin'  ")->fetch_all();
        $l='';
        for($i=0;$i<count($PV);$i++){
            $l.='<option value="'.$PV[$i][0].'">'.$PV[$i][0].'---'.$PV[$i][1].'</option>';
        }
if(isset($_POST['conferma_value'])){
            $data=$_POST['data'];
            $array=array(
                "1"=>"dom","2"=>"lun","3"=>"mar","4"=>"mer","5"=>"gio","6"=>"ven","7"=>"sab",
            );
            $giorno=substr($giorno1,0,3);
            
            $Incasso=$_POST['incasso'];
            $n_scontrini=$_POST['n_scontrini'];
            $pass=$_POST['pass'];
            $PZV=$_POST['PZV'];
            $meteo=$_POST['meteo'];
            $id=$_POST['IdPV'];
            $res=$conn->query(" SELECT * FROM incassi WHERE data='$data' AND punto_vendita='$id' ")->fetch_assoc();
            
            
            //var_dump($res);
            //echo "SELECT id FROM incassi WHERE data='$data' AND punto_vendita='$id'";
            if($res==null){
                //$res1=$conn->query("SELECT prog_incasso,prog_pass,prog_scont from incassi WHERE punto_vendita='$id' AND data<");
                $res2=$conn->query("INSERT INTO incassi(punto_vendita,data,giorno,incasso,n_scontrini,pass,PZV,meteo,n_giorno) VALUES('$id','$data','$giorno','$Incasso','$n_scontrini','$pass','$PZV','$meteo','$ngiorno')");
                
                //echo "INSERT INTO incassi(punto_vendita,data,giorno,incasso,n_scontrini,pass,PZV,meteo,n_giorno) VALUES('$id','$data','$giorno','$Incasso','$n_scontrini','$pass','$PZV','$meteo','$ngiorno')";
                if($res2){
                    echo '<script>alert("Incasso inserito con successo");</script>';
                }
            }else{
                //var_dump($res);
                $l4='
                <div class="table-responsive" style="padding-top:3em">
                <table class="table "  width="100%" style="padding-bottom:3em" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Punto Vendita</th>
                            <th>Data</th>
                            <th>Incasso</th>
                            <th>Numero Scontrini</th>
                            <th>Pass</th>
                            <th>PZV</th>
                            <th>Meteo</th>
                        </tr>
                    </thead>
                    <tbody>';
                    $l4.="
                    <tr><td>Vecchio incasso</td><td>".$res['punto_vendita']."</td>
                    <td>".$res["data"]."</td><td>".$res["incasso"]."</td><td>".$res["n_scontrini"]."</td><td>".$res['pass']."</td>
                    <td>".$res['PZV']."</td><td>".$res['meteo']."</td></tr>
                    <tr style=\"background-color:#000080\"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                    <tr><td>Nuovo Incasso</td><td>$id</td><td>$data</td><td>$Incasso</td><td>$n_scontrini</td><td>$pass</td><td>$PZV</td><td>$meteo</td></tr>
                    ";
                  $sql="id=$id&data=$data&incasso=$Incasso&n_scontrini=$n_scontrini&pass=$pass&PZV=$PZV&meteo=$meteo";
                  //echo $sql;
                  $l4.="</tbody></table><a href=\"#\" class=\"btn btn-danger\" id=\"print\" onclick=\"annulla()\" style=\"margin-right: 20px\">Annulla</a><a href=\"#\" class=\"btn btn-warning\" id=\"print\" onclick='conferma(\"$sql\")'>Conferma Modifica</a>";
            }
}




?>
 <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<div class="container">
<div class="row">
<div class="col-12">
<?php
    if(isset($l4)){
        echo $l4;
    }
?>
<div class="wrapper">
    <form class="form-signin" method="POST">       
    <h2 class="form-signin-heading" style="margin-bottom:20px">Inserisci l'Incasso</h2>
    
    <input type="date" class="form-control" name="data" value="" placeholder=""  />
    <input type="hidden" class="form-control" name="giorno" value="<?php echo $giorno1; ?>" placeholder="Id" readonly autofocus />
<br>
                        <select class="custom-select" id="inputGroupSelect04" name="IdPV">
                            <option value="string" selected>Scegli il Punto Vendita</option>
                            <?php
                                echo $l;
                            ?>
                        </select>
    <input type="number" style="margin-top: 20px;" step="0.01" class="form-control" name="incasso" placeholder="Incasso" required />  
    <input type="number" class="form-control" name="n_scontrini" placeholder="Numeri Scontrini" required />
    <input type="number" class="form-control" name="pass" placeholder="Pass" required />  
    <input type="number" class="form-control" name="PZV" placeholder="PZV" required />  
    <select name="meteo" class="custom-select">
        <option value="S">Condizioni Meteo</option>
        <option value="S">S - Sole</option>
        <option value="P">P - Pioggia</option>
        <option value="N">N - Nuvoloso</option>
        <option value="n">n - Neve</option>
    </select> 
    <button class="btn btn-lg btn-primary btn-block" style="margin-top:35px"  name="conferma_value" value="Salva">Salva</button>   
    </form>
</div>

<script>
function annulla(){
    alert("modifica incasso annullata");
    location.href="?page=modInc.php";
}
function conferma(str){
                        $.ajax({
                            type:"POST",
                            url:"admin/assets/richieste ajax/query.php",
                            data:str,
                            dataType:"text",
                            success:function(response){
                                alert(response);
                                $(".container").html(response);
                            }
                        });
}
</script>

</div>
</div>
</div>

