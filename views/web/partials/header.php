<?php
$pagina = basename($_SERVER['PHP_SELF']);
$active1 = 'nav-link';
$active2 = 'nav-link';
$active3 = 'nav-link';
$active4 = 'nav-link';
$active5 = 'nav-link';
$active6 = 'nav-link';
switch ($pagina) {
    case 'index.php':
        $active1 .= ' activador';
        break;
    case 'somos.php':
    case 'historia.php':
    case 'reglamento.php':
        $active2 .= ' activador';
        break;

    case 'inicial.php':
    case 'primaria.php':
    case 'secundaria.php':
    case 'tutoria.php':
    case 'pastoral.php':
    case 'piscopedagogia.php':
        $active3 .= ' activador';
        break;

    case 'galerias.php':

        $active4 .= ' activador';
        break;
    case 'noticias.php':

        $active5 .= ' activador';
        break;
    case 'admision.php':


        $active6 .= ' activador';
        break;
}
?>
<style>
    header .navbar-nav .nav-item .activador {
        color: var(--color1);
        font-weight: bold;

    }

    #subniveles {
        margin-left: .4rem;
    }

    .dropend .dropdown-toggle::after {
        display: none;
    }

    .dropdown-menu li {

        position: relative;
    }

    .dropdown-menu .submenu {
        display: none;
        position: absolute;
        left: 100%;
        top: -7px;
    }

    .dropdown-menu .submenu-left {
        right: 100%;
        left: auto;
    }

    .dropdown-menu>li:hover {
        background-color: #f1f1f1
    }

    .dropdown-menu>li:hover>.submenu {
        display: block;
    }
</style>

