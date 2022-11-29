<?php

use Admin\Models;

$objEmpresa = new Models\EmpresaModel;
$objCategorias = new Models\CategoriasModel3;
$objPublicacion = new Models\PublicacionModel3;
$dataEmpresa = $objEmpresa->listEmpresa()[1];
$dataCategorias = $objCategorias->listCategoriasInWeb();
$listPublicaciones = $objPublicacion->listPublicacionesInWeb(0, 5,15);

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

        #cuerpo-publicacion span {
            font-size: 14px;
            line-height: 0px;
        }

        .btn-primary {
            background-color: var(--color1) !important;
            border-color: var(--color1) !important;
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

    <section class="container-fluid  animate__animated animate__zoomIn" id="publications">

        <div class="row justify-content-around">
            <div class="col-md-7">
                <center><img src="<?= $dataPub['portada'] ?>" alt="" class="img-fluid" height="500" width="700"></center>
                <br>
                <div>
                    <?= $dataPub['cuerpo'] ?>

                </div>
            </div>
            <div class="col-md-3">

                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ftupperwareperuoficial&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=543564153315944" width="100%" height="450" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>
        </div>

    </section>
    <br>
    <br>
    <div class="d-flex justify-content-center"><a href="/ofertas"><button class="btn btn-primary float-right"><i class="fas fa-chevron-double-left"></i>&nbsp;&nbsp;Regresar</button></a></div>

    <section id="otros">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="fw-bold mb-2 mt-4 text-start">CONOCE MÁS OFERTAS</h2>
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
                                <a href="/pub2/<?= $pub['tagname'] ?>">
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


</body>
<?php include_once PATH_ROOT . '/views/web/partials/footer.php'; ?>

</html>

<script>
    let mini1 = document.getElementById("minigaleria1");
    let mini2 = document.getElementById("minigaleria2");
    let mini3 = document.getElementById("minigaleria3");
    let mini4 = document.getElementById("minigaleria4");

    mini1.onclick = function() {
        document.getElementById("slider1").classList.add("active");
        document.getElementById("slider2").classList.remove("active");
        document.getElementById("slider3").classList.remove("active");
        document.getElementById("slider4").classList.remove("active");
    }
    mini2.onclick = function() {
        document.getElementById("slider2").classList.add("active");
        document.getElementById("slider1").classList.remove("active");
        document.getElementById("slider3").classList.remove("active");
        document.getElementById("slider4").classList.remove("active");
    }
    mini3.onclick = function() {
        document.getElementById("slider3").classList.add("active");
        document.getElementById("slider1").classList.remove("active");
        document.getElementById("slider2").classList.remove("active");
        document.getElementById("slider4").classList.remove("active");
    }
    mini4.onclick = function() {
        document.getElementById("slider4").classList.add("active");
        document.getElementById("slider1").classList.remove("active");
        document.getElementById("slider2").classList.remove("active");
        document.getElementById("slider3").classList.remove("active");
    }
</script>