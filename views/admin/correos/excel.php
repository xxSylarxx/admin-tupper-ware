<?php

require_once ('./suscripcion/conbd.php');

/* $conex = mysqli_connect("localhost","root","","admin_v2");  */

$query=mysqli_query($conex, "SELECT * FROM correos ORDER BY idcorreo DESC") ;

$docu="Suscripciones.xls";
header('Content-type: application/vnd.ms-excel') ;
header('Content-Disposition: attachment; filename='.$docu) ;
header('Pragma: no-cache') ;
header('Expires:0');
echo'<table border=1>';
echo '<tr>';
echo '<th colspan=2>Reporte de Correos</th>' ;
echo '</tr>';
echo '<tr> <th>NOMBRES</th> <th>CORREOS</th> <th>FECHA</th></tr>' ;
while ($row=mysqli_fetch_array ($query)) {
echo '<tr>';
echo '<td> ' . $row[ 'nombres' ] . '</td> ';
echo '<td> ' .$row[ 'correos' ] . '</td> ';
echo '<td> ' .$row[ 'fecsuscripcion'] . '</td> ';
echo '</tr> ' ;
}
echo'</table> ';



