<?php

namespace Admin\Models;

use Admin\Core\DataBase;

class GaleriasModel extends DataBase
{

    private $bd;

    function __construct()
    {
        $this->bd = parent::connect();
    }

    public function insertarGaleria(array $params)
    {
        try {
            $query = $this->bd->insertInto('galeria')->values($params);
            $res = $query->execute();
            return $res;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function actualizarGaleria(array $params, $idGaleria)
    {
        try {
            $query = $this->bd->update('galeria')->set($params)->where('idgaleria', $idGaleria);
            $res = $query->execute();
            return $res;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function eliminarGaleria($idpub)
    {
        try {
            $query = $this->bd->deleteFrom('galeria')->where('idgaleria', $idpub);
            $res = $query->execute();
            return $res;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function buscarGaleria($idGaleria)
    {
        try {
            $query = $this->bd->from('galeria')->where('idgaleria', [$idGaleria])->fetch();
            if (is_array($query)) {
                return $query;
            }
            return null;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function listarGalerias()
    {
        try {
            $query = $this->bd->from('galeria')->orderBy('fecreg DESC')->fetchAll();
            if (is_array($query)) {
                return $query;
            }
            return array();
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function listGaleriasInWeb()
    {
        try {
            $query = $this->bd->from('galeria')->where("visible = 'S'")->orderBy('fecreg DESC')->fetchAll();
            if (is_array($query)) {
                return $query;
            }
            return array();
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function actualizarEstado(string $estado, $idGaleria)
    {
        try {
            $query = $this->bd->update('galeria')->set(array('visible' => $estado))->where('idgaleria', $idGaleria);
            $res = $query->execute();
            return $res;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function datosDefault()
    {
        return array(
            'idgaleria' => null,
            'titulo' => null,
            'detalle' => null,
            'ncolum' => 4,
            'cuerpo' => '[]',
            'modo' => 'A',
            'portada' => null
        );
    }
}