<div id="header-top"></div>
<header class="fixed-top" id="header">
    <div class="bar-sup">

        <div class="ms-auto">
            <a href="#" class="me-3" target="_blank"><i class="fab fa-facebook"></i><span> Facebook</span></a>
            <a href="#" class="me-3" target="_blank"><i class="fab fa-youtube "></i><span> Youtube</span></a>
            <!-- <a href="#" target="_blank" class="me-3"><i class="fas fa-globe-americas"></i><span> Intranet</span></a> -->

        </div>

    </div>
    <div id="menu1">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand animate__animated animate__zoomIn" href="./">

                <div class="d-flex flex-row align-items-center">

                    <img id="logoresponsive" src="<?= PATH_PUBLIC ?>/img/icons/logo.png" alt="">

                </div>

            </a>
            <button class="navbar-toggler d-lg-none" type="button" style="background-color:var(--color1);" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="background-color:var(--color1);"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <li class="nav-item my-auto">
                        <a class="nav-link fw-bold <?= $active1 ?>" href="/">Inicio</a>
                    </li>
                    <li class="nav-item dropdown my-auto">
                        <a class="nav-link fw-bold <?= $active2 ?>" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="me-2">CÁTALAGOS</span><i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="somos.php">CATÁLOGO</a>
                            <a class="dropdown-item" href="historia.php">REVISTA IMÁN</a>
                            <a class="dropdown-item" href="reglamento.php">OFERTAS</a>
                            <a class="dropdown-item" href="reglamento.php">INFÓRMATEEEE</a>

                        </div>
                    </li>
                    <li class="nav-item dropdown my-auto" id="myDropdown">
                        <a class="nav-link  fw-bold" href="#" data-bs-toggle="dropdown"> <span class="me-2">PRODUCTOS</span><i class="fas fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li> <a class="dropdown-item" href="#"> LÍNEA DE PRODUCTOS &raquo; </a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href="/alacena">Alacena</a></li>
                                    <li><a class="dropdown-item" href="#">Freezer</a></li>
                                    <li><a class="dropdown-item" href="#">Heladera</a></li>
                                    <li><a class="dropdown-item" href="#">Líquido</a></li>
                                    <li><a class="dropdown-item" href="#">Lunch</a></li>
                                    <li><a class="dropdown-item" href="#">Microondas</a></li>
                                    <!-- <li><a class="dropdown-item" href="#">Niños</a></li>
                                    <li><a class="dropdown-item" href="#">Organizar</a></li> -->
                                    <li><a class="dropdown-item" href="#">Preparación</a></li>
                                    <!-- <li><a class="dropdown-item" href="#">Servir</a></li> -->
                                </ul>
                            </li>
                            <li> <a class="dropdown-item" href="#"> ESTILO &raquo; </a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Línea Chef</a></li>
                                    <li><a class="dropdown-item" href="#">Moldes</a></li>
                                    <li><a class="dropdown-item" href="#">Ollas Chef</a></li>
                                    <li><a class="dropdown-item" href="#">Termos</a></li>
                                    <li><a class="dropdown-item" href="#">Utensilios</a></li>
                                    <li><a class="dropdown-item" href="#">Recetas TW</a></li>
                                    <li><a class="dropdown-item" href="#">Tupperware y Tú</a></li>
                                    <li><a class="dropdown-item" href="#">Carácteristicas Especiales</a></li>
                                    <li><a class="dropdown-item" href="#">Otros</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown my-auto">
                        <a class="nav-link fw-bold <?= $active2 ?>" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="me-2">NOSOTROS</span><i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">Tupperware</a>
                            <a class="dropdown-item" href="#">Siempre Juntos Perú</a>
                            <a class="dropdown-item" href="#">Nosotros</a>
                            <a class="dropdown-item" href="#">Camino hacia el futuro</a>

                        </div>
                    </li>
                    <li>
                        <img id="logo" src="<?= PATH_PUBLIC ?>/img/icons/logo.png" alt="">
                    </li>
                    <li class="nav-item dropdown my-auto">
                        <a class="nav-link fw-bold <?= $active2 ?>" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="me-2">PLAN DE CARRERA</span><i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">Plan de Carrera</a>
                            <a class="dropdown-item" href="#">Formulario de Inscripción</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown my-auto">
                        <a class="nav-link fw-bold <?= $active2 ?>" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="me-2">EXPERIENCIA</span><i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">Tipos de Demostración</a>
                            <a class="dropdown-item" href="#">Tips</a>
                            <a class="dropdown-item" href="#">Programar Demostración</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown my-auto">
                        <a class="nav-link fw-bold <?= $active2 ?>" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="me-2">ÚNETE</span><i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">ÚNETE</a>

                        </div>
                    </li>
                    <li class="nav-item dropdown my-auto">
                        <a class="nav-link fw-bold <?= $active2 ?>" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="me-2">PEDIDOS</span><i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">APP</a>

                        </div>
                    </li>

                </ul>
            </div>
            </li>
            </ul>
    </div>
    </nav>
    </div>


</header>

<script>
    var height = document.getElementById('header').clientHeight;
    document.getElementById('header-top').style.height = height + "px";
</script>

<script type="text/javascript">
    //	window.addEventListener("resize", function() {
    //		"use strict"; window.location.reload(); 
    //	});


    document.addEventListener("DOMContentLoaded", function() {


        /////// Prevent closing from click inside dropdown
        document.querySelectorAll('.dropdown-menu').forEach(function(element) {
            element.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        })



        // make it as accordion for smaller screens
        if (window.innerWidth < 992) {

            // close all inner dropdowns when parent is closed
            document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown) {
                everydropdown.addEventListener('hidden.bs.dropdown', function() {
                    // after dropdown is hidden, then find all submenus
                    this.querySelectorAll('.submenu').forEach(function(everysubmenu) {
                        // hide every submenu as well
                        everysubmenu.style.display = 'none';
                    });
                })
            });

            document.querySelectorAll('.dropdown-menu a').forEach(function(element) {
                element.addEventListener('click', function(e) {

                    let nextEl = this.nextElementSibling;
                    if (nextEl && nextEl.classList.contains('submenu')) {
                        // prevent opening link if link needs to open dropdown
                        e.preventDefault();
                        console.log(nextEl);
                        if (nextEl.style.display == 'block') {
                            nextEl.style.display = 'none';
                        } else {
                            nextEl.style.display = 'block';
                        }

                    }
                });
            })
        }
        // end if innerWidth

    });
    // DOMContentLoaded  end
</script>