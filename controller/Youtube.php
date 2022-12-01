<?php

use Admin\Core\Controller;
use Admin\Core\View;
use Admin\Models\YoutubeModel;

class Youtube extends Controller
{

    function __construct()
    {
        parent::sesionActiva();
    }

    public function index()
    {
        $objEmpresa = new YoutubeModel();
        $listEmpresa = $objEmpresa->listEmpresa();
        $idemp = parent::getPost('id', '1');
        $empresa = $listEmpresa[$idemp];
        $locales = $this->listarLocales($listEmpresa);
        $view = new View();
        $view->setName(__CLASS__);
        $view->setVariable('locales', $locales);
        $view->setVariable('videosy', $empresa);
        $view->render('youtube/index');
    }

    public function actualizar()
    {
        if (parent::isPost()) {
            $objEmpresa = new YoutubeModel();
            $params = parent::postAll();
            $idemp = parent::getPost('id');
            unset($params['id']);
            $resp = $objEmpresa->actualizarEmp($params, $idemp);
            if ($resp == '1' || $resp == '0') :
                echo 'OK';
            endif;
        }
    }

    private function listarLocales($list)
    {
        $locales = array();
        foreach ($list as $local) {
            $locales[] = $local['id'];
        }
        return $locales;
    }
}
