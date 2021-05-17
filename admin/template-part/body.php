 <!--content main pagina admin-->
 <div id="layoutSidenav_content">
                <main>
                    <?php
                        if(isset($_GET['page'])){
                            switch($_GET['page']){
                                case 'logout.php':
                                        include 'admin/auth/logout.php';
                                    break;
                                    default:
                                        include 'admin/page/'.$_GET['page'];
                                    break;
                            }
                        }else{
                            include 'admin/page/home.php';
                        }
                    ?>
                </main>

                <!-- finecontent main pagina admin-->