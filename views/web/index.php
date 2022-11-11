<?php

use Admin\Models;

$objModal = new Models\ModalModel;
$objBanner = new Models\BannerModel;
$objEmpresa = new Models\EmpresaModel;
$objPublicaciones = new Models\PublicacionModel;
$objCorreos = new Models\CorreosModel;

/* $dataCorreo = $objCorreos->registrarCorreos('1','2222'); */

$dataEmpresa = $objEmpresa->listEmpresa()[1];
$dataBanner = $objBanner->listBannerInWeb();
$dataModal = $objModal->obtenerPopUp();
$dataPublicaciones = $objPublicaciones->listPublicacionesInWeb(0, 3);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $dataEmpresa['metades'] ?>">
    <title><?= $dataEmpresa['nombre']?></title>
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
            width: 200px;
            height: 200px;
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

    <section>
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= PATH_PUBLIC ?>/img/banner/banner1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= PATH_PUBLIC ?>/img/banner/banner2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= PATH_PUBLIC ?>/img/banner/banner3.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <br><br>
    <section id="resumen">
        <div class="container">
            <div class="row d-flex justify-content-around">
                <div class="col-lg-3">
                    <div>
                        <h3>Tupperware</h3>
                        <br>
                        <h2>PRODUCTOS DESTACADOS</h2>
                        <br>
                        <p style="text-align: center;">
                            Dicen que en este mundo nada es para siempre, excepto nuestros productos.
                        </p>
                    </div>
                </div>
                <div class="col-lg-2 d-flex justify-content-center">
                    <div class="div1">
                        <div class="images">
                            <img class="crop1" src="<?= PATH_PUBLIC ?>/img/galeria/producto1.jpg">
                        </div>
                        <div class="div2">
                            <img class="crop1" src="<?= PATH_PUBLIC ?>/img/galeria/producto2.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 d-flex justify-content-center">
                    <div class="div1">
                        <div class="images">
                            <img class="crop1" src="<?= PATH_PUBLIC ?>/img/galeria/producto1.jpg">
                        </div>
                        <div class="div2">
                            <img class="crop1" src="<?= PATH_PUBLIC ?>/img/galeria/producto2.jpg">
                        </div>
                    </div>

                </div>
                <div class="col-lg-2 d-flex justify-content-center">
                    <div class="div1">
                        <div class="images">
                            <img class="crop1" src="<?= PATH_PUBLIC ?>/img/galeria/producto1.jpg">
                        </div>
                        <div class="div2">
                            <img class="crop1" src="<?= PATH_PUBLIC ?>/img/galeria/producto2.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 d-flex justify-content-center">
                    <div class="div1">
                        <div class="images">
                            <img class="crop1" src="<?= PATH_PUBLIC ?>/img/galeria/producto1.jpg">
                        </div>
                        <div class="div2">
                            <img class="crop1" src="<?= PATH_PUBLIC ?>/img/galeria/producto2.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <section id="idyoutube">
        <div class="container">
            <div class="row d-flex">
                <div class="col-lg-6" style="box-shadow: 0px 31px 10px -11px rgba(0,0,0,0.5);">
                    <iframe width="100%" height="350" src="https://www.youtube.com/embed/Sbb5U8kYMIs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-lg-6" style="box-shadow: 0px 31px 10px -11px rgba(0,0,0,0.5);">
                    <iframe width="100%" height="350" src="https://www.youtube.com/embed/bYsprATsHoU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <section id="productos">
        <div class="container">
            <div class="row py-5 d-flex justify-content-center ">
                <div class="col-lg-6  d-flex justify-content-center">
                    <img src="<?= PATH_PUBLIC ?>/img/galeria/blog1.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-4 my-auto">
                    <h4>Inicia tu negocio</h4>
                    <h5>Únete a nosotros</h5>
                    <p>No necesitas inversión inicial, obten ganancias semanales.Te capacitamos de forma gratuita</p>
                    <br>
                    <div class="d-flex justify-content-center"><button class="btn btn-primary float-right">Ver más</button></div>
                </div>
            </div>
            <hr>
            <div class="row py-5 d-flex justify-content-center">
                <div class="col-lg-4 my-auto">
                    <h4>Emprende con nosotros</h4>
                    <h5>Tú pones los horarios</h5>
                    <p>Conviértete en emprendedora independiente con nosotros. ¡Genera tus propios ingresos y alcanza tus metas!</p>
                    <br>
                    <div class="d-flex justify-content-center"><button class="btn btn-primary float-right">Ver más</button></div>
                </div>
                <div class="col-lg-6  d-flex justify-content-center">
                    <img src="<?= PATH_PUBLIC ?>/img/galeria/blog2.jpg" class="img-fluid" alt="">
                </div>
            </div>
            <hr>
            <div class="row py-5 d-flex justify-content-center ">
                <div class="col-lg-6  d-flex justify-content-center">
                    <img src="<?= PATH_PUBLIC ?>/img/galeria/blog3.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-4 my-auto">
                    <h4>Kit de bienvenida</h4>
                    <h5>Tu primer paso al éxito</h5>
                    <p>al iniciar este KIT DE BIENVENIDA</p>
                    <br>
                    <div class="d-flex justify-content-center"><button class="btn btn-primary float-right">Ver más</button></div>
                </div>
            </div>
            <hr>

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