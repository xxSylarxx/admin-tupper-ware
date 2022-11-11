<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex" />
    <title>ADMIN - <?= mb_strtoupper(EMPRESA, 'UTF-8') ?></title>
    <link rel="shortcut icon" href="<?= PATH_PUBLIC ?>/img/icons/escudo.png" type="image/png">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="<?= PATH_PUBLIC ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= PATH_PUBLIC ?>/css/admin.css">
    <link rel="stylesheet" href="<?= PATH_PUBLIC ?>/css/sweetalert2.min.css">
</head>

<body>

    <script async src="<?= PATH_PUBLIC ?>/js/sweetalert2.min.js"></script>

    <?php include_once PATH_ROOT . '/views/admin/header.php'; ?>
    <?php include_once PATH_ROOT . '/views/admin/menu.php'; ?>

    <style>
        div.crop img {
            width: 100%;
            height: 210px;
            object-fit: cover;
        }

        div.grid-gallery {
            width: 100%;
            display: inline-flex;
            flex-wrap: wrap;
        }

        div.grid-gallery div.card-gallery {
            width: calc(100% / 4);
        }

        div.card {
            background-color: rgb(246, 246, 246);
        }

        div.card-footer {
            background: transparent;
        }

        div.card-footer button.btn {
            min-width: 33px;
            min-height: 33px;
            width: 33px;
            height: 33px;
            padding: 0px;
        }

        div.card-footer button.btn:hover {
            color: white;
        }

        a.pub-titulo {
            font-size: 15px;
            max-height: 70px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        @media only screen and (max-width: 1560px) {
            div.grid-gallery div.card-gallery {
                width: calc(100% / 3);
            }
        }
    </style>

    <section class="content" id="app">

        <div id="preloader">
            <div class="loading">
                <div class="circle"></div>
            </div>
        </div>

        <div class="d-flex align-items-center">
            <div class="tab-titulo">
                <?= $this->translate('GALERÍAS') ?>
            </div>
            <div class="ms-auto">
                <a href="/admin/galerias/editor" class="btn btn-success text-white"><i class="fas fa-plus"></i>&nbsp; Crear Galería</a>
            </div>
        </div>
        <hr>
        <?php if (empty($this->listGalerias)) { ?>
            <div class="text-center pt-3">
                <h5 class="text-muted">No se encontrarón resultados</h5>
            </div>
        <?php } ?>
        <div class="grid-gallery">
            <?php
            foreach ($this->listGalerias as $key => $val) : ?>
                <div class="card-gallery my-2 px-2 py-1" id="gal_<?= $val['idgaleria'] ?>">
                    <div class="card shadow-sm h-100">
                        <div class="crop">
                            <?php if (!empty($val['portada'])) { ?>
                                <img src="<?= $val['portada'] ?>" onerror="this.src = `/public/img/icons/portada-default.png`">
                            <?php } else { ?>
                                <img src="/public/img/icons/portada_galeria.jpg">
                            <?php } ?>
                        </div>
                        <div class="card-body border-top">
                            <a href="/galeria/<?= $val['idgaleria'] ?>" class="pub-titulo text-uppercase mb-2" target="_blank"><?= $val['titulo'] ?></a>
                            <div><i class="far fa-calendar-alt"></i> <?= \Admin\Core\Funciones::obtenerFecha($val['fecreg']) ?></div>
                        </div>
                        <div class="card-footer d-flex align-items-center" style="padding-top: 12px; padding-bottom: 12px;">
                            <button class="btn btn-outline-success me-2" onclick="location.href = '/admin/galerias/editor/<?= $val['idgaleria'] ?>'" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-outline-danger" onclick="eliminarGaleria('<?= $val['idgaleria'] ?>')" title="Eliminar"><i class="far fa-trash-alt"></i></button>
                            <div class="ms-auto d-flex">
                                <label class="form-check-label me-1" style="padding-top: 1px; cursor: pointer;" for="check-<?= $val['idgaleria'] ?>"><?= $this->translate('Visible') ?></label>
                                <input class="form-check-input ms-1" type="checkbox" id="check-<?= $val['idgaleria'] ?>" onclick="cambiarEstado('<?= $val['idgaleria'] ?>')" style="border-radius: 2px; transform: scale(1.1); cursor: pointer;" <?= $val['visible'] == 'S' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <hr>
        <div class="row pb-4 align-items-center pt-1">
            <div class="col-sm-2" style="margin-top: -5px;">
                &nbsp; Total de registros : &nbsp; <span id="spn_total"></span>
            </div>
        </div>
    </section>

    <script>
        let galleryT = <?= count($this->listGalerias) ?>;
        document.getElementById('spn_total').innerText = galleryT;

        const sweetAlert = (mensaje, icon) => {
            Swal.fire({
                icon: icon,
                text: mensaje,
            });
        }

        const eliminarGaleria = (idgaleria) => {
            Swal.fire({
                icon: 'question',
                text: '¿Está seguro de eliminar esta galería?',
                showDenyButton: true,
                allowOutsideClick: false,
                confirmButtonText: 'Aceptar',
                denyButtonText: 'Cancelar',
            }).then(async (result) => {
                if (result.isConfirmed) {
                    const url = `/admin/galerias/eliminar/${idgaleria}`;
                    fetch(url, {
                        method: 'GET'
                    }).then(function(res) {
                        return res.text();
                    }).then(function(res) {
                        if (res.trim() == 'OK') {
                            document.getElementById('gal_' + idgaleria).remove();
                            galleryT -= 1;
                            document.getElementById('spn_total').innerText = galleryT;
                            sweetAlert('Galería eliminada', 'success');
                        } else {
                            sweetAlert(res, 'error');
                        }
                    });
                }
            });
        }

        const cambiarEstado = (idgaleria) => {
            const estado = document.getElementById('check-' + idgaleria).checked;
            const url = `/admin/galerias/estado/${idgaleria}/${estado ? 'S' : 'N'}`;
            fetch(url, {
                method: 'GET'
            }).then(function(res) {
                return res.text();
            }).then(function(res) {
                if (res.trim() !== 'OK') {
                    sweetAlert(res, 'error');
                }
            });
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