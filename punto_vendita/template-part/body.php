 <!--content main pagina admin-->
 <div id="layoutSidenav_content">
                <main>
                    <?php
                        if(isset($_GET['page'])){
                            switch($_GET['page']){
                                case 'logout.php':
                                        include 'punto_vendita/auth/logout.php';
                                    break;
                                    default:
                                        include 'punto_vendita/page/'.$_GET['page'];
                                    break;
                            }
                        }else{
                            include 'punto_vendita/page/home.php';
                        }
                    ?>
                </main>

                <!-- finecontent main pagina admin-->