<?php

use Admin\Models;

$objEmpresa = new Models\EmpresaModel();
$objGalerias = new Models\GaleriasModel();
$dataEmpresa = $objEmpresa->listEmpresa()[1];
if (isset($URI[1]) && is_numeric($URI[1])) {
    $idGaleria = $URI[1];
    $dataGaleria = $objGalerias->buscarGaleria($idGaleria);
    $dataGaleria['cuerpo'] = json_decode($dataGaleria['cuerpo'], true);
} else {
    header('Location: /galeria-lista');
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
    <link rel="stylesheet" href="<?= PATH_PUBLIC ?>/css/venobox.css">
    <link rel="stylesheet" href="<?= PATH_PUBLIC ?>/css/web.css">
</head>

<body>

    <!-- archivos JS or CDN -->
    <script src="<?= PATH_PUBLIC ?>/js/bootstrap.min.js"></script>
    <script src="<?= PATH_PUBLIC ?>/js/venobox.js"></script>

    <!-- partial header  -->
    <?php include_once PATH_ROOT . '/views/web/partials/header.php'; ?>

    <style>
        .portada {
            background-color: var(--color3);
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

        #content-grid {
            columns: <?= $dataGaleria['ncolum'] ?>;
            column-gap: 6px;
        }

        #content-grid>a.img-links {
            -webkit-column-break-inside: avoid;
            page-break-inside: avoid;
            break-inside: avoid;
            margin-bottom: 6px;
            overflow: hidden;
        }

        #content-grid img {
            height: <?= $dataGaleria['modo'] == 'A' ? 'auto' : '240px' ?>;
            object-fit: cover;
        }
    </style>

    <div class="container-fluid portada">
        <div class="container py-4 animate__animated animate__slideInLeft">
            <ol class="breadcrumb pb-0 mb-0">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/galeria-lista">Galerias</a></li>
                <li class="breadcrumb-item"><a href=""><?= $dataGaleria['titulo'] ?></a></li>
            </ol>
            <div class="mt-4">
                <h2 class="text-white"><?= $dataGaleria['titulo'] ?></h2>
            </div>
        </div>
    </div>

    <br><br><br>

    <section class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-9">
                <div id="content-grid">
                    <?php
                    foreach ($dataGaleria['cuerpo'] as $val) : ?>
                        <?php
                        if ($val['tipo'] == 'I') { ?>
                            <a class="img-links" data-gall="gallery01" title="<?= $dataGaleria['titulo'] ?>" href="<?= $val['content'] ?>">
                                <img src="<?= $val['portada'] ?>" class="mb-2" width="100%">
                            </a>
                        <?php } else if ($val['tipo'] == 'V') { ?>
                            <a class="img-links" data-gall="gallery01" data-autoplay="true" data-vbtype="video" data-maxwidth="900px" href="<?= $val['content'] ?>">
                                <img src="<?= $val['portada'] ?>" class="mb-2" width="100%">
                            </a>
                        <?php } ?>
                    <?php endforeach;  ?>
                </div>
            </div>
        </div>
    </section>

    <br><br><br>


    <script>
        new VenoBox({
            selector: '.img-links',
            numeration: true,
            infinigall: true,
            navSpeed: 300,
        });
    </script>

</body>

</html>