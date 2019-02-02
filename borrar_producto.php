<?php 

require 'meta.php';

$id_producto = $_REQUEST['id_producto'];

$items = Meta::Consulta_Unico("SELECT * FROM productos WHERE id_producto=".$id_producto);

$data['estado'] = 0;

if ($items['id_producto']!=''){
    $eliminar = Meta::Ejecutar_Sentencia("DELETE FROM productos WHERE id_producto=".$id_producto);
    $data['estado'] = 1;	
}

$respuesta[] = $data;

echo json_encode($respuesta);