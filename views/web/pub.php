<?php

use Admin\Models;

$objEmpresa = new Models\EmpresaModel;
$objCategorias = new Models\CategoriasModel;
$objPublicacion = new Models\PublicacionModel;
$dataEmpresa = $objEmpresa->listEmpresa()[1];
$dataCategorias = $objCategorias->listCategoriasInWeb();
$listPublicaciones = $objPublicacion->listPublicacionesInWeb(0, 5);

if (isset($URI[1])) {
    if ($URI[1] == 'preview') {
        $idcateg = $_POST['idcatg'];
        $dataPub = $_POST;
        $dataPub['categoria'] = $dataCategorias[$idcateg]['nombre'];
    } else {
        $tagname = $URI[1];
        $dataPub = $objPublicacion->buscarPublicacionxTag($tagname);
        $idcateg = $dataPub['idcatg'];
        $dataPub['categoria'] = $dataCategorias[$idcateg]['nombre'];
    }
} else {
    header('Location: /404');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $dataEmpresa['metades'] ?>">
    <title><?= $dataEmpresa['nombre'] ?></title>
    <link rel="shortcut icon" href="<?= PATH_PUBLIC ?>/img/icons/icon.png" type="image/png">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="<?= PATH_PUBLIC ?>/css/animate.min.css">
    <link rel="stylesheet" href="<?= PATH_PUBLIC ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= PATH_PUBLIC ?>/css/web.css">
</head>

<body>

    <script src="<?= PATH_PUBLIC ?>/js/bootstrap.min.js"></script>

    <?php include_once PATH_ROOT . '/views/web/partials/header.php'; ?>

    <style>
        .portada {
            background-color: var(--color2);
        }

        .portada h2 {
            letter-spacing: 0.1em;
            word-spacing: 0.1em;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            color: white;
        }

        .breadcrumb-item>a {
            color: white;
            font-size: 14.5px;
        }

        #publications .card h3.titulo {
            color: var(--color2);
            font-weight: bold;
            text-align: left;
        }

        #publications .card-header {
            background: transparent;
            border: none;
            padding: 0px
        }

        #publications .card-body {
            line-height: 2;
        }

        #publications p.date {
            color: var(--color2);
            font-size: 17px;
            margin-bottom: 8px;
        }

        #sidebar {
            position: sticky;
            top: 12%;
            border: none;
            width: 83%;
            margin-left: auto;
            margin-right: auto;
            background-color: #F9F9F9;
            padding: 1em;
            box-shadow: 0 0 12px rgba(78, 64, 57, .2);
        }

        #sidebar h5 {
            font-size: 16.5px;
            color: #505050;

        }

        #sidebar .pub-titulo {
            color: var(--color2);
            font-weight: 500;
        }

        #sidebar .list-group-item a {
            max-height: 50px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .crop1 {
            width: 120px;
            height: 120px;
            object-fit: cover;

        }
        .crop2 {
            width: 600px;
            height: 600px;
            object-fit: cover;

        }
        .crop3 {
            width: 240px;
            height: 240px;
            object-fit: cover;

        }

        /* Estilos de efecto hover en productos */
        .div1 {
            position: relative;
        }

        .div1 .div2 {
            position: absolute;
            right: 0;
            top: 0;
            left: 0;
            opacity: 0;
            transition: .5s;
        }

        .div1:hover .div2 {
            opacity: 1;
        }

        .sombra {
            opacity: .5;

        }

        #minigaleria img:hover {
            opacity: .5;
        }
        #cuerpo-publicacion span{
            font-size: 14px;
            line-height: 0px;
        }
    </style>

    <div class="container-fluid portada">
        <div class="container py-3 animate__animated animate__slideInLeft">
            <!--     <ol class="breadcrumb pb-0 mb-0">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/">Publicaciones</a></li>
                <li class="breadcrumb-item"><a href=""><//?= $dataPub['categoria'] ?></a></li>
            </ol> -->
            <div class="mt-3 py-5">
                <h2 class="text-white"><?= $dataPub['titulo'] ?></h2>
            </div>
        </div>
    </div>

    <br><br><br>

    <section class="container  animate__animated animate__zoomIn" id="publications">
        <div class="row justify-content-between">
            <div class="col-md-6 my-2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <?php
                                    if (!empty($dataPub['portada'])) { ?>
                                        <div id="slider1" class="carousel-item active" data-bs-interval="10000">

                                            <img src="<?= $dataPub['portada'] ?>" class="d-block crop2">

                                            <!--   <img src="..." class="d-block w-100" alt="..."> -->
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if (!empty($dataPub['img1'])) { ?>
                                        <div id="slider2" class="carousel-item" data-bs-interval="2000">

                                            <img src="<?= $dataPub['img1'] ?>" class="d-block crop2">

                                        </div>
                                    <?php } ?>
                                    <?php
                                    if (!empty($dataPub['img2'])) { ?>
                                        <div id="slider3" class="carousel-item" data-bs-interval="2000">

                                            <img src="<?= $dataPub['img2'] ?>" class="d-block crop2">

                                        </div>
                                    <?php } ?>
                                    <?php
                                    if (!empty($dataPub['img3'])) { ?>
                                        <div id="slider4" class="carousel-item" data-bs-interval="2000">
                                            <img src="<?= $dataPub['img3'] ?>" class="d-block crop2">
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if (!empty($dataPub['img4'])) { ?>
                                        <div id="slider5" class="carousel-item" data-bs-interval="2000">
                                            <img src="<?= $dataPub['img4'] ?>" class="d-block crop2">
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if (!empty($dataPub['img5'])) { ?>
                                        <div id="slider6" class="carousel-item" data-bs-interval="2000">
                                            <img src="<?= $dataPub['img5'] ?>" class="d-block crop2">
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if (!empty($dataPub['img6'])) { ?>
                                        <div id="slider7" class="carousel-item" data-bs-interval="2000">
                                            <img src="<?= $dataPub['img6'] ?>" class="d-block crop2">
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if (!empty($dataPub['img7'])) { ?>
                                        <div id="slider8" class="carousel-item" data-bs-interval="2000">
                                            <img src="<?= $dataPub['img7'] ?>" class="d-block crop2">
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if (!empty($dataPub['img8'])) { ?>
                                        <div id="slider9" class="carousel-item" data-bs-interval="2000">
                                            <img src="<?= $dataPub['img8'] ?>" class="d-block crop2">
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if (!empty($dataPub['img9'])) { ?>
                                        <div id="slider10" class="carousel-item" data-bs-interval="2000">
                                            <img src="<?= $dataPub['img9'] ?>" class="d-block crop2">
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if (!empty($dataPub['img10'])) { ?>
                                        <div id="slider11" class="carousel-item" data-bs-interval="2000">
                                            <img src="<?= $dataPub['img10'] ?>" class="d-block crop2">
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if (!empty($dataPub['img11'])) { ?>
                                        <div id="slider12" class="carousel-item" data-bs-interval="2000">
                                            <img src="<?= $dataPub['img11'] ?>" class="d-block crop2">
                                        </div>
                                    <?php } ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <!-- <//?php
                            if (!empty($dataPub['portada'])) { ?>
                                <img src="<//?= $dataPub['portada'] ?>" width="100%">
                            <//?php } ?> -->
                        </div>
                    </div>
                    <div id="minigaleria" class="row d-flex justify-content-around pt-5">
                        <?php
                        if (!empty($dataPub['portada'])) { ?>
                            <div id="divsombra1" class="col-lg-3 px-2">

                                <img id="minigaleria1" src="<?= $dataPub['portada'] ?>" class="crop1">

                            </div>
                        <?php } ?>
                        <?php
                        if (!empty($dataPub['img1'])) { ?>
                            <div id="divsombra2" class="col-lg-3 px-2">

                                <img id="minigaleria2" src="<?= $dataPub['img1'] ?>" class="crop1">

                            </div>
                        <?php } ?>
                        <?php
                        if (!empty($dataPub['img2'])) { ?>
                            <div id="divsombra3" class="col-lg-3 px-2">

                                <img id="minigaleria3" src="<?= $dataPub['img2'] ?>" class="crop1">

                            </div>
                        <?php } ?>
                        <?php
                        if (!empty($dataPub['img3'])) { ?>
                            <div div="divsombra4" class="col-lg-3 px-2">

                                <img id="minigaleria4" src="<?= $dataPub['img3'] ?>" class="crop1">

                            </div>
                        <?php } ?>
                        <?php
                        if (!empty($dataPub['img4'])) { ?>
                            <div div="divsombra5" class="col-lg-3 px-2">

                                <img id="minigaleria5" src="<?= $dataPub['img4'] ?>" class="crop1">

                            </div>
                        <?php } ?>
                        <?php
                        if (!empty($dataPub['img5'])) { ?>
                            <div div="divsombra6" class="col-lg-3 px-2">

                                <img id="minigaleria6" src="<?= $dataPub['img5'] ?>" class="crop1">

                            </div>
                        <?php } ?>
                        <?php
                        if (!empty($dataPub['img6'])) { ?>
                            <div div="divsombra7" class="col-lg-3 px-2">

                                <img id="minigaleria7" src="<?= $dataPub['img6'] ?>" class="crop1">

                            </div>
                        <?php } ?>
                        <?php
                        if (!empty($dataPub['img7'])) { ?>
                            <div div="divsombra8" class="col-lg-3 px-2">

                                <img id="minigaleria8" src="<?= $dataPub['img7'] ?>" class="crop1">

                            </div>
                        <?php } ?>
                        <?php
                        if (!empty($dataPub['img8'])) { ?>
                            <div div="divsombra9" class="col-lg-3 px-2">

                                <img id="minigaleria9" src="<?= $dataPub['img8'] ?>" class="crop1">

                            </div>
                        <?php } ?>
                        <?php
                        if (!empty($dataPub['img9'])) { ?>
                            <div div="divsombra10" class="col-lg-3 px-2">

                                <img id="minigaleria10" src="<?= $dataPub['img9'] ?>" class="crop1">

                            </div>
                        <?php } ?>
                        <?php
                        if (!empty($dataPub['img10'])) { ?>
                            <div div="divsombra11" class="col-lg-3 px-2">

                                <img id="minigaleria11" src="<?= $dataPub['img10'] ?>" class="crop1">

                            </div>
                        <?php } ?>
                        <?php
                        if (!empty($dataPub['img11'])) { ?>
                            <div div="divsombra12" class="col-lg-3 px-2">

                                <img id="minigaleria12" src="<?= $dataPub['img11'] ?>" class="crop1">

                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
            <div class="col-md-6 my-2">
            

                <div class="card border-0">
                    <div class="card-header">
                        <div class="px-2">
                            <h3 class="titulo "><?= $dataPub['titulo'] ?></h3>
                            <!--  <p class="date">
                                <i class="far fa-calendar"></i>&nbsp; <//?= date('M d, Y', strtotime($dataPub['fecpub'])) ?>
                                <i class="far fa-clock ms-3"></i> <//?= date('h:i', strtotime($dataPub['fecpub'])) ?>
                            </p> -->
                        </div>
                    </div>
                    <div id="cuerpo-publicacion" class="card-body p-1">
                        <?= $dataPub['cuerpo'] ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>

    <section id="otros">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="fw-bold mb-2 mt-4 text-start">CONOCE M??S PRODUCTOS</h2>
                    <br>
                    <br>
                    <div class="row">
                        <?php
                        foreach ($listPublicaciones as $pub) :
                            if ($pub['idpub'] == $dataPub['idpub']) {
                                continue;
                            }
                        ?>
                            <div class="col-lg-3 ">
                                <a href="/pub/<?= $pub['tagname'] ?>">
                                    <div class="div1 ">
                                        <div class="images d-flex justify-content-center">
                                            <img class="crop3" src="<?= $pub['portada'] ?>">
                                        </div>
                                        <?php
                                            if(!empty($pub['img1'])){?>
                                        <center>
                                            <div class="div2">
                                                <img class="crop3" src="<?= $pub['img1'] ?>">
                                            </div>
                                        </center>
                                        <?php } ?>
                                    </div>
                                </a>

                                <h4 class="py-2"><?= $pub['titulo'] ?></h4>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br><br><br>

    <?php include_once PATH_ROOT . '/views/web/partials/footer.php'; ?>
</body>

</html>

<script>
    let mini1 = document.getElementById("minigaleria1");
    let mini2 = document.getElementById("minigaleria2");
    let mini3 = document.getElementById("minigaleria3");
    let mini4 = document.getElementById("minigaleria4");
    let mini5 = document.getElementById("minigaleria5");
    let mini6 = document.getElementById("minigaleria6");
    let mini7 = document.getElementById("minigaleria7");
    let mini8 = document.getElementById("minigaleria8");
    let mini9 = document.getElementById("minigaleria9");
    let mini10 = document.getElementById("minigaleria10");
    let mini11 = document.getElementById("minigaleria11");
    let mini12 = document.getElementById("minigaleria12");

    mini1.onclick = function() {
        document.getElementById("slider1").classList.add("active");
        document.getElementById("slider2").classList.remove("active");
        document.getElementById("slider3").classList.remove("active");
        document.getElementById("slider4").classList.remove("active");
        document.getElementById("slider5").classList.remove("active");
        document.getElementById("slider6").classList.remove("active");
        document.getElementById("slider7").classList.remove("active");
        document.getElementById("slider8").classList.remove("active");
        document.getElementById("slider9").classList.remove("active");
        document.getElementById("slider10").classList.remove("active");
        document.getElementById("slider11").classList.remove("active");
        document.getElementById("slider12").classList.remove("active");
    }
    mini2.onclick = function() {
        document.getElementById("slider2").classList.add("active");
        document.getElementById("slider1").classList.remove("active");
        document.getElementById("slider3").classList.remove("active");
        document.getElementById("slider4").classList.remove("active");
        document.getElementById("slider5").classList.remove("active");
        document.getElementById("slider6").classList.remove("active");
        document.getElementById("slider7").classList.remove("active");
        document.getElementById("slider8").classList.remove("active");
        document.getElementById("slider9").classList.remove("active");
        document.getElementById("slider10").classList.remove("active");
        document.getElementById("slider11").classList.remove("active");
        document.getElementById("slider12").classList.remove("active");
    }
    mini3.onclick = function() {
        document.getElementById("slider3").classList.add("active");
        document.getElementById("slider1").classList.remove("active");
        document.getElementById("slider2").classList.remove("active");
        document.getElementById("slider4").classList.remove("active");
        document.getElementById("slider5").classList.remove("active");
        document.getElementById("slider6").classList.remove("active");
        document.getElementById("slider7").classList.remove("active");
        document.getElementById("slider8").classList.remove("active");
        document.getElementById("slider9").classList.remove("active");
        document.getElementById("slider10").classList.remove("active");
        document.getElementById("slider11").classList.remove("active");
        document.getElementById("slider12").classList.remove("active");
        
    }
    mini4.onclick = function() {
        document.getElementById("slider4").classList.add("active");
        document.getElementById("slider1").classList.remove("active");
        document.getElementById("slider2").classList.remove("active");
        document.getElementById("slider3").classList.remove("active");
        document.getElementById("slider5").classList.remove("active");
        document.getElementById("slider6").classList.remove("active");
        document.getElementById("slider7").classList.remove("active");
        document.getElementById("slider8").classList.remove("active");
        document.getElementById("slider9").classList.remove("active");
        document.getElementById("slider10").classList.remove("active");
        document.getElementById("slider11").classList.remove("active");
        document.getElementById("slider12").classList.remove("active");
    }
    mini5.onclick = function() {
        document.getElementById("slider5").classList.add("active");
        document.getElementById("slider1").classList.remove("active");
        document.getElementById("slider2").classList.remove("active");
        document.getElementById("slider3").classList.remove("active");
        document.getElementById("slider4").classList.remove("active");
        document.getElementById("slider6").classList.remove("active");
        document.getElementById("slider7").classList.remove("active");
        document.getElementById("slider8").classList.remove("active");
        document.getElementById("slider9").classList.remove("active");
        document.getElementById("slider10").classList.remove("active");
        document.getElementById("slider11").classList.remove("active");
        document.getElementById("slider12").classList.remove("active");
    }
    mini6.onclick = function() {
        document.getElementById("slider6").classList.add("active");
        document.getElementById("slider1").classList.remove("active");
        document.getElementById("slider2").classList.remove("active");
        document.getElementById("slider3").classList.remove("active");
        document.getElementById("slider4").classList.remove("active");
        document.getElementById("slider5").classList.remove("active");
        document.getElementById("slider7").classList.remove("active");
        document.getElementById("slider8").classList.remove("active");
        document.getElementById("slider9").classList.remove("active");
        document.getElementById("slider10").classList.remove("active");
        document.getElementById("slider11").classList.remove("active");
        document.getElementById("slider12").classList.remove("active");
    }
    mini7.onclick = function() {
        document.getElementById("slider7").classList.add("active");
        document.getElementById("slider1").classList.remove("active");
        document.getElementById("slider2").classList.remove("active");
        document.getElementById("slider3").classList.remove("active");
        document.getElementById("slider4").classList.remove("active");
        document.getElementById("slider5").classList.remove("active");
        document.getElementById("slider6").classList.remove("active");
        document.getElementById("slider8").classList.remove("active");
        document.getElementById("slider9").classList.remove("active");
        document.getElementById("slider10").classList.remove("active");
        document.getElementById("slider11").classList.remove("active");
        document.getElementById("slider12").classList.remove("active");
    }
    mini8.onclick = function() {
        document.getElementById("slider8").classList.add("active");
        document.getElementById("slider1").classList.remove("active");
        document.getElementById("slider2").classList.remove("active");
        document.getElementById("slider3").classList.remove("active");
        document.getElementById("slider4").classList.remove("active");
        document.getElementById("slider5").classList.remove("active");
        document.getElementById("slider6").classList.remove("active");
        document.getElementById("slider7").classList.remove("active");
        document.getElementById("slider9").classList.remove("active");
        document.getElementById("slider10").classList.remove("active");
        document.getElementById("slider11").classList.remove("active");
        document.getElementById("slider12").classList.remove("active");
    }
    mini9.onclick = function() {
        document.getElementById("slider9").classList.add("active");
        document.getElementById("slider1").classList.remove("active");
        document.getElementById("slider2").classList.remove("active");
        document.getElementById("slider3").classList.remove("active");
        document.getElementById("slider4").classList.remove("active");
        document.getElementById("slider5").classList.remove("active");
        document.getElementById("slider6").classList.remove("active");
        document.getElementById("slider7").classList.remove("active");
        document.getElementById("slider8").classList.remove("active");
        document.getElementById("slider10").classList.remove("active");
        document.getElementById("slider11").classList.remove("active");
        document.getElementById("slider12").classList.remove("active");
    }
    mini10.onclick = function() {
        document.getElementById("slider10").classList.add("active");
        document.getElementById("slider1").classList.remove("active");
        document.getElementById("slider2").classList.remove("active");
        document.getElementById("slider3").classList.remove("active");
        document.getElementById("slider4").classList.remove("active");
        document.getElementById("slider5").classList.remove("active");
        document.getElementById("slider6").classList.remove("active");
        document.getElementById("slider7").classList.remove("active");
        document.getElementById("slider8").classList.remove("active");
        document.getElementById("slider9").classList.remove("active");
        document.getElementById("slider11").classList.remove("active");
        document.getElementById("slider12").classList.remove("active");
    }
    mini11.onclick = function() {
        document.getElementById("slider11").classList.add("active");
        document.getElementById("slider1").classList.remove("active");
        document.getElementById("slider2").classList.remove("active");
        document.getElementById("slider3").classList.remove("active");
        document.getElementById("slider4").classList.remove("active");
        document.getElementById("slider5").classList.remove("active");
        document.getElementById("slider6").classList.remove("active");
        document.getElementById("slider7").classList.remove("active");
        document.getElementById("slider8").classList.remove("active");
        document.getElementById("slider9").classList.remove("active");
        document.getElementById("slider10").classList.remove("active");
        document.getElementById("slider12").classList.remove("active");
    }
    mini12.onclick = function() {
        document.getElementById("slider12").classList.add("active");
        document.getElementById("slider1").classList.remove("active");
        document.getElementById("slider2").classList.remove("active");
        document.getElementById("slider3").classList.remove("active");
        document.getElementById("slider4").classList.remove("active");
        document.getElementById("slider5").classList.remove("active");
        document.getElementById("slider6").classList.remove("active");
        document.getElementById("slider7").classList.remove("active");
        document.getElementById("slider8").classList.remove("active");
        document.getElementById("slider9").classList.remove("active");
        document.getElementById("slider10").classList.remove("active");
        document.getElementById("slider11").classList.remove("active");
    }

</script>


