<?php
    if(isset($_POST['modificaPV'])){
        $IDPV=$_POST['IdPV'];
        $NomePV=$_POST['modulo'];
        $Insegna=$_POST['insegna'];
        $Localita=$_POST['localita'];
        $Indirizzo=$_POST['indirizzo'];
        $idvecchio=$_POST['idvecchio'];
        $res=$conn->query("UPDATE punti_vendita SET id='$IDPV', modulo='$NomePV', insegna='$Insegna', localita='$Localita',indirizzo='$Indirizzo' WHERE id='$idvecchio' ");
        if($res){
            echo '<script>alert("Modifica Avvenuta Con Successo");</script>';
        }
    }
    if(isset($_GET['idPV'])){
        $idPV=$_GET['idPV'];
        $res=$conn->query("SELECT * FROM punti_vendita WHERE id='$idPV'")->fetch_assoc();
        if($res){

        }
    }else{
        $PV=$conn->query("SELECT id,modulo FROM punti_vendita WHERE id<>'Contractadmin'  ")->fetch_all();
        $l='';
        for($i=0;$i<count($PV);$i++){
            $l.='<option value="'.$PV[$i][0].'">'.$PV[$i][0].'---'.$PV[$i][1].'</option>';
        }
?>
            <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>




<div class="container">
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4 col-md-offset-4">
  <div class="bd" style="position:relative;padding-top:2.5em;">
                <form method="get">
                    <div class="form-heading"><h3>Seleziona Punto Vendita</h3></div><br>
                            <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect04">
                            <option value="string" selected>Scegli il Punto Vendita</option>
                            <?php
                                echo $l;
                            ?>
                        </select>
                        </div>
                </form>
                <div class="containerf">

                </div>
            </div>

  </div>
  <div class="col-md-4 col-md-offset-8">
  

  </div>
</div>
<script>
                $(document).ready(function(){
                    $("select").change(function(){
                        var selected = "q="+$(this).children("option:selected").val();
                        var div=document.getElementsByClassName('.container');
                        //alert(selected);
                        //alert($(".container").length);
                        $.ajax({
                            type:"POST",
                            url:"admin/assets/richieste ajax/modifica.php",
                            data:selected,
                            dataType:"text",
                            success:function(response){
                                //alert(response);
                                $(".containerf").html(response);
                            }
                        });
                        
                    });
                });
                </script>
</div>
<?php
    }
?>



