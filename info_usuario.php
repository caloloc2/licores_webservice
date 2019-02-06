<?php 

require 'meta.php';

$usuario = $_REQUEST['usuario'];
$clave = $_REQUEST['clave'];

$items = Meta::Consulta_Unico("SELECT * FROM usuarios WHERE (usuario='".$usuario."') AND (clave='".$clave."')");

if ($items['id_usuario']!=''){
	$respuesta[] = $items;
}else{
    $dato['id_usuario'] = 0;
    $respuesta[] = $dato;
}

echo json_encode($respuesta);