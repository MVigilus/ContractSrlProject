<?php
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
                    <div class="form-heading"><h3>Seleziona Tipologia</h3></div><br>
                            <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect04">
                            <option value="string" selected>_________</option>
                            <option value="mod1">Giorno Specifico</option>
                            <option value="mod2">Giorno Periodico</option>
                            <option value="mod3">Giorno della Settimana</option>
                            <option value="mod3">Giorno della Settimana</option>
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
<div id="containerf2" style="padding-top:3em;">

    </div>
<script>
                $(document).ready(function(){
                    $("select").change(function(){
                        var selected = "mod="+$(this).children("option:selected").val();
                        //alert(selected);
                        //alert($(".container").length);
                        $.ajax({
                            type:"POST",
                            url:"admin/assets/richieste ajax/Stat.php",
                            data:selected,
                            dataType:"text",
                            success:function(response){
                                //alert(response);
                                $(".containerf").html(response);
                            }
                        });
                        
                    });

                });

                function mod1(value){
                    var value2="data="+value;
                    $.ajax({
                            type:"POST",
                            url:"admin/assets/richieste ajax/mod1.php",
                            data:value2,
                            dataType:"text",
                            success:function(response){
                                //alert(response);
                                $("#containerf2").html(response);
                            }
                        });
                }

                function mod2(){
                    var giorno = document.getElementById("giorno").value;
                    var mese=document.getElementById("mese").value;
                    var anno=document.getElementById("anno").value;
                    if(giorno!='' && mese!='' && anno!=''){
                        var query="giorno="+giorno+"&mese="+mese+"&anno="+anno;
                        //alert(query);
                        $.ajax({
                            type:"POST",
                            url: 'admin/assets/richieste ajax/mod2.php',
                            data:query,
                            dataType:"text",
                            success:function(response){
                                //alert(response);
                                $("#containerf2").html(response);
                            }
                        });
                    }else{
                        alert("seleziona tutti i campi");
                    }
                    
                }

                function Stampa(){
                    var divElements = document.getElementById("containerf2").innerHTML;
                    //Get the HTML of whole page
                    var oldPage = document.body.innerHTML;
                    //Reset the page's HTML with div's HTML only
                    document.body.innerHTML = 
                    "<html><head><title></title></head><body>" + 
                    divElements + "</body>";
                    //Print Page
                    window.print();
                    //Restore orignal HTML
                    document.body.innerHTML = oldPage;
                }
                </script>
</div>
<?php
    }
?>



