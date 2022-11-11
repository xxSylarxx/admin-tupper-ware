<?php

use Admin\Core\Controller;
use Admin\Core\View;
use Admin\Models\GaleriasModel;

class Galerias extends Controller
{
    function __construct()
    {
        parent::sesionActiva();
    }

    public function index()
    {
        $objGalerias = new GaleriasModel();
        $listGalerias = $objGalerias->listarGalerias();
        $view = new View();
        $view->setName(__CLASS__);
        $view->setVariable('listGalerias', $listGalerias);
        $view->render("galerias/index");
    }


    public function editor($params)
    {
        $objGalerias = new GaleriasModel();
        if (!is_null($params)) {
            $idgaleria = $params[0];
            $dataGaleria = $objGalerias->buscarGaleria($idgaleria);
            $dataGaleria['action'] = 'actualizar';
        } else {
            $dataGaleria = $objGalerias->datosDefault();
            $dataGaleria['action'] = 'guardar';
        }
        $view = new View();
        $view->setName(__CLASS__);
        $view->setVariable('galeria', $dataGaleria);
        $view->render("galerias/editor");
    }

    public function guardar()
    {
        if (parent::isPost()) {
            $params = parent::postAll();
            unset($params['idgaleria']);
            $objGalerias = new GaleriasModel();
            $resp = $objGalerias->insertarGaleria($params);
            if ($resp) {
                echo 'OK';
            }
        } else {
            die('Error, the request could not be processed');
        }
    }

    public function actualizar()
    {
        if (parent::isPost()) {
            $params = parent::postAll();
            $idGaleria = parent::getPost('idgaleria');
            unset($params['idgaleria']);
            $objGalerias = new GaleriasModel();
            $resp = $objGalerias->actualizarGaleria($params, $idGaleria);
            if ($resp == '1' || $resp == '0') {
                echo 'OK';
            }
        } else {
            die('Error, the request could not be processed');
        }
    }

    public function eliminar($params)
    {
        $idgaleria = isset($params[0]) ? $params[0] : null;
        if (!is_null($idgaleria)) {
            $objGalerias = new GaleriasModel();
            $resp = $objGalerias->eliminarGaleria($idgaleria);
            if ($resp == '1' || $resp == '0') {
                echo 'OK';
            }
        } else {
            die('Error, the request could not be processed');
        }
    }

    public function estado($params)
    {
        $idgaleria = isset($params[0]) ? $params[0] : null;
        $estado = isset($params[1]) ? $params[1] : null;
        if (!is_null($idgaleria)) {
            $objPublicaciones = new GaleriasModel();
            $resp = $objPublicaciones->actualizarEstado($estado, $idgaleria);
            if ($resp == '1' || $resp == '0') {
                echo 'OK';
            }
        } else {
            die('Error, the request could not be processed');
        }
    }
}
