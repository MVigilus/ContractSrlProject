<?php
if(isset($_POST['tipoacc'])){
    include './include/connessione.php';
            $username=$_POST['username'];
            $password=$_POST['password'];
            if($username=="Contractadmin" && $password=="!Passw0rd21"){
                $_SESSION['tipo']='admin';
                $_SESSION['username']=$username;
                echo '<script>location.href="./index.php"</script>';
            }
            $res=$conn->query("SELECT id from punti_vendita where modulo='$username' AND password='$password'")->fetch_assoc();
            
            if($res){
                $_SESSION['tipo']='utente';
                $_SESSION['id']=$res['id'];
                $_SESSION['username']=$username;
                echo '<script>location.href="./index.php"</script>';
            }else{

            }
            
}




?>




<div class="wrapper">
    <form class="form-signin" method="POST">       
    <h2 class="form-signin-heading">Credenziale di Accesso</h2>
    <input type="text" class="form-control" name="username" placeholder="Username" required autofocus />
    <input type="password" class="form-control" name="password" placeholder="Password" required required=""/>   
    <input type="hidden" name="utente">
    <button class="btn btn-lg btn-primary btn-block" name="tipoacc"  type="submit">Login</button>   
    </form>
</div>