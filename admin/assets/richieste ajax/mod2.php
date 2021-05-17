<?php
include 'connessione.php';
$giorno2=$_POST['giorno'];
$mese=$_POST['mese'];
$anno=$_POST['anno'];
//echo "SELECT * FROM incassi WHERE DAY(data)='$giorno' AND MONTH(data)='$mese' AND YEAR(data)>='$anno' ORDER BY punto_vendita";
$res=$conn->query("SELECT * FROM incassi WHERE DAY(data)='$giorno2' AND MONTH(data)='$mese' AND YEAR(data)>='$anno' ORDER BY punto_vendita,data")->fetch_all();
if($res){
    $giorno=$res[0][2];
    //var_dump($res);
    $l='<strong >Riepilogo -  '.$giorno2.'/'.$mese.' Dal '.$anno.'</strong>
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
          $idold=($i>0)?$res[$i-1][0]:$res[$i][0];
          if($idold!=$res[$i][0]){
              $l.='<tr style="background-color:#000080"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
          }
        $l.="<tr><td>".$res[$i][0]."</td><td>".date("d/m/Y",strtotime($res[$i][1]))."</td><td>".$res[$i][3]."</td><td>".$res[$i][4]."</td><td>".$res[$i][5]."</td>
        <td>".$res[$i][6]."</td><td>".$res[$i][7]."</td></tr>";
      }
      $l.='</tbody></table><a href="#" class="btn btn-warning" id="print" onclick="Stampa()">Stampa</a>';
      echo $l;
}else{
    echo '<h1>Nessun Record Trovato</h1>';
}
?>