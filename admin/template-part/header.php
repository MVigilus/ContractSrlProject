<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="admin/assets/css/style.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <?php 
            if(isset($_GET['page'])){
                switch($_GET['page']){
                    case 'inserimento.php':
                        echo '<link href="admin/assets/css/inserimento.css" rel="stylesheet" />';
                        break;
                    case 'modPV.php':
                        echo '<link href="admin/assets/css/modificaPV.css" rel="stylesheet" />';
                        break;
                        case 'modInc.php':
                            echo '<link href="admin/assets/css/inserimento.css" rel="stylesheet" />';
                            break;
                        case 'Statistiche.php':
                            echo '<link href="admin/assets/css/stat.css" rel="stylesheet" />';
                            break;
                }
            }
        ?>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">
            <img src="admin/assets/img/idea.png" width="30" height="30" alt="">
                Contract Admin
            </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" style="width:230px" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="?page=home.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                HomePage
                            </a>
                            
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Gestione Punti Vendita
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link " href="?page=inserimento.php">
                                        Nuovo PV
                                    </a>
                                    <a class="nav-link collapsed" href="?page=modPV.php" >
                                        Modifica PV
                                    </a>
                                    <a class="nav-link collapsed" href="?page=modInc.php" >
                                        Modifica/inserisci Incasso
                                    </a>
                                    <a class="nav-link collapsed" href="?page=ElencoPV.php" >
                                        Elenco PV
                                    </a>
                                    
                                </nav>
                            </div>
                            <a class="nav-link " href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="true" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
  <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
</svg></div>
                                Report<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion" >
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link " href="?page=Statistiche.php" >
                                        Statistiche
                                    </a>
                                    <a class="nav-link " href="#" >
                                        Invio Mail
                                    </a>
                                    <a class="nav-link " href="#" >
                                        Invio SMS
                                    </a>
                                </nav>
                            </div>
                            
                            <a class="nav-link" href="#">Profilo</a>
                                    <a class="nav-link" href="?page=logout.php">Logout</a>
                        </div>
                    </div>
                    <!--admin loggato:-->
                    <div class="sb-sidenav-footer">
                        <div class="small">hai effettuato l'accesso con:</div>
                        <?php echo $_SESSION['username']; ?>
                    </div>
                </nav>
            </div>
           
                
