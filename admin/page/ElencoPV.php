<?php
  $negozi=$conn->query("SELECT * FROM punti_vendita")->fetch_all();
  if($negozi){
      $l='';
      for($i=0;$i<count($negozi);$i++){
        $l.="<tr><td>".$negozi[$i][0]."</td><td>".$negozi[$i][1]."</td><td>".$negozi[$i][3]."</td><td>".$negozi[$i][4]."</td><td>".$negozi[$i][5]."</td>
        </tr>";
      }
  }
?>

<div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Codice</th>
                                                <th>Modulo</th>
                                                <th>Insegna</th>
                                                <th>Località</th>
                                                <th>Indirizzo</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                echo $l;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>