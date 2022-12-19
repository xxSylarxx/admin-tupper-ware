<footer class="container-fluid p-0 pt-4 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 my-auto">
            <img src="<?= PATH_PUBLIC ?>/img/icons/logo_m_blanco.png" class="img-fluid" alt="">
            </div>
            <div class="col-lg-4">
                <p style="text-align:center;color:white;">Oficina Central</p>

                <p style="text-align:center;color:white;"><?= $dataEmpresa['direccion'] ?></p>
                <a href="mailto:<?= $dataEmpresa['correo1'] ?>" style="display:flex;justify-content:center;text-align:center;color:white;word-break:break-word;" target="_blank">Email:<?= $dataEmpresa['correo1'] ?></a>
            </div>
            <div class="col-lg-4">
                <img src="<?= PATH_PUBLIC ?>/img/icons/juntos.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>
    <hr class="p-0 m-0">
    <p style="text-align:center;color:white;padding:10px 0px 15px 0px;margin:0;">Copyright © 2022 | Tupperware |&nbsp;<a href="https://www.cubicol.pe/" target="_blank" style="color:white;">Desarrollado por Sensfot Solutions</a> </p>

</footer>