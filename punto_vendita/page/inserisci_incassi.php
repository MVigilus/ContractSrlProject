<?php
$giorno1=date("D");
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


if(isset($_POST['conferma_value'])){
            $data=date("Y-m-d");
            $array=array(
                "1"=>"dom","2"=>"lun","3"=>"mar","4"=>"mer","5"=>"gio","6"=>"ven","7"=>"sab",
            );
            $giorno=substr($giorno1,0,3);
            
            $Incasso=$_POST['incasso'];
            $n_scontrini=$_POST['n_scontrini'];
            $pass=$_POST['pass'];
            $PZV=$_POST['PZV'];
            $meteo=$_POST['meteo'];
            $id=$_SESSION['id'];
            $res=$conn->query(" SELECT punto_vendita FROM incassi WHERE data='$data' AND punto_vendita='$id' ")->fetch_assoc();
            //$prog=$conn->query("SELECT mese FROM progressivo_mese WHERE punto_vendita='$id'")->fetch_all();
            //$res3=$conn->query("SELECT incassi.incasso,incassi.n_scontrini,incassi.pass,progressivo_mese.incasso FROM incassi,progressivo_mese")->fetch_all();
            if($res3){

            }
            //var_dump($res);
            //echo "SELECT id FROM incassi WHERE data='$data'";
            if($res==null ){
                //$res1=$conn->query("SELECT prog_incasso,prog_pass,prog_scont from incassi WHERE punto_vendita='$id' AND data<");
                $res2=$conn->query("INSERT INTO incassi(punto_vendita,data,giorno,incasso,n_scontrini,pass,PZV,meteo,n_giorno) VALUES('$id','$data','$giorno','$Incasso','$n_scontrini','$pass','$PZV','$meteo','$ngiorno')");
                
                //echo "INSERT INTO incassi(punto_vendita,data,giorno,incasso,n_scontrini,pass,PZV,meteo,n_giorno) VALUES('$id','$data','$giorno','$Incasso','$n_scontrini','$pass','$PZV','$meteo','$ngiorno')";
                if($res2){
                    echo '<script>alert("Incasso inserito con successo");</script>';
                }
            }else{
                echo '<script>alert("Impossibile Inserire In Incasso.\nIncasso In Data Odierna già Inserita.");</script>';
            }
}




?>

<div class="wrapper">
    <form class="form-signin" method="POST">       
    <h2 class="form-signin-heading" style="margin-bottom:20px">Inserisci l'Incasso</h2>
    
    <input type="date-local" class="form-control" name="data" value="<?php echo $giorno1.", ".date("d/m/Y"); ?>" placeholder="Id" readonly autofocus />
    <input type="hidden" class="form-control" name="giorno" value="<?php echo $giorno1; ?>" placeholder="Id" readonly autofocus />
<br>
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