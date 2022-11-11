<?php

namespace Admin\Models;

class ArchivosModel
{

    public function guardarArchivo(array $file, string $ruta, string $file_name)
    {
        $path = PATH_ROOT . "/public/{$ruta}" . $file_name;
        if (in_array($file['type'], array('image/jpg', 'image/png', 'image/jpeg', 'image/webp'))) {
            if ($ruta !== 'img/banner/') {
                return $this->redimensionarImagen($file, $path);
            } else {
                return move_uploaded_file($file['tmp_name'], $path);
            }
        } else {
            return move_uploaded_file($file['tmp_name'], $path);
        }
    }

    public function eliminarArchivo(string $ruta)
    {
        $path = PATH_ROOT . $ruta;
        if (file_exists($path)) {
            if (unlink($path)) {
                return true;
            }
        }
        return false;
    }

    public function listarArchivos(string $ruta)
    {
        $path = PATH_ROOT . "/public/{$ruta}";
        if (!file_exists($path)) {
            die('La ruta de archivos no existe');
        }
        $dir = dir($path);
        $list = array();
        while (($file = $dir->read()) !== false) {
            if ($file != '..' && $file != '.') :
                $list[] = array(
                    "id" => rand(100, 99999),
                    "name" => utf8_encode($file),
                    "type" => pathinfo($file, PATHINFO_EXTENSION),
                    "size" => $this->obtenerSize($dir->path . $file),
                    "date" => date("d M Y H:i", filemtime($dir->path . $file)),
                    "time" => filemtime($dir->path . $file),
                    "path" => "/public/{$ruta}" . utf8_encode($file),
                    "icon" => $this->obtenerIcono(pathinfo($file, PATHINFO_EXTENSION)),
                    "remove" => $this->isRemoveFile(utf8_encode($file))
                );
            endif;
        }
        usort($list, function ($a, $b) {
            return $a['time'] < $b['time'];
        });
        return $list;
    }

    private function redimensionarImagen(array $file, string $ruta)
    {
        $max_width = 950;
        $max_height = 950;
        list($widht, $height) = getimagesize($file['tmp_name']);

        if ($widht >= $max_width) {
            if ($file['type'] == 'image/jpeg' || $file['type'] == 'image/jpg') {
                $imagenAux = imagecreatefromjpeg($file['tmp_name']);
            } else if ($file['type'] == 'image/png') {
                $imagenAux = imagecreatefrompng($file['tmp_name']);
            }

            $x_ratio = $max_width / $widht;
            $y_ratio = $max_height / $height;

            if (($widht <= $max_width) && ($widht <= $max_height)) {
                $ancho_final = $widht;
                $alto_final = $height;
            } elseif (($x_ratio * $height) < $max_height) {
                $alto_final = ceil($x_ratio * $height);
                $ancho_final = $max_width;
            } else {
                $ancho_final = ceil($y_ratio * $widht);
                $alto_final = $max_width;
            }

            $lienzo = imagecreatetruecolor($ancho_final, $alto_final);
            imagecopyresampled($lienzo, $imagenAux, 0, 0, 0, 0, $ancho_final, $alto_final, $widht, $height);

            if ($file['type'] == 'image/jpeg' || $file['type'] == 'image/jpg') {
                return imagejpeg($lienzo, $ruta);
            } else if ($file['type'] == 'image/png') {
                return imagepng($lienzo, $ruta);
            } else {
                die("El tipo de imagen no esta soportado");
            }
        } else {
            return move_uploaded_file($file['tmp_name'], $ruta);
        }
    }

    private function obtenerIcono($tipoFile)
    {
        $icono = 'far fa-file';
        switch ($tipoFile) {
            case 'pdf':
                $icono = 'far fa-file-pdf';
                break;
            case 'zip':
            case 'rar':
                $icono = 'far fa-file-archive';
                break;
            case 'mp4':
                $icono = 'fas fa-film';
                break;
            case 'docx':
                $icono = 'far fa-file-word';
                break;
            case 'mp3':
                $icono = 'fas fa-volume-down';
                break;
        }
        return $icono;
    }

    /** 
     * poner dentro del array
     * el nombre de los archivos que no se deben eliminar
     */
    private function isRemoveFile($file)
    {
        $list = array('1366_2000.jpeg');
        return in_array($file, $list);
    }

    private function obtenerSize($file)
    {
        $bytes = filesize($file);
        $label = array('B', 'KB', 'MB', 'GB');
        for ($i = 0; $bytes >= 1024 && $i < (count($label) - 1); $bytes /= 1024, $i++);
        return (round($bytes, 2) . ' ' . $label[$i]);
    }
}
