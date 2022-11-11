<?php 
use Admin\Models;

$objEmpresa = new Models\EmpresaModel;
$objGalerias = new Models\GaleriasModel;
$dataEmpresa = $objEmpresa->listEmpresa()[1];
$dataGalerias = $objGalerias->listGaleriasInWeb();
echo '<pre>';
print_r($dataGalerias);
?>