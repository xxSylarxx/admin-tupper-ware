<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex" />
    <title>ADMIN - <?= mb_strtoupper(EMPRESA, 'UTF-8') ?></title>
    <link rel="shortcut icon" href="<?= PATH_PUBLIC ?>/img/icons/icon.png" type="image/png">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="<?= PATH_PUBLIC ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= PATH_PUBLIC ?>/css/admin.css">
    <link rel="stylesheet" href="<?= PATH_PUBLIC ?>/css/sweetalert2.min.css">
</head>

<body>

    <script async src="<?= PATH_PUBLIC ?>/js/sweetalert2.min.js"></script>

    <?php include_once PATH_ROOT . '/views/admin/header.php'; ?>
    <?php include_once PATH_ROOT . '/views/admin/menu.php'; ?>

    <!-- ESTILOS -->
    <style>
        h5 {
            font-size: var(--fontsize);
            color: var(--color3);
        }

        h5.linea {
            position: relative;
            z-index: 1;
        }

        h5.linea:before {
            border-top: 1px solid rgb(190, 190, 190);
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            z-index: -1;
        }

        h5.linea span {
            background: #fff;
            padding: 0 15px 0px 4px;
        }
    </style>

    <!-- CUERPO -->
    <section class="content" id="app">

        <div id="preloader">
            <div class="loading">
                <div class="circle"></div>
            </div>
        </div>

        <form id="formEmpresa" onsubmit="actualizar(event)" onkeypress="return event.keyCode != 13;">
            <div class="d-flex align-items-center ">
                <div class="tab-titulo">
                    <?= $this->translate('VIDEOS YOUTUBE') ?>
                </div>
                <div class="ms-auto d-flex align-items-center">

                    <button class="btn btn-success text-white"><i class="fas fa-sync-alt"></i>&nbsp; <?= $this->translate('Actualizar') ?></button>
                </div>
            </div>
            <hr>
            <h5 class="linea mt-4 mb-2"><span><?= $this->translate('Enlaces') ?></span></h5>
            <div class="row px-2 d-flex justify-content-around">
                <div class="col-lg-5 my-2">
                    <label><?= $this->translate('Enlace de video 1') ?>:</label>
                    <input type="text" id="textenlace1" class="form-control mt-1" name="enlace1" value="<?= $this->videosy['enlace1'] ?>" onchange="modoYoutube(this.value)">
                    <br>
                    <div id="video-body1">
                        <?php
                        if ($this->videosy['enlace1']) { ?>
                            <div class="responsive" id="video-youtube"><iframe  width="100%" height="245" src="<?php echo $this->videosy['enlace1']?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                        <?php } else { ?>
                            <video src="<?php echo $this->videosy['enlace1'] ?>" id="video-src" width="100%" controls></video>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-5 my-2">
                    <label><?= $this->translate('Enlace de video 2') ?>:</label>
                    <input type="text" id="textenlace2" class="form-control mt-1" name="enlace2" value="<?= $this->videosy['enlace2'] ?> " onchange="modoYoutube2(this.value)">
                    <br>
                    <div id="video-body2">
                        <?php
                        if ($this->videosy['enlace2']) { ?>
                            <div class="responsive" id="video-youtube"><iframe  width="100%" height="245" src="<?php echo $this->videosy['enlace2']?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                        <?php } else { ?>
                            <video src="<?php echo $this->videosy['enlace2'] ?>" id="video-src" width="100%" controls></video>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <input type="hidden" name="id" value="<?php echo $this->videosy['id'] ?>">
        </form>
        <br>
    </section>

    <form id="formLocal" action="/admin/youtube" method="post">
        <input type="hidden" name="id" id="id">
    </form>

    <script>
        let path_video = `<?php echo $this->videosy['enlace1'] ?>`;

        const sweetAlert = (mensaje, icon) => {
            Swal.fire({
                icon: icon,
                text: mensaje,
            });
        }

        const cambiarLocal = (id) => {
            document.getElementById('id').value = id;
            document.getElementById('formLocal').submit();
        }

        const actualizar = (e) => {
            e.preventDefault();
            const form = new FormData(document.getElementById('formEmpresa'));
            fetch('/admin/youtube/actualizar', {
                method: 'POST',
                body: form
            }).then(function(res) {
                return res.text();
            }).then(function(res) {
                if (res.trim() == 'OK') {
                    sweetAlert('<?= $this->translate('Datos actualizados') ?>', 'success');
                } else {
                    sweetAlert(res, 'error');
                }
            });
        }

        const modoYoutube = (src) => {

            let videoId = src.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);
            if (videoId != null) {
                let embed = `https://www.youtube.com/embed/${videoId[1]}`;
                path_video = embed;
                /* let iframe = `<div class="responsive"><iframe src="${embed}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>`; */
                let iframe = ` <iframe width="100%" height="250" src="${embed}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
                document.getElementById('video-body1').innerHTML = iframe;
                document.getElementById('textenlace1').value = path_video;

            } else {
                sweetAlert('<?= $this->translate("Enlace no válido") ?>', 'warning');
            }
        }
        const modoYoutube2 = (src) => {

            let videoId = src.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);
            if (videoId != null) {
                let embed = `https://www.youtube.com/embed/${videoId[1]}`;
                path_video = embed;
                let iframe = ` <iframe width="100%" height="250" src="${embed}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
                document.getElementById('video-body2').innerHTML = iframe;
                document.getElementById('textenlace2').value = path_video;


            } else {
                sweetAlert('<?= $this->translate("Enlace no válido") ?>', 'warning');
            }
        }

        setTimeout(() => {
            let loader = document.getElementById('preloader');
            loader.style.opacity = '0';
            setTimeout(() => {
                loader.style.display = 'none';
            }, 500);
        }, 2500);
    </script>

</body>

</html>