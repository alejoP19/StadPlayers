<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion " id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="menu_Principal">
                <a class="navbar-brand ps-2" href="<?= BASE_URL ?>/Views/main/MenuPrincipal.php">Menu
                    Principal
                </a>
                <i class="fa-solid fa-futbol fa-spin"></i>
            </div>
            <div class="nav">
                <div class="nav">
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#jugadores"
                        aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon">
                            <i class="fa-solid fa-users-rectangle fa-beat-fade"
                                style="color:#00FFDA; font-size: 18px"></i>
                        </div>
                        <h3>Jugadores</h3>
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>

                    <div class="collapse" id="jugadores" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= BASE_URL ?>/Views/jugadores/index.php">
                                <i class="fa-solid fa-address-book fa-bounce" style="
                                         color: rgb(255, 244, 31);
                                         font-size: 14px;
                                         padding: 5%;">
                                </i>
                                <h3>Crear Jugadores</h3>
                            </a>

                            <a class="nav-link" href="<?= BASE_URL ?>/Views/jugadores/VerJugadores.php">
                                <i class="fa-solid fa-eye fa-beat-fade" style="
                                             color: rgb(255, 72, 31);
                                             font-size: 14px;
                                             padding: 5%;
                                           ">
                                </i>
                                <h3>Ver Jugadores</h3>
                            </a>
                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#estadisticas"
                        aria-expanded="false" aria-controls="estadisticas">

                        <div class="sb-nav-link-icon">
                            <i class="fa-solid fa-address-card fa-beat-fade" style="
                                         color:FF7D7D;
                                         font-size: 18px;
                                         padding: 5%;
                                       ">
                            </i>
                        </div>
                        <h3>Estadísticas</h3>
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"> </i>
                        </div>
                    </a>

                    <div class="collapse" id="estadisticas" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">

                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                            <div class="sb-sidenav-collapse-arrow">
                                <a class="nav-link" href="<?= BASE_URL ?>/Views/Estadisticas/index.php">
                                    <i class="fa-solid fa-file-pen fa-bounce" style="
                                           color: rgb(255, 244, 31);
                                           font-size: 14px;
                                           padding: 5%;
                                           ">
                                    </i>
                                    <h3>Ingresar Estadísticas</h3>
                                </a>
                            </div>


                            <div class="sb-sidenav-collapse-arrow">
                                <a class="nav-link" href="<?= BASE_URL ?>/Views/Estadisticas/VerEstadisticas.php">
                                    <i class="fa-solid fa-eye fa-beat-fade" style="
                                             color: rgb(255, 72, 31);
                                             font-size: 14px;
                                             padding: 5%;
                                           ">
                                    </i>
                                    <h3>Ver Estadísticas</h3>
                                </a>
                            </div>
                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#reportes"
                        aria-expanded="false" aria-controls="reportes">

                        <div class="sb-nav-link-icon">
                            <i class="fa-solid fa-file-prescription fa-beat" style="
                                       color:#7E7DFF;
                                       font-size: 18px;
                                       padding: 5%;
                                     ">
                            </i>
                        </div>
                        <h3>Reportes</h3>

                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>

                    <div class="collapse" id="reportes" aria-labelledby="reportes" data-bs-parent="#sidenavAccordion">

                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <div class="sb-sidenav-collapse-arrow">
                                <a class="nav-link" href="<?= BASE_URL ?>/Views/Reportes/crear.php">
                                    <i class="fa-solid fa-file-signature fa-shake" style="
                                         color: rgb(255, 244, 31);
                                         font-size: 14px;
                                         padding: 5%;
                                       ">
                                    </i>
                                    <h3>Generar Reporte</h3>
                                </a>
                            </div>

                            <div class="sb-sidenav-collapse-arrow">
                                <a class="nav-link" href="<?= BASE_URL ?>/Views/Reportes/index.php">
                                    <i class="fa-solid fa-file-export fa-beat-fade" style="
                                         color: rgb(255, 72, 31);
                                         font-size: 14px;
                                         padding: 5%;
                                       ">
                                    </i>
                                    <h3>Ver Reportes</h3>
                                </a>
                            </div>
                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="<?= BASE_URL ?>/Views/Estadisticas/VerEstadisticas.php"
                        data-bs-toggle="collapse" data-bs-target="#config" aria-expanded="false" aria-controls="config">

                        <div class="sb-nav-link-icon">
                            <i class="fa-solid fa-rectangle-list fa-flip" style="
                                     color: FF0073;
                                     font-size: 18px;
                                     padding: 5%;
                                   ">
                            </i>
                        </div>
                        <h3>Opciones</h3>

                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>

                    <div class="collapse" id="config" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">

                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= BASE_URL ?>/Views/Configuraciones/index.php">
                                <i class="fa-solid fa-gears fa-spin-pulse" style="color: rgb(251, 255, 4);
                                     font-size: 14px;  
                                     padding: 5%;">
                                </i>
                                <h3>Configuraciones</h3>
                            </a>


                            <!-- <a class="nav-link" href="">
                                <i class="fa-solid fa-book fa-beat-fade" style="
                                         color:#37FF01;
                                         font-size: 14px;
                                         padding: 5%;
                                       ">
                                </i>
                                <h3>Manual</h3>
                            </a> -->

                            <a class="nav-link" href="<?= BASE_URL ?>/Views/Sugerencias/index.php">
                                <i class="fa-solid fa-envelope fa-bounce" style="color:#33A3FF;
                                     font-size: 18px;  
                                     padding: 5%;">
                                </i>
                                <h3>Sugerencias</h3>
                            </a>
                        </nav>
                    </div>
                </div>

            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Desarrollado Por:</div>
                ADSI-2277356 <br>
                SENA - 2023
            </div>
    </nav>
</div>
<div id="layoutSidenav_content">