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

        #nosotros1 {
            background-color: var(--color8);
        }

        #nosotros2 {
            background-image: url('<?= PATH_PUBLIC ?>/img/img-page/fondo-nosotros.jpg');
            background-size: 100%;
            background-repeat: no-repeat;
        }

        #nosotros3 {
            background-image: url('<?= PATH_PUBLIC ?>/img/img-page/fondo-celeste-punto-blancos-3-1.jpg');
            background-size: 100%;
            background-repeat: no-repeat;
        }

        #icono {
            background-color: var(--color11);
            border-radius: 50%;
            border: solid 3px white;
        }

        #icono span {
            padding: 15px;
            font-size: 1.2rem;
            color: white;
        }

        #futuro2 #col-niveles1 {

            padding: 2rem;
            margin-left: 10px;
            margin-right: 10px;
            position: relative;
            margin-top: -70px;
            background-color: var(--color5);
            font-size: 1rem;
            text-align: center;
            border-bottom: solid 3px var(--color1);
            height: 40%;
        }

        #futuro2 #col-niveles2 {

            padding: 2rem;
            margin-left: 10px;
            margin-right: 10px;
            position: relative;
            margin-top: -70px;
            background-color: var(--color5);
            font-size: 1rem;
            text-align: center;
            border-bottom: solid 3px var(--color1);
            height: 40%;
        }

        #futuro2 #col-niveles3 {

            padding: 2rem;
            margin-left: 10px;
            margin-right: 10px;
            position: relative;
            margin-top: -70px;
            background-color: var(--color5);
            font-size: 1rem;
            text-align: center;
            border-bottom: solid 3px var(--color1);
            height: 40%;
        }

        #futuro2 div.crop {
            height: 200px;
            max-height: 200px;
            overflow: hidden;
        }

        #futuro2 div.card-body p {
            height: 70px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            transition: height 0.25s ease-out;
        }

        #futuro2 div.card-body:hover p {
            height: 140px;
            display: block;
            transition: height 0.25s ease-in;
        }

        #futuro2 .card {
            background: linear-gradient(rgb(255, 255, 255), rgb(243, 243, 243));
            box-shadow: 0 0 5px var(--color1);

        }






        @media only screen and (max-width:1399px) {

            #b-imagen {
                padding-left: 0rem;
                text-align: center;
                margin-top: 0rem !important;
            }

            #nosotros3 {
                background-image: url('<?= PATH_PUBLIC ?>/img/img-page/fondo-celeste-punto-blancos-3-1.jpg');
                background-size: 120%;
                background-repeat: no-repeat;
            }

        }
    </style>
    <?php include_once PATH_ROOT . '/views/web/partials/header.php'; ?>
    <?php include_once PATH_ROOT . '/views/web/partials/redes.php'; ?>

    <section id="portada">
        <div class="container">
            <div class="row">
                <h1>CAMINO HACIA EL FUTURO</h1>
            </div>
        </div>
    </section>
    <section id="futuro1">

        <!--   <div class="container-fluid px-0" >
            <video width="100%"  style="height: calc(100vh - 90px);" controls >
                <source src="<//?= PATH_PUBLIC ?>/img/img-page/video_futuro.mp4" type="video/mp4">
            </video>        
        </div> -->
        <div class="container-fluid px-0">
            <iframe width="100%" height="700" src="https://www.youtube.com/embed/WyhBMajAgT8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

    </section>
    <section id="futuro2">
        <br>
        <br>
        <div class="container">
            <div class="col-lg" data-aos="fade-up">
                <h2 style="font-size:40px;color:var(--color1);font-weight:600;">Más Tupperware menos desechables</h2>
                <br>
                <p style="text-align:center;color:var(--color8);font-size:28px;font-weight:400;">Comparte estos
                    consejos y seamos parte de la solución y no del problema.
                    Ayudemos a nuestro planeta.</p>
                <br>
                <p style="text-align:center;">En Tupperware somos apasionados de Cambiar la Vida de las personas, de ofrecerles oportunidades tangibles para prepararse, despertar sus capacidades
                    y aumentar su potencial.</p>
                <p style="text-align:center;">Una persona empoderada impacta positivamente a su familia, sus comunidades
                    y a su país; es por ellos que apoyamos la causa y situación que así lo requieren,
                    ya sea para el logro de sus sueños de la persona o superarse en su día día.</p>
                <p style="text-align:center;">Extender una mano es uno de nuestros valores y esto
                    significa que nos impulsamos mutuamente para empoderar
                    a las mujeres a través de oportunidades que les cambian la
                    vida y de esa manera puedan crear su propio negocio.</p>
            </div>
        </div>
    </section>
    <section id="futuro2">
        <br>
        <br>
        <div class="container">
            <div class="row">

                <div class="col-lg-4" id="col-niveles" data-aos="flip-left">
                    <div class="col">
                        <img src="<?= PATH_PUBLIC ?>/img/img-page/futuro1.jpg" class="w-100" alt="">
                    </div>
                    <div class="col" id="col-niveles1">
                        <h5>REDUCE Y REUTILIZA</h5>
                        <p style="text-align:center;">
                            No uses ni rellenes botellas desechables,
                            lleva una botella reutilizable y rellena en
                            cualquier momento.</p>


                    </div>

                </div>

                <div class="col-lg-4" id="col-niveles" data-aos="flip-left">
                    <div class="col">
                        <img src="<?= PATH_PUBLIC ?>/img/img-page/futuro2.jpg" class="w-100" alt="">
                    </div>
                    <div class="col" id="col-niveles2">
                        <h5>CALIENTA Y TRANSPORTA</h5>
                        <p style="text-align:center;">
                            Lleva tu comida en un recipiente y utilízala en el microondas sin problemas.</p>

                    </div>
                </div>
                <div class="col-lg-4" id="col-niveles" data-aos="flip-left">
                    <div class="col">
                        <img src="<?= PATH_PUBLIC ?>/img/img-page/futuro3.jpg" class="w-100" alt="">
                    </div>
                    <div class="col " id="col-niveles3">
                        <h5>COMO SALUDABLE</h5>
                        <p style="text-align:center;">Envía a tus niños su merienda saludable con seguridad y sin derrames.</p>

                    </div>
                </div>

            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-4" id="col-niveles" data-aos="flip-left">
                    <div class="col">
                        <img src="<?= PATH_PUBLIC ?>/img/img-page/futuro4.jpg" class="w-100" alt="">
                    </div>
                    <div class="col " id="col-niveles3">
                        <h5>CONSERVA TUS ALIMENTOS</h5>
                        <p style="text-align:center;">
                            Evite dejar que la comida se deteriore y
                            conserve los alimentos con envases especiales
                            por más tiempo. Menos desechos para el planeta.</p>

                    </div>
                </div>
                <div class="col-lg-4" id="col-niveles" data-aos="flip-left">
                    <div class="col">
                        <img src="<?= PATH_PUBLIC ?>/img/img-page/futuro5.jpg" class="w-100" alt="">
                    </div>
                    <div class="col " id="col-niveles3">
                        <h5>LLEVA TU BOLSA</h5>
                        <p style="text-align:center;">
                            Evita las bolsas de plásticos y papel.
                            Lleve su bolsa reutilizable al momento de
                            hacer compras en el mercado o súper mercado.</p>

                    </div>
                </div>
                <div class="col-lg-4" id="col-niveles" data-aos="flip-left">
                    <div class="col">
                        <img src="<?= PATH_PUBLIC ?>/img/img-page/futuro6.jpg" class="w-100" alt="">
                    </div>
                    <div class="col " id="col-niveles3">
                        <h5>COMPARTE CON TUS AMIGOS</h5>
                        <p style="text-align:center;">
                            Comparte estos consejos y seamos parte
                            de la solución y no del problema.
                            Ayudemos a nuestro planeta.</p>

                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
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
<script>
    AOS.init();
</script>

</html>