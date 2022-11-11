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
    <script src="<?= PATH_PUBLIC ?>/js/vue.min.js"></script>

    <?php include_once PATH_ROOT . '/views/admin/header.php'; ?>
    <?php include_once PATH_ROOT . '/views/admin/menu.php'; ?>

    <!-- ESTILOS -->
    <style>
        #fileupload {
            display: none;
        }

        .list-group-item {
            border: none;
            line-height: 28px;
        }

        .list-group-item.active {
            background-color: var(--color3);
            border-radius: 2px;
            cursor: pointer;
        }

        .list-group-item:not(.active):hover {
            cursor: pointer;
            background-color: rgb(239, 239, 239);
            border-radius: 2px;
        }

        td>.btn-sm {
            width: 32px;
            height: 32px;
        }
    </style>

    <!-- CUERPO -->
    <section class="content" id="app">
        <div id="preloader">
            <div class="loading">
                <div class="circle"></div>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-between">
            <div class="tab-titulo ">
                <?= $this->translate('SUSCRIPCIONES') ?>
                <span style="margin-left:60px;"><?= $this->translate('Total&nbsp;&nbsp;:&nbsp;&nbsp;') ?></span>
                <?= $this->contCorreos ?>

            </div>

            <a href="/admin/correos/excel"><button class="btn btn-success text-white">
                    <i class="fas fa-file-excel text-white"></i>&nbsp;&nbsp;&nbsp;Exportar datos a Excel
                </button></a>

        </div>
        <hr>

        <div class="table-responsive">
            <table id="tabla" class="table">
                <thead>
                    <tr>
                        <th style="font-size: 13px;"><?= $this->translate('ITEM') ?></th>
                        <th style="font-size: 13px;"><?= $this->translate('NOMBRES') ?></th>
                        <th style="font-size: 13px;"><?= $this->translate('CORREOS') ?></th>
                        <th style="font-size: 13px;"><?= $this->translate('FECHA DE SUSCRIPCIÓN') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($this->listCorreos as $key => $val) : ?>
                        <tr>
                            <td><i class="fas fa-mail-bulk"></i></td>
                            <td><a target="_blank"><?= $val['nombres'] ?></a></td>
                            <td><a target="_blank"><?= $val['correos'] ?></a></td>
                            <td><a target="_blank"><?= $val['fecsuscripcion'] ?></a></td>

                        </tr>
                    <?php endforeach; ?>

                    <!-- <td class="text-center">
                                    <button class="btn btn-outline-secondary btn-sm" title="Copiar enlace" @click="copiarEnlace(item.path)"><i class="far fa-copy"></i></button>
                                    <a :href="item.path" class="btn btn-outline-info btn-sm mx-1" title="Descargar" :download="item.name"><i class="fas fa-arrow-down"></i></a>
                                    <button class="btn btn-outline-danger btn-sm" title="Eliminar" @click="eliminarArchivo(item.path)" :disabled="item.remove"><i class="far fa-trash-alt"></i></button>
                                </td> -->

                    <!-- <tr v-show="filterFiles.length == 0">
                                <td colspan="5" class="text-center"><?= $this->translate('No se encontraron resultados') ?></td>
                            </tr> -->
                </tbody>
            </table>
        </div>

    </section>



    <script>
        new Vue({
            el: '#app',
            data: () => {
                return {
                    files_list: [],
                    filesObj: {
                        key: 0,
                        path: 'img/galeria/',
                        accept: '.png, .jpg, .jpeg'
                    },
                    files_buscar: ''
                }
            },
            created() {
                this.listarArchivos(this.filesObj.path, this.filesObj.key, this.filesObj.accept);
            },
            computed: {
                filterFiles: function() {
                    return this.files_list.filter(file => file.name.match(this.files_buscar));
                }
            },
            methods: {
                listarArchivos(path, key, accept) {
                    this.cambiarClass(key);
                    this.filesObj.path = path;
                    this.filesObj.key = key;
                    this.filesObj.accept = accept;
                    document.getElementById('fileupload').setAttribute("accept", accept);
                    const vue = this;
                    const data = new FormData();
                    data.append('path', path);
                    fetch('/admin/archivos/listar', {
                        method: 'POST',
                        body: data
                    }).then(function(res) {
                        return res.text();
                    }).then(function(res) {
                        try {
                            vue.files_list = JSON.parse(res);
                        } catch (error) {
                            vue.sweetAlert(res, 'error');
                        }
                    });
                },
                cargarArchivo() {
                    const vue = this;
                    const uri = "/admin/archivos/guardar";
                    const fileup = document.getElementById("fileupload").files[0];
                    const sizekb = parseInt(fileup.size / 1024);
                    if (sizekb > 92000) {
                        this.sweetAlert("<?= $this->translate('El archivo supera el límite del peso permitido, Max(12MB)') ?>", "warning");
                    } else {
                        document.getElementById("fileupload").disabled = true;
                        const http = new XMLHttpRequest();
                        const data = new FormData();
                        const fileName = this.formatName(fileup.name);
                        http.open("post", uri);
                        data.append("file_path", this.filesObj.path);
                        data.append("file_name", fileName);
                        data.append("archivo", fileup);
                        http.upload.addEventListener("progress", function(e) {
                            let status = Math.round((e.loaded / e.total) * 100);
                            document.getElementById("load-text").innerText = "<?= $this->translate('Subiendo') ?> " + status + "%";
                        });
                        http.addEventListener("load", function() {
                            let res = http.responseText;
                            document.getElementById("load-text").innerText = "<?= $this->translate('Subir archivos') ?>";
                            document.getElementById("fileupload").disabled = false;
                            if (res.trim() == 'OK') {
                                vue.listarArchivos(vue.filesObj.path, vue.filesObj.key)
                                vue.sweetAlert('<?= $this->translate('Archivo subido correctamente') ?>', 'success');
                            } else {
                                vue.sweetAlert(res, 'error');
                            }
                        });
                        http.send(data);
                    }
                },
                eliminarArchivo(path) {
                    let vue = this;
                    Swal.fire({
                        icon: 'question',
                        text: '<?php echo $this->translate('¿Está seguro de eliminar este archivo?'); ?>',
                        showDenyButton: true,
                        allowOutsideClick: false,
                        confirmButtonText: '<?php echo $this->translate('Aceptar'); ?>',
                        denyButtonText: '<?php echo $this->translate('Cancelar'); ?>',
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            const data = new FormData();
                            data.append("file_path", path);
                            fetch('/admin/archivos/eliminar', {
                                method: 'POST',
                                body: data
                            }).then(function(res) {
                                return res.text();
                            }).then(function(res) {
                                if (res.trim() == "OK") {
                                    vue.listarArchivos(vue.filesObj.path, vue.filesObj.key);
                                    vue.sweetAlert("<?php echo $this->translate('Archivo eliminado'); ?>", "success");
                                } else {
                                    vue.sweetAlert(res, "error");
                                }
                            });
                        }
                    });
                },
                formatName(str) {
                    str = str.replace(/\s+/g, '-');
                    str = str.normalize("NFD").replace(/[\u0300-\u036f]/g, '');
                    return str;
                },
                copiarEnlace(path) {
                    let link = location.origin + path;
                    let aux = document.createElement("input");
                    aux.setAttribute("value", link);
                    document.body.append(aux);
                    aux.select();
                    document.execCommand("copy");
                    aux.remove();
                    this.sweetAlert("<?= $this->translate('Enlace copiado al portapapeles'); ?>", "success");
                },
                cambiarClass(key) {
                    let items = document.querySelectorAll('.list-group-item');
                    items.forEach((element, index) => {
                        if (index == key) {
                            element.classList.add('active');
                        } else {
                            element.classList.remove('active');
                        }
                    });
                },
                sweetAlert(mensaje, icon) {
                    Swal.fire({
                        icon: icon,
                        text: mensaje,
                    });
                }
            }
        });
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