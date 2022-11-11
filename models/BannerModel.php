<?php

namespace Admin\Models;

use Admin\Core\DataBase;

class BannerModel extends DataBase
{

    private $bd;

    function __construct()
    {
        $this->bd = parent::connect();
    }

    public function actualizarBanner(array $params, $id = 1)
    {
        try {
            $query = $this->bd->update('banner')->set($params)->where('id', $id);
            $res = $query->execute();
            return $res;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function listarBanner()
    {
        try {
            $query = $this->bd->from('banner')->fetch();
            if (is_array($query)) {
                return $query;
            }
            return null;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function listBannerInWeb()
    {
        try {
            $query = $this->bd->from('banner')->fetch();
            if (is_array($query)) {
                if ($query['tipo'] == 'slider') {
                    $query['cuerpo'] = json_decode($query['cuerpo'], true);
                }
                $query['opciones'] = json_decode($query['opciones'], true);
                return $query;
            }
            return null;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}
