<?php
include 'connessione.php';
$data=$_POST['data'];
$data2=date("d/m/Y",strtotime($data));

$res=$conn->query("SELECT * FROM incassi WHERE data='$data'")->fetch_all();
if($res){
    //var_dump($res);
    $l='<strong >Riepilogo -  '.$res[0][2].' '.$data2.'</strong>
    <div class="table-responsive" style="padding-top:3em">
    <table class="table table-bordered" id="dataTable" width="100%" style="padding-bottom:3em" cellspacing="0">
        <thead>
            <tr>
                <th>Punto Vendita</th>
                <th>giorno</th>
                <th>Incasso</th>
                <th>Numero Scontrini</th>
                <th>Pass</th>
                <th>PZV</th>
                <th>Meteo</th>
            </tr>
        </thead>
        <tbody>';
      for($i=0;$i<count($res);$i++){
        $l.="<tr><td>".$res[$i][0]."</td><td>".$res[$i][2]."</td><td>".$res[$i][3]."</td><td>".$res[$i][4]."</td><td>".$res[$i][5]."</td>
        <td>".$res[$i][6]."</td><td>".$res[$i][7]."</td></tr>";
      }
      $l.='</tbody></table><a href="#" class="btn btn-warning" id="print" onclick="Stampa()">Stampa</a>';
      echo $l;
}else{
    echo '<h3>Nessun incasso presente</h3>';
}
?>