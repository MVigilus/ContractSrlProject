<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Punti Vendita</title>
        <link href="punto_vendita/assets/css/style.css?ts=<?=time()?>&quot" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <?php 
            if(isset($_GET['page'])){
                switch($_GET['page']){
                    case 'inserisci_incassi.php':
                        echo '<link href="punto_vendita/assets/css/inserimento.css" rel="stylesheet" />';
                        break;
                }
            }
        ?>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="?page=home.php">
            <img src="admin/assets/img/idea.png" width="30" height="30" alt="">
            <?php echo $_SESSION['username']; ?>
            </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="?page=home.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                HomePage
                            </a>
                            <a class="nav-link" href="?page=inserisci_incassi.php">Inserisci incassi</a>
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
           
                
