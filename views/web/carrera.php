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

    <!-- Letras Movimiento -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Anime style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


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

        #unete button {
            font-family: inherit;
            font-size: 20px;
            background-color: var(--color8);
            color: white;
            padding: 0.7em 1em;
            padding-left: 0.9em;
            display: flex;
            align-items: center;
            border: none;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.2s;
        }

        #unete button span {
            display: block;
            margin-left: 0.3em;
            transition: all 0.3s ease-in-out;
        }

        #unete button svg {
            display: block;
            transform-origin: center center;
            transition: transform 0.3s ease-in-out;
        }

        #unete button:hover .svg-wrapper {
            animation: fly-1 0.6s ease-in-out infinite alternate;
        }

        #unete button:hover svg {
            transform: translateX(2.4em) rotate(45deg) scale(1.1);
        }

        #unete button:hover span {
            transform: translateX(7em);
        }

        #unete button:active {
            transform: scale(0.95);
        }

        @keyframes fly-1 {
            from {
                transform: translateY(0.1em);
            }

            to {
                transform: translateY(-0.1em);
            }
        }

        .list {
            margin-top: 1rem;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }


        /* separador */
        h1.linea,
        h2.linea {
            position: relative;
            z-index: 1
        }

        #carrera2 h1.linea:before,
        #carrera2 h2.linea:before {
            border-top: 3px solid #D8723E;
            content: "";
            margin: 0 auto;
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            bottom: 0;
            width: 98%;
            z-index: -1
        }

        #carrera2 h1.linea span,
        #carrera2 h2.linea span {
            background: #fff;
            padding: 0 25px;
            font-family: 'Anton', sans-serif;
            color: #D8723E;
        }

        #carrera3 h1.linea:before,
        #carrera3 h2.linea:before {
            border-top: 3px solid #D7D53F;
            content: "";
            margin: 0 auto;
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            bottom: 0;
            width: 98%;
            z-index: -1
        }

        #carrera3 h1.linea span,
        #carrera3 h2.linea span {
            background: #fff;
            padding: 0 25px;
            font-family: 'Anton', sans-serif;
            color: #D7D53F;
        }

        #carrera4 h1.linea:before,
        #carrera4 h2.linea:before {
            border-top: 3px solid #D5453A;
            content: "";
            margin: 0 auto;
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            bottom: 0;
            width: 98%;
            z-index: -1
        }

        #carrera4 h1.linea span,
        #carrera4 h2.linea span {
            background: #fff;
            padding: 0 25px;
            font-family: 'Anton', sans-serif;
            color: #D5453A;
        }







        @media only screen and (max-width:1399px) {

            #b-imagen {
                padding-left: 0rem;
                text-align: center;
                margin-top: 0rem !important;
            }

        }
    </style>
    <?php include_once PATH_ROOT . '/views/web/partials/header.php'; ?>
    <?php include_once PATH_ROOT . '/views/web/partials/redes.php'; ?>

    <section id="portada">
        <div class="container">
            <div class="row">
                <h1>PLAN DE CARRERA</h1>
                
            </div>
        </div>
    </section>

    <section id="carrera1">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 my-auto px-4">
                    <img src="<?= PATH_PUBLIC ?>/img/img-page/plandecarrera.jpeg" class="w-100 img-fluid " alt="">
                </div>
                <div class="col-lg-6  px-4" style="background-color:var(--color8);">
                    <div>
                        <br>
                        <h2 style="font-size:40px;color:var(--color1);font-weight:900;" class="animate__animated animate__fadeInUp">¡Tenemos diseñado un Plan de Carrera especial para ti!</h2>
                        <br>
                        <p style="text-align:center;color:white;font-weight:600;">
                            Tupperware te ofrece un Plan de Carrera sólido el cual te permitirá crecer personal y profesionalmente, como una persona Emprendedora y de negocios logrando tus metas y sueños.
                        </p>
                    </div>
                    <hr>
                    <br>
                    <h2 style="font-size:40px;color:var(--color3);font-weight:900;" class="animate__animated animate__fadeInUp">Tupperware te abre la
                        puerta al Éxito</h2>
                    <br>
                    <p style="text-align:center;color:white;font-weight:600;">
                        Combinar las actividades familiares con el trabajo, adecuar
                        de manera flexible tus horarios, visualizar tus metas en ganancia
                        y ofrecerte diversas Oportunidades para alcanzarlas; son algunos
                        de los beneficios que podrás obtener con Tupperware.
                    </p>
                    <p style="text-align:center;color:white;font-weight:600;">
                        Porque nuestra misión es Cambiar Vidas,
                        y Tupperware te abre la puerta al Éxito
                        ofreciéndote Oportunidades, confianza que te inspira
                        a seguir creciendo extendiendo una mano a las personas
                        que lo necesitan.
                    </p>
                    <div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="carrera2">
        <div class="container">
            <br>
            <br>
            <div class="row mb-4">
                <div class="col text-center">
                    <h1 class="linea text-info"><span>Anfitriona</span></h1>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6">
                    <img src="<?= PATH_PUBLIC ?>/img/img-page/delumbrante-anfitrionas.jpg" class="w-100 img-fluid " alt="">
                </div>
                <div class="col-lg-6 my-auto">
                    <section class="d-flex list  ">
                        <span style="color:#D8723E;"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Es aquella persona que junto a su Dealer re
                            aliza una Experiencia Tupperware invitando a sus familiares,
                            amigos y conocidos a disfrutarla; allí podrán compartir las
                            bondades y usos de los productos disponibles.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:#D8723E;"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">La Anfitriona
                            podrá obtener Set Exclusivos según el nivel que logre
                            la Dealer en su reunión.</span>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <section id="carrera3">
        <div class="container">
            <br>
            <br>
            <div class="row mb-4">
                <div class="col text-center">
                    <h1 class="linea text-info"><span>Comerciante</span></h1>
                </div>
            </div>
            <br>
            <p style="text-align:center;color:#D7D53F;font-size:21px;font-weight:800;">Persona que se vincula a
                Tupperware optando una de las modalidades de Ingreso y desea obtener su propio negocio con nuestros productos.</p>
            <div class="row">
                <div class="col-lg-6 my-auto">
                    <img src="<?= PATH_PUBLIC ?>/img/img-page/deslumbrante-dealer.jpg" class="w-100 img-fluid " alt="">
                </div>
                <div class="col-lg-6 my-auto">
                    <p style="text-align:justify;">Para alcanzar un mayor crecimiento debes ser parte del programa de Prospectas.
                        El cual está diseñado para brindar las herramientas adecuadas para consolidar
                        un grupo Exitoso, incrementar la productividad para subir de nivel.</p>
                    <p>Entre los beneficios que tiene el/la comerciante son:</p>
                    <section class="d-flex list  ">
                        <span style="color:#D7D53F;"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Ganancia sobre la venta.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:#D7D53F;"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Capacitaciones Gratuitas.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:#D7D53F;"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Regalos por actividad.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:#D7D53F;"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Regalos por brindar Oportunidades.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:#D7D53F;"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Eventos especiales.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:#D7D53F;"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Comerciante ruby.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:#D7D53F;"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Comerciante ruby.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:#D7D53F;"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Comerciante zafiro</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:#D7D53F;"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Comerciante esmeralda.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:#D7D53F;"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Comerciante diamante.</span>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <section id="carrera4">
        <div class="container">
            <br>
            <br>
            <div class="row mb-4">
                <div class="col text-center">
                    <h1 class="linea text-info"><span>Empresario(a)</span></h1>
                </div>
            </div>
            <br>
            <p style="text-align:center;color:#D5453A;font-size:21px;font-weight:800;">Dealer que logro consolidar su grupo
                de personas y las encamina al Éxito, realiza <br>reuniones de unidad y las capacita.</p>
            <p style="text-align:center;">Empresario (a) que entrena y da seguimiento a sus Dealers,
                brindándoles la Oportunidad de ser futuras Empresarias (os).</p>
            <br>
            <div class="row">
                <div class="col-lg-6 my-auto">
                    <img src="<?= PATH_PUBLIC ?>/img/img-page/empresaria.jpg" class="w-100 img-fluid " alt="">
                </div>
                <div class="col-lg-6 my-auto">

                    <p>Entre los beneficios que tienen son:</p>
                    <section class="d-flex list  ">
                        <span style="color:#D5453A;"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Ganancia sobre la venta.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:#D5453A;"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Ganancia de la Unidad.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:#D5453A;"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Ganancias de las Unidades Generadas.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:#D5453A;"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Capacitaciones Gratuitas.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:#D5453A;"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Regalos por actividad.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:#D5453A;"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Beneficios por brindar oportunidades.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:#D5453A;"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Eventos especiales.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:#D5453A;"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Viajes especiales.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:#D5453A;"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Bono Vanguard por nivel.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:#D5453A;"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Organiza y realiza sus reuniones de unidad.</span>
                    </section>
                    <section class="d-flex list  ">
                        <span style="color:#D5453A;"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                        <span class="ms-3" style="text-align:justify;">Organiza y capacita a sus propias unidades generadas</span>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>

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
<script>
    AOS.init();
</script>

</html>