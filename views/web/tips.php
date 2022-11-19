<?php

use Admin\Models;

$objEmpresa = new Models\EmpresaModel;
$objCategorias = new Models\CategoriasModel;
$objPublicaciones = new Models\PublicacionModel;
$dataEmpresa = $objEmpresa->listEmpresa()[1];
$dataCategorias = $objCategorias->listCategoriasInWeb();

$filter = isset($URI[1]) ? $URI[1] : 'all';
$pagina = isset($URI[2]) ? $URI[2] : '1';
$initPub = (PUB_MAX_WEB * $pagina) - PUB_MAX_WEB;

if ($filter !== 'all') {
    $dataCategoria = $objCategorias->buscarCategoria($URI[1], false);
    $idCateg = $dataCategoria['idcatg'];
    $nameCategoria = $dataCategoria['nombre'];
    $dataPublicaciones = $objPublicaciones->listPublicacionesInWeb($initPub, PUB_MAX_WEB, $idCateg);
} else {
    $idCateg = '5';
    $nameCategoria = '5';
    $dataPublicaciones = $objPublicaciones->listPublicacionesInWeb($initPub, PUB_MAX_WEB, $idCateg);
}

// total de publicaciones
$total = $objPublicaciones->totalPublicaciones($idCateg, true);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $dataEmpresa['metades'] ?>">
    <title><?= $dataEmpresa['nombre'] ?></title>
    <link rel="shortcut icon" href="<?= PATH_PUBLIC ?>/img/icons/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="<?= PATH_PUBLIC ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= PATH_PUBLIC ?>/css/web.css">
    <link rel="stylesheet" href="<?= PATH_PUBLIC ?>/css/niveles.css">
    <link rel="stylesheet" href="<?= PATH_PUBLIC ?>/css/networks.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

    <!-- CARROUSEL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- CARROUSEL -->


</head>

<body>





    <style>
        #redes {
            position: fixed;
            width: 45px;
            min-width: 45px;
            max-width: 45px;
            top: 50%;
            right: 0;
            transform: translateY(-75%);
            z-index: 99;
        }

        #redes a {
            font-size: 21px;
            color: white;
        }


        #valores .flip {
            height: 172px;
            padding: 0.6em;
        }

        #valores .card {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 1s;
            transform-style: preserve-3d;
        }

        #valores .flip:nth-child(1):hover .card {
            transform: rotateY(180deg);
        }

        #valores .front,
        #valores .back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            cursor: default;
        }

        #valores .front {
            color: #fff;
            border: 2px solid #ececec;
        }

        #valores .back {
            color: white;
            transform: rotateY(180deg);
            border: 2px solid #ececec;
            padding: 0.5em;
        }

        #niveles .card-body {
            overflow: hidden;
        }

        #niveles h3 {
            color: var(--color2);
            font-weight: bold;
        }

        #niveles h3:hover {
            color: var(--color4);

        }

        #niveles img {

            height: 100%;
        }

        #niveles .card-body:hover img {

            transform: scale(1.3);

        }

        #niveles .card-body img {
            transition: transform 1.5s ease;
        }



        #noticias div.crop {

            height: 200px;
            max-height: 200px;
            overflow: hidden;
        }

        #noticias div.card-body p {
            height: 70px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            transition: height 0.25s ease-out;
        }

        #noticias div.card-body:hover p {
            height: 140px;
            display: block;
            transition: height 0.25s ease-in;
        }

        #noticias .card {
            border-radius: 5px;
            background: linear-gradient(rgb(255, 255, 255), rgb(243, 243, 243));
            box-shadow: 0 0 5px var(--color4);
            transition: 1s;
        }

        #noticias .card img {
            object-fit: cover;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;

        }


        #vermas .card-footer2 {

            display: none;
            position: relative;
            margin-top: -39px;
            background-color: var(--color4);

        }

        #noticias .card:hover {
            transform: translateY(-20px);
        }

        #col-noticias:hover .card-footer2 {
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
            padding: .5rem;
            display: block;

        }

        #col-noticias:hover .card-footer {

            display: none;

        }



        .button1 {
            background-color: var(--color2);
            border: 1px solid #ffff;
            border-radius: 20px;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            transition: transform .3s ease-in-out;
        }





        .button1:hover {
            transform: scale(1.06);
            background-color: var(--color4);
        }

        span.circulo {
            border-radius: 50%;
            display: inline-block;
            font-size: 15px;
            min-width: 40px;
            height: 40px;
            margin-right: 8px;
            padding: 9px;
            text-align: center;
            width: 40px;
            font-weight: bold;
            background-color: var(--color2);
        }


        .map-responsive iframe {

            left: 0;

            top: 0;

            bottom: 0;

            height: 100%;

            width: 100%;

            position: absolute;

        }

        #b-imagen {
            padding-left: 15rem;
            margin-top: 0rem !important;
        }

        #separador h2 {
            font-weight: bold;
            color: var(--color4)
        }

        .hub-slider {
            position: relative
        }

        .hub-slider ul {
            list-style: none
        }

        .hub-slider ul li {
            width: 100%;
            height: 350px;
            background: var(--color4);
            line-height: 350px;
            text-align: center;
            position: absolute;
            border-radius: 3px;
            left: 0;
            top: 0;
            padding: 0px 3%
        }

        .hub-slider ul li>img.crop {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .crop1 {
            width: 100%;
            height: 300px;
            object-fit: cover;

        }



        #productos img {
            height: 400px;
            width: 400px;

        }

        .div1 {
            position: relative;
        }

        .div1 .div2 {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: .5s;
        }

        .div1:hover .div2 {
            opacity: 1;
        }

        #productos h4 {
            color: var(--color1);
            font-weight: 700;
        }

        .btn-primary {
            background-color: var(--color1) !important;
            border-color: var(--color1) !important;
        }

        #portada {
            background-color: black;
        }

        #portada h1 {
            padding-top: 5rem;
            padding-bottom: 5rem;
            color: white;
            font-weight: 700;
        }

        /* Estilos de boton */
        #tips1 button {
            --color: white;
            font-family: inherit;
            display: inline-block;
            width: 8em;
            height: 2.6em;
            line-height: 2.5em;
            margin: 20px;
            position: relative;
            overflow: hidden;
            border: 2px solid var(--color);
            transition: color .5s;
            z-index: 1;
            font-size: 17px;
            border-radius: 6px;
            font-weight: 500;
            color: white;
            background-color: #1eb5da;
        }

        #tips1 button:before {
            content: "";
            position: absolute;
            z-index: -1;
            background: black;
            height: 150px;
            width: 200px;
            border-radius: 50%;
        }

        #tips1 button:hover {
            color: white;
        }

        #tips1 button:before {
            top: 100%;
            left: 100%;
            transition: all .7s;
        }

        #tips1 button:hover:before {
            top: -30px;
            left: -30px;
        }

        #tips1 button:active:before {
            background: #3a0ca3;
            transition: background 0s;
        }

        #tips1 {
            background: linear-gradient(to top, rgba(53, 99, 128, 0.5) 100%, #ffff 10%, #ffff 50%), url('<?= PATH_PUBLIC ?>/img/img-page/tips-juegos.jpg');
            background-size: 100%;
            background-repeat: no-repeat;
        }

        #tips1 span {

            font-size: 49px;
            color: white;
            font-weight: 600;
        }

        #tips1 p {
            margin-top: 3rem;

            font-size: 18px;
            color: white;
            font-weight: 600;
        }

        #tips1 .container {
            padding-top: 5rem;
        }

        #separador {
            margin-top: -25px;
        }

        .separador2 {
            background-color: var(--color1);
            height: 4px;
            width: 50px;
        }

        #tips2 h2 {
            color: var(--color12);
            font-size: 2.5rem;
            font-weight: 600;
        }

        #tips2 p {
            padding-top: 2rem;
            text-align: center;
        }

        .list {
            margin-top: .8rem;
            margin-bottom: .8rem;
            font-size: 1.1rem;
        }

        #tips3 i {
            font-size: 3rem;
            ;
        }

        #tips3 span {
            font-size: 1.5rem;
            ;
        }

        #tips4 {
            background: linear-gradient(to top,
                    rgba(37, 50, 208, 0.4) 100%,
                    #ffff 10%,
                    #ffff 50%),
                url('<?= PATH_PUBLIC ?>/img/img-page/demostracion-programar-tupperware.jpg');
            background-position: top;
            background-attachment: fixed;
        }

        .separador3 {
            background-color: #FFF300;
            height: 4px;
            width: 50px;
        }

        #tips4 h2 {
            padding-top: 8rem;
            color: #FFF300;
            font-size: 2.5rem;
            font-weight: 600;
        }

        #tips4 p {
            color: white;
            padding-top: 4rem;
            text-align: center;
            font-size: 1.5rem;
        }

        /* Estilos de boton */
        #tips6 button {
            --color: white;
            font-family: inherit;
            display: inline-block;
            width: 8em;
            height: 2.6em;
            line-height: 2.5em;
            margin: 20px;
            position: relative;
            overflow: hidden;
            border: 2px solid var(--color);
            transition: color .5s;
            z-index: 1;
            font-size: 17px;
            border-radius: 6px;
            font-weight: 500;
            color: white;
            background-color: #547EEA;
        }

        #tips6 button:before {
            content: "";
            position: absolute;
            z-index: -1;
            background: black;
            height: 150px;
            width: 200px;
            border-radius: 50%;
        }

        #tips6 button:hover {
            color: white;
        }

        #tips6 button:before {
            top: 100%;
            left: 100%;
            transition: all .7s;
        }

        #tips6 button:hover:before {
            top: -30px;
            left: -30px;
        }

        #tips6 button:active:before {
            background: white;
            transition: background 0s;
        }







        @media only screen and (max-width:1399px) {

            #b-imagen {
                padding-left: 0rem;
                text-align: center;
                margin-top: 0rem !important;
            }

            #tips1 {
                background: linear-gradient(to top, rgba(53, 99, 128, 0.5) 100%, #ffff 10%, #ffff 50%), url('<?= PATH_PUBLIC ?>/img/img-page/tips-juegos.jpg');
                background-size: 132%;
                background-repeat: no-repeat;
            }

            #separador {
                margin-top: -20px;
            }







        }

        @media only screen and (max-width:410px) {
            #tips1 span {

                font-size: 19px;
                color: white;
                font-weight: 600;
            }

            #tips1 p {
                margin-top: 1rem;

                font-size: 10px;
                color: white;
                font-weight: 600;
            }

            #tips1 .container {
                padding-top: 1rem;
            }

            #tips1 button {

                font-size: 11px;
                margin-top: -10px;
            }

            #separador {
                margin-top: -16px;
            }



        }
    </style>
    <?php include_once PATH_ROOT . '/views/web/partials/header.php'; ?>
    <?php include_once PATH_ROOT . '/views/web/partials/redes.php'; ?>

    <section id="portada">
        <div class="container">
            <div class="row">
                <h1>TIPS</h1>
            </div>
        </div>
    </section>
    <section id="tips1">

        <div class="container">
            <div class="col-lg-6">

                <span>TIPS PARA ORGANIZAR UNA DEMOSTRACIÓN</span>
                <p>
                    Esta reunión es tan importante para ti como lo
                    es para la Anfitriona que ofreció su casa y
                    los invitados que lo comparten.</p>

                <button> Consultar </button>

            </div>

        </div>


    </section>
    <section id="tips2">
        <div id="separador">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 30" style="enable-background:new 0 0 1920 30;" xml:space="preserve">
                <style type="text/css">
                    .st0 {
                        fill: #FFFFFF;
                    }
                </style>
                <polygon class="st0" points="-0.5,29.5 959.5,-0.5 1919.5,29.5 " />
            </svg>
        </div>
        <div class="container my-5">
            <div class="row">
                <div class="col-lg">
                    <h2>TIPS PARA LA DEMOSTRACIÓN</h2>
                    <div class="separador2 mx-auto"></div>
                </div>


                <p>
                    Uno de los secretos del éxito es no olvidar nunca
                    esta primera experiencia y sentir ante cada nueva reunión
                    que estas poniendo el mismo cuidado y sintiendo la misma
                    expectativa y alegría que la primera vez.
                </p>
                <p>Recuerda que al organizar tu reunión tiene que
                    ser de tal modo, que en ellos encuentren lo que
                    esperan y necesitan, es decir:</p>
            </div>
        </div>
    </section>
    <section id="tips3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <center><img src="<?= PATH_PUBLIC ?>/img/img-page/tips-organizar-tupperware.jpg" class="w-75 img-fluid " alt=""></center>
                </div>
                <div class="col-lg-6 my-auto">
                    <section class="d-flex list  ">
                        <span style="color:var(--color1);"><i class="far fa-star"></i></span>
                        <span class="ms-3" style="text-align:justify;">Buen Servicio.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:var(--color1);"><i class="far fa-gem"></i></span>
                        <span class="ms-3" style="text-align:justify;">Nuevas Ideas.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:var(--color1);"><i class="far fa-grin-hearts"></i></span>
                        <span class="ms-3" style="text-align:justify;">Conocimiento y satisfacción de necesidades.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:var(--color1);"><i class="far fa-grin"></i></span>
                        <span class="ms-3" style="text-align:justify;">
                            Alegría, afecto y reconocimiento.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:var(--color1);"><i class="far fa-thumbs-up"></i></span>
                        <span class="ms-3" style="text-align:justify;">
                            Tener conocimiento de los productos que harán la demostración.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:var(--color1);"><i class="far fa-share-square"></i></span>
                        <span class="ms-3" style="text-align:justify;">
                            Haber practicado la demostración antes.</span>
                    </section>


                </div>
            </div>

            <p style="color:var(--color1);text-align:center;font-size:1.2rem;" class="py-5">Lograr esto en tus reuniones tiene que ser tu objetivo siempre. Para ello, cuentas con una gran aliada, una persona que tiene tanto interés como tú en que la reunión tenga un éxito y que conoce muy bien a los invitados, ella es tu Anfitriona.</p>
        </div>
    </section>

    <section id="tips4">
        <div class="container my-5">
            <div class="row">
                <div class="col-lg">
                    <h2>COMO REALIZAR UNA DEMOSTRACIÓN</h2>
                    <div class="separador3 mx-auto"></div>
                </div>
                <p>
                    Una de las características más distintivas de
                    nuestras reuniones Tupperware es que puedas hacerlas
                    tan dinámicas como quieras.<br>
                    Para realizar tu demostración tienes que tener en cuenta los siguientes tips:
                </p>

            </div>
            <br>
            <div class="row">
                <div class="container d-flex justify-content-around p-4" style="background-color:#547EEA;margin-bottom:8.5rem;">
                    <div class="col-lg-6">
                        <section class="d-flex list  ">
                            <span style="color:white;"><i class="fa fa-check"></i></span>
                            <span class="ms-3" style="text-align:justify;color:white;">Antes de salir de casa prepararse
                                adecuadamente, y con <br>buen ánimo y asegurarse que llevan todo lo que necesitan.</span>
                        </section>
                        <section class="d-flex list  ">
                            <span style="color:white;"><i class="fa fa-check"></i></span>
                            <span class="ms-3" style="text-align:justify;color:white;">Llegar a la reunión 1 hora antes.</span>
                        </section>
                        <section class="d-flex list  ">
                            <span style="color:white;"><i class="fa fa-check"></i></span>
                            <span class="ms-3" style="text-align:justify;color:white;">Armar un buen display.</span>
                        </section>
                        <section class="d-flex list  ">
                            <span style="color:white;"><i class="fa fa-check"></i></span>
                            <span class="ms-3" style="text-align:justify;color:white;">Dar la bienvenida y entregar el catálogo a los invitados.</span>
                        </section>
                        <section class="d-flex list  ">
                            <span style="color:white;"><i class="fa fa-check"></i></span>
                            <span class="ms-3" style="text-align:justify;color:white;">Comenzar la reunión a horario.</span>
                        </section>
                        <section class="d-flex list  ">
                            <span style="color:white;"><i class="fa fa-check"></i></span>
                            <span class="ms-3" style="text-align:justify;color:white;">Dar gracias a la Anfitriona.</span>
                        </section>
                        <section class="d-flex list  ">
                            <span style="color:white;"><i class="fa fa-check"></i></span>
                            <span class="ms-3" style="text-align:justify;color:white;">Saludar, dar la bienvenida e iniciar la demostración.</span>
                        </section>
                        <section class="d-flex list  ">
                            <span style="color:white;"><i class="fa fa-check"></i></span>
                            <span class="ms-3" style="text-align:justify;color:white;">Generalidades del producto.</span>
                        </section>

                    </div>
                    <div class="col-lg-6">
                        <section class="d-flex list  ">
                            <span style="color:white;"><i class="fa fa-check"></i></span>
                            <span class="ms-3" style="text-align:justify;color:white;">Juegos.</span>
                        </section>
                        <section class="d-flex list  ">
                            <span style="color:white;"><i class="fa fa-check"></i></span>
                            <span class="ms-3" style="text-align:justify;color:white;">Explicación del catálogo.</span>
                        </section>
                        <section class="d-flex list">
                            <span style="color:white;"><i class="fa fa-check"></i></span>
                            <span class="ms-3" style="text-align:justify;color:white;">Explicación de forma de pago y fecha de entrega.</span>
                        </section>
                        <section class="d-flex list">
                            <span style="color:white;"><i class="fa fa-check"></i></span>
                            <span class="ms-3" style="text-align:justify;color:white;">Fechar nuevas demostraciones con los invitados.</span>
                        </section>
                        <section class="d-flex list">
                            <span style="color:white;"><i class="fa fa-check"></i></span>
                            <span class="ms-3" style="text-align:justify;color:white;">Los invitados que tomen contacto directo con los productos y que decidan su compra, asesorándolas si fuera necesario.</span>
                        </section>
                        <section class="d-flex list">
                            <span style="color:white;"><i class="fa fa-check"></i></span>
                            <span class="ms-3" style="text-align:justify;color:white;">Entregar el Set Exclusivo de Anfitrionas.</span>
                        </section>
                        <section class="d-flex list">
                            <span style="color:white;"><i class="fa fa-check"></i></span>
                            <span class="ms-3" style="text-align:justify;color:white;">Cerrar la reunión felicitando y agradeciendo nuevamente a la Anfitriona y expresando el deseo de volverlas a ver en futuras reuniones.</span>
                        </section>

                    </div>

                </div>
            </div>
        </div>

    </section>
    <section id="tips5">
        <div class="container">
            <div class="row d-flex justify-content-around">
                <div class="col-lg-6 px-3 my-auto">
                    <img src="<?= PATH_PUBLIC ?>/img/img-page/tips-fechar-tupperware-1.jpg" class="w-100 img-fluid " alt="">
                </div>
                <div class="col-lg-6 my-auto ">
                    <div class="col-lg">
                        <h2 style="color:var(--color12);font-weight:600;">TIPS PARA FECHAR NUEVA DEMOSTRACIÓN</h2>
                        <p>Fechar es un compromiso definitivo para realizar una reunión Tupperware en un lugar, día y hora específico.</p>
                        <p>Es importante tener en cuenta los siguientes puntos para lograr “una agenda organizada”:</p>
                    </div>
                    <section class="d-flex list  ">
                        <span style="color:var(--color2);"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">En la misma reunión Tupperware hay todo un entorno y se crea un clima que predispone a las personas a reunirse nuevamente.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:var(--color2);"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Fuera de la reunión cualquier lugar y momento es bueno para fechar.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:var(--color2);"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Antes de empezar la reunión, mientras van llegando los demás invitados.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:var(--color2);"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">
                            Al mostrar la promoción de Anfitrionas vigente.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:var(--color2);"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">
                            Cuando termina la demostración y antes de hacer el pedido de cada una.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:var(--color2);"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">
                            Cuando se demuestra el pedido de clientes.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:var(--color2);"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">
                            Crear una corriente de simpatía con cada una de los invitados.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:var(--color2);"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">
                            Tratar de tener el nombre de los invitados y llamarlos por su nombre.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:var(--color2);"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">
                            Motivarlos para que sientan el deseo de ganarse los regalos de Anfitrionas.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:var(--color2);"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">
                            Proponerles reuniones distintas con diferentes temas de su interés.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:var(--color2);"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">
                            Que la reunión sea instructiva, pero a la vez ágil y dinámica.</span>
                    </section>


                </div>
            </div>
        </div>
    </section>
    <section id="tips6">
        <div id="separadorr">
            <img src="<?= PATH_PUBLIC ?>/img/img-page/base2.svg" class="w-100 img-fluid " alt="">
        </div>
        <div class="container-fluid" style="background-color:#547EEA;">
            <div class="row d-flex justify-content-center" style="padding:6rem;margin-top:-12px;">
                <div class="col-lg-5 my-auto">
                    <span style="color:white;font-size:1.5rem;font-weight:600;">¿Te gustaría realizar una Experiencia?.</span>
                </div>
                <div class="col-lg-3">
                    <button> Contáctanos </button>
                </div>
            </div>
        </div>
    </section>




    <?php include_once PATH_ROOT . '/views/web/partials/footer.php'; ?>
</body>




<!-- CARROUSEL -->

<script>
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        autoplay: true,
        autoplayTimeout: 4000,
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            800: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
    });
</script>

<script type="text/javascript">
    let modal = new bootstrap.Modal(document.getElementById('myModal'), );
    modal.show();
</script>
<script src="<?= PATH_PUBLIC ?>/js/popper.min.js"></script>
<script src="<?= PATH_PUBLIC ?>/js/bootstrap.min.js"></script>
<script src="<?= PATH_PUBLIC ?>/js/jquery.min.js"></script>
<script src="<?= PATH_PUBLIC ?>/js/bootstrap.pooper.js"></script>

<script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
<script src="<?= PATH_PUBLIC ?>/js/hubslider.min.js"></script>
<script>
    $('.hub-slider-slides ul').hubSlider({
        selector: $('li'),
        button: {
            next: $('.hub-slider-arrow_next'),
            prev: $('.hub-slider-arrow_prev')
        },
        transition: '0.9s',
        startOffset: 30,
        auto: true,
        time: 3 // secondly
    });
</script>

</html>