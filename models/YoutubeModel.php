<?php

namespace Admin\Models;

use Admin\Core\DataBase;

class YoutubeModel extends DataBase
{

    private $bd;

    function __construct()
    {
        $this->bd = parent::connect();
    }

    public function actualizarEmp(array $params, $idemp)
    {
        try {
            $query = $this->bd->update('videosy')->set($params)->where('id', $idemp);
            $res = $query->execute();
            return $res;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function listEmpresa()
    {
        try {
            $query = $this->bd->from('videosy')->fetchAll();
            $listEmpresa = array();
            foreach ($query as $row) {
                $key = $row['id'];
                $listEmpresa[$key] = $row;
            }
            return $listEmpresa;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function obtenerenlace1()
    {
        /* query = "SELECT RIGHT(enlace1,11) as enlace1 FROM videosy WHERE id = 1"; */
        try {
           $bd = new DataBase();
            $conn = $bd->connect(); 
            $query = $conn->from('videosy')->select(null)->select('enlace1')->fetch();
            return $query['enlace1'];
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function obtenerenlace2()
    {
       
        try {
           $bd = new DataBase();
            $conn = $bd->connect(); 
            $query = $conn->from('videosy')->select(null)->select('enlace2')->fetch();
            return $query['enlace2'];
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }


    public static function obtenerNombre()
    {
        try {
            $bd = new DataBase();
            $conn = $bd->connect();
            $query = $conn->from('videosy')->select(null)->select('enlace1')->fetch();
            return $query['enlace'];
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}
