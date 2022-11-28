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
            background-color: var(--color1);
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
            background-color: var(--color2);
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

        #back-form {

            background: linear-gradient(to top,
                    rgba(30, 181, 218, 0.8) 100%,
                    #ffff 10%,
                    #ffff 50%),
                url('<?= PATH_PUBLIC ?>/img/img-page/fondo-formulario.jpg');
            background-size: 100%;

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
    <section id="back-form">
        <section id="portada">
            <div class="container">
                <div class="row">
                    <h1>INICIA TU PLAN COMERCIAL ¡ATREVETE A SOÑAR!</h1>
                </div>
            </div>
        </section>
        <br><br>
        <section id="unete">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-5 d-flex justify-content-center" style="background-color:var(--color1);">
                        <div class="p-5">
                            <h2 class="py-3" style="border-bottom: 4px solid #ffdb00;color:white;font-weight:900;">INICIA TU CARRERA CON TUPPERWARE</h2>
                            <br>
                            <p style="color:white;font-weight:600;">Hoy tú puedes formar parte de nuestra
                                fuerza de ventas en donde podrás tener
                                flexibilidad con tus horarios, ganar dinero,
                                crecer personal y profesionalmente.</p>
                                <br>
                            <h5 style="color:white;font-weight:600;">"El Éxito es la suma de pequeños esfuerzos repetidos día tras días"</h5>

                        </div>


                    </div>
                    <div class="col-lg-7 p-0" >
                        <!--  <img src="<//?= PATH_PUBLIC ?>/img/img-page/carrera.jpg" class="img-fluid w-100" alt=""> -->
                        <div class="p-5">
                            <form action="">
                                <h3 style="color:white;">¡ATREVETE A SOÑAR! </h3>
                                <br>
                                <div class="row">
                                    <div class="col-md mb-3 text-white fw-bold">
                                        NOMBRE(S)*
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="nombres" placeholder="" required="">
                                    </div>
                                    <div class="col-md mb-3 text-white fw-bold">
                                        APELLIDO(S)*
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="apellidos" placeholder="" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md mb-3 text-white fw-bold">
                                        NUMERO DE TELEFONO*
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="telefono" placeholder="" required="">
                                    </div>
                                    <div class="col-md mb-3 text-white fw-bold">
                                        CORREO ELECTRONICO*
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="correo" placeholder="" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md mb-3 text-white fw-bold">
                                        DEPARTAMENTO*
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>--Seleccione--</option>
                                            <option value="Amazonas">Amazonas</option>
                                            <option value="Ancash">Ancash</option>
                                            <option value="Apurímac">Apurímac</option>
                                            <option value="Arequipa">Arequipa</option>
                                            <option value="Ayacucho">Ayacucho</option>
                                            <option value="Cajamarca">Cajamarca</option>
                                            <option value="Callao">Callao</option>
                                            <option value="Cuzco">Cuzco </option>
                                            <option value="Huancavelica">Huancavelica</option>
                                            <option value="Huánuco">Huánuco</option>
                                            <option value="Ica">Ica</option>
                                            <option value="Junín">Junín</option>
                                            <option value="La_Libertad">La Libertad</option>
                                            <option value="Lambayeque">Lambayeque</option>
                                            <option value="Lima">Lima</option>
                                            <option value="Loreto">Loreto</option>
                                            <option value="Madre_de_Dios">Madre de Dios</option>
                                            <option value="Moquegua">Moquegua</option>
                                            <option value="Pasco">Pasco</option>
                                            <option value="Piura">Piura</option>
                                            <option value="Puno">Puno</option>
                                            <option value="San_Martín">San Martín</option>
                                            <option value="Tacna">Tacna</option>
                                            <option value="Tumbes">Tumbes</option>
                                            <option value="Ucayali">Ucayali</option>
                                        </select>
                                    </div>
                                    <div class="col-md mb-3 text-white fw-bold">
                                        ZONA/DISTRITO*
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="nombres" placeholder="" required="">
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="mb-3 text-white fw-bold">
                                        CONSULTA
                                        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="" rows="3" name="consulta" required="" spellcheck="false"></textarea>
                                    </div>
                                </div> -->

                                <div class="row pt-5">
                                    <div class="d-flex justify-content-center">
                                        <button>
                                            <a href="#" style="color:white;" target="_blank">
                                                <div class="svg-wrapper-1">
                                                    <div class="svg-wrapper">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                                            <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                            <span>Inscríbete Ya</span>
                                        </button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>

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