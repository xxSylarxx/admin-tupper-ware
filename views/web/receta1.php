<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUPPERWARE</title>
    <link rel="shortcut icon" href="<?= PATH_PUBLIC ?>/img/icons/icon.png" type="image/png">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="<?= PATH_PUBLIC ?>/css/animate.min.css">
    <link rel="stylesheet" href="<?= PATH_PUBLIC ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= PATH_PUBLIC ?>/css/web.css">
</head>

<body>

    <script src="<?= PATH_PUBLIC ?>/js/bootstrap.min.js"></script>

    <style>
        header .navbar-nav .nav-item .activador {
            color: var(--color1);
            font-weight: bold;

        }

        #subniveles {
            margin-left: .4rem;
        }

        .dropend .dropdown-toggle::after {
            display: none;
        }

        .dropdown-menu li {

            position: relative;
        }

        .dropdown-menu .submenu {
            display: none;
            position: absolute;
            left: 100%;
            top: -7px;
        }

        .dropdown-menu .submenu-left {
            right: 100%;
            left: auto;
        }

        .dropdown-menu>li:hover {
            background-color: #f1f1f1
        }

        .dropdown-menu>li:hover>.submenu {
            display: block;
        }
    </style>

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
                <h2 class="text-white">RECETAS</h2>
            </div>
        </div>
    </div>

    <br><br><br>
    
    <div class="container-fluid">
        <div class="row justify-content-around">
            <div class="col-md-7">
                <center><h2 style="font-weight:700;">CREMA DE CHAMPIÑONES</h2></center>
                <br>
                <div><img src="https://deslumbrantes.com.bo/wp-content/uploads/2020/07/crema-champinones.jpg" alt="" width="100%" height="500" /></div>
                <div>&nbsp;</div>
                <div>6 Porciones</div>
                <div>Tiempo de preparaci&oacute;n: 25 minutos</div>
                <div>&nbsp;</div>
                <div><strong>INGREDIENTES</strong></div>
                <ul>
                    <li>500 gramos de champi&ntilde;ones frescos o de lata.</li>
                    <li>2 Cucharadas de mantequilla.</li>
                    <li>3 Cucharadas de cebolla picada.</li>
                    <li>1 Cucharada de f&eacute;cula de ma&iacute;z.</li>
                    <li>1 L de leche.</li>
                    <li>2 ramitas de perejil.</li>
                    <li>Sal y pimienta al gusto.</li>
                </ul>
                <div><strong>PREPARACI&Oacute;N</strong></div>
                <ol>
                    <li>En la Cacerola cocer los Champi&ntilde;ones en agua y licuarlos en 2 tazas del agua en la que se cocieron. Si utilizas champi&ntilde;ones de lata, escurrir y licuar en agua limpia.</li>
                    <li>Derretir la mantequilla en la Cacerola a fuego medio. Agregar la cebolla picada en el mini Chef y sofre&iacute;r hasta que se vea transparente, a&ntilde;adir la f&eacute;cula de ma&iacute;z y cocinar moviendo constantemente hasta que tome un tono ligeramente dorado.</li>
                    <li>Verter el licuado de champi&ntilde;ones, seguir moviendo y a&ntilde;adir la leche con el perejil, cocinar moviendo constantemente hasta que haya hervido durante 5 minutos.</li>
                    <li>Sazonar con sal y pimienta.</li>
                </ol>
            </div>
            <div class="col-md-3">

                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ftupperwareperuoficial&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=543564153315944" width="100%" height="450" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>
        </div>
    </div>

    <br>
    <br>
    <div class="d-flex justify-content-center"><a href="/recetas"><button class="btn btn-primary float-right"><i class="fas fa-chevron-double-left"></i>&nbsp;&nbsp;Regresar</button></a></div>
    <br><br><br>

    <?php include_once PATH_ROOT . '/views/web/partials/footer.php'; ?>
</body>

</html>