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
    <title><?= mb_strtoupper($dataEmpresa['nombre'], 'UTF-8') ?></title>
    <link rel="shortcut icon" href="<?= PATH_PUBLIC ?>/img/icons/escudo.png" type="image/png">
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

        #minigaleria img:hover {
            opacity: .5;


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
                                    <div class="carousel-item active" data-bs-interval="10000">
                                        <?php
                                        if (!empty($dataPub['portada'])) { ?>
                                            <img src="<?= $dataPub['portada'] ?>" class="d-block w-100">
                                        <?php } ?>
                                        <!--   <img src="..." class="d-block w-100" alt="..."> -->
                                    </div>
                                    <?php
                                    if (!empty($dataPub['img2'])) { ?>
                                        <div class="carousel-item" data-bs-interval="2000">

                                            <img src="<?= $dataPub['img2'] ?>" class="d-block w-100">

                                        </div>
                                    <?php } ?>
                                    <?php
                                    if (!empty($dataPub['img3'])) { ?>
                                        <div class="carousel-item" data-bs-interval="2000">

                                            <img src="<?= $dataPub['img3'] ?>" class="d-block w-100">

                                        </div>
                                    <?php } ?>
                                    <?php
                                    if (!empty($dataPub['img4'])) { ?>
                                        <div class="carousel-item" data-bs-interval="2000">
                                            <img src="<?= $dataPub['img4'] ?>" class="d-block w-100">
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
                    <div id="minigaleria" class="row d-flex-justify-content-around">
                        <div class="col-lg-3 px-2">
                            <?php
                            if (!empty($dataPub['img1'])) { ?>
                                <img src="<?= $dataPub['img1'] ?>" class="crop1">
                            <?php } ?>
                        </div>
                        <div class="col-lg-3 px-2">
                            <?php
                            if (!empty($dataPub['img2'])) { ?>
                                <img src="<?= $dataPub['img2'] ?>" class="crop1">
                            <?php } ?>
                        </div>
                        <div class="col-lg-3 px-2">
                            <?php
                            if (!empty($dataPub['img3'])) { ?>
                                <img src="<?= $dataPub['img3'] ?>" class="crop1">
                            <?php } ?>
                        </div>
                        <div class="col-lg-3 px-2">
                            <?php
                            if (!empty($dataPub['img4'])) { ?>
                                <img src="<?= $dataPub['img4'] ?>" class="crop1">
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6 my-2">
                <br>

                <div class="card border-0">
                    <div class="card-header">
                        <div class="px-2 pt-4">
                            <h3 class="titulo pt-2 pb-2"><?= $dataPub['titulo'] ?></h3>
                            <!--  <p class="date">
                                <i class="far fa-calendar"></i>&nbsp; <//?= date('M d, Y', strtotime($dataPub['fecpub'])) ?>
                                <i class="far fa-clock ms-3"></i> <//?= date('h:i', strtotime($dataPub['fecpub'])) ?>
                            </p> -->
                        </div>
                    </div>
                    <hr>
                    <div class="card-body p-1">
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
                    <h2 class="fw-bold mb-2 mt-4 text-start">PRODUCTOS RECIENTES</h2>
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
                                            <img class="crop1" src="<?= $pub['portada'] ?>">
                                        </div>
                                        <center>
                                            <div class="div2">
                                                <img class="crop1" src="<?= $pub['img1'] ?>">
                                            </div>
                                        </center>
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


</body>

</html>