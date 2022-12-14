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
    <!-- ANIMACIONES AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

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

        #historia1 {
            background-color: rgba(30, 181, 218, .6);
        }

        #historia2 {
            background-color: var(--color9);
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
                <h1>TUPPERWARE</h1>
            </div>
        </div>
    </section>
    <section id="historia1">
        <br>
        <br>

        <div class="container">
            <div class="row d-flex justify-content-around">
                <div class="col-lg-5" data-aos="flip-up">
                    <div style="display:flex; align-items:center;">
                        <span style="color:white;font-size:40px;">Nuestra</span>&nbsp;&nbsp;<span style="color:var(--color1);font-size:40px;">Historia</span>
                    </div>
                    <div style="display:flex; align-items:flex-end;">
                        <img src="<?= PATH_PUBLIC ?>/img/img-page/historia-tupperware-1.png" class="w-100 img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-6" style="text-align:justify;color:white;" data-aos="flip-up">
                    <p>En 1937 Earl Silas Tupper, un ingeniero qu??mico que trabajaba
                        en la Planta Qu??mica de Dupont, en Delaware, Estados Unidos,
                        decide renunciar a su trabajo para empezar su propia empresa. Tupper
                        empez?? a experimentar con distintos derivados del pl??stico. Un material
                        cuyos componentes y utilidades eran pocos conocidos para la ??poca. En vista
                        de sus escasos resultados, Tupper adquiri?? con sus antiguos compa??eros de trabajo
                        desechos de un tipo de pl??stico llamado polietileno.
                    </p>
                    <p>La perseverancia en sus estudios premi?? a Tupper, quien transform??
                        el polietileno en un material blando, moldeable y flexible. En 1938
                        fundar??a su propia compa????a: Tupper Plastics Company. La producci??n
                        empez?? con la creaci??n del primer producto Tupper: Wonderlier Bowl
                        ???el taz??n maravilla???.
                    </p>
                    <p>La perseverancia en sus estudios premi?? a Tupper, quien transform??
                        el polietileno en un material blando, moldeable y flexible.
                        En 1938 fundar??a su propia compa????a: Tupper Plastics Company.
                        La producci??n empez?? con la creaci??n del primer producto Tupper:
                        Wonderlier Bowl ???el taz??n maravilla???.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="historia2">
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 my-auto" style="text-align:justify;" data-aos="flip-up">
                    <p>Luego de una extensa b??squeda de ideas,
                        Tupper dise???? un sello herm??tico circular,
                        inspirado en la tapa de un bote de pintura.
                        Este dise??o permit??a que los alimentos almacenados
                        estuvieran frescos por m??s tiempo, no se derramaran
                        y ser colocados en cualquier posici??n. Con esta innovadora
                        idea, nacer??an los famosos sellos Tupperware??</p>
                    <p>
                        La soluci??n para la compa????a llegar??a de la manera m??s inesperada.
                        Brownie Wise, un ama de casa en la ciudad de Georgia, Atlanta, adquiri??
                        varios envases Tupper, y al poco tiempo aprendi?? el uso del sello
                        herm??tico y sus beneficios.
                    </p>
                    <p>
                        Para comunicar su descubrimiento,
                        Wise compr?? m??s productos y empez?? a realizar
                        reuniones con sus vecinas, para explicarles las maravillas
                        de los envases. Un d??a Brownie le escribi?? una carta a Tupper,
                        donde comentaba su sistema de demostraci??n, al que denomin?? venta
                        directa, y que estaba muy interesada en poder aplicarlo en la compa????a.
                    </p>
                    <p>
                        Earl Tupper acept?? esta curiosa oferta. Al poco tiempo
                        las ventas de los productos aumentar??an como nunca antes,
                        lo que permiti?? a la compa????a retirarlos de los supermercados,
                        y oficializar a la venta directa como el ??nico m??todo de comercializaci??n Tupperware??.
                    </p>
                    <p>
                        En 1951 Brownie Wise ser??a nombrada como Vicepresidenta de la compa????a,
                        as?? como la directora del sistema de ventas directas o ???Reuniones en casa???.
                    </p>
                </div>
                <div class="col-lg-6 my-auto" data-aos="flip-up">
                    <div class="row">
                        <div class="col-lg-6"><img src="<?= PATH_PUBLIC ?>/img/img-page/historia-tupperware1.jpg" class="w-100 img-fluid p-2" alt=""></div>
                        <div class="col-lg-6"><img src="<?= PATH_PUBLIC ?>/img/img-page/historia-tupperware2.jpg" class="w-100 img-fluid p-2" alt=""></div>
                        <div class="col-lg-6"><img src="<?= PATH_PUBLIC ?>/img/img-page/historia-tupperware3.jpg" class="w-100 img-fluid p-2" alt=""></div>
                        <div class="col-lg-6"><img src="<?= PATH_PUBLIC ?>/img/img-page/historia-tupperware4.jpg" class="w-100 img-fluid p-2" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10" data-aos="zoom-in">
                    <iframe width="100%" height="450" src="https://www.youtube.com/embed/kHBZQX-HKYw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10" style="background-color:white;" data-aos="zoom-in-down">
                    <p style="padding-top:2rem;color:var(--color8);font-size:23px;text-align:center;font-weight:700;">Tupperware se esfuerza por ser la empresa de venta directa que m??s presta al desarrollo personal y da oportunidades de ingreso a la poblaci??n del pa??s.</p>
                    <p style="padding-bottom:2rem;color:var(--color1);font-size:23px;text-align:center;font-weight:700;">Te ayudamos a cambiar t?? vida???</p>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
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
<script>
  AOS.init();
</script>