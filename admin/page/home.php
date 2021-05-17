<?php
    $res=$conn->query("SELECT * FROM incassi");
    $datigrafico='';
    while($row=mysqli_fetch_array($res)){
        $datigrafico.="{data:'".$row["data"]."', incasso:'".$row["incasso"]."', punto_vendita:'".$row["punto_vendita"]."'}, ";
    }
    $datigrafico=substr($datigrafico,0,-2);
    
?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<div class="container-fluid">
                        <h1 class="mt-4">Contract s.r.l. </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">home page illustrativa</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        grafico 1 esempio
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        grafico 2 esempio
                                    </div>
                                    <div class="card-body"><div id="grafico" width="100%" height="100%"></div></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                esempio di tabella dei punti vendita
                            </div>
                            
                        </div>
                    </div>

                    <script>
                    Morris.Bar({
                        element : 'grafico',
                        data:[<?php echo $datigrafico ?>],
                        xkey:'data',
                        ykeys:['incasso'],
                        labels:['incasso','punto_vendita'],
                        hideHover:'auto'
                    })
                    </script>