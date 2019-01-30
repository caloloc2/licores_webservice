<?php 

require 'meta.php';

$resp['estado'] = 0;

try{    
    $id_item = $_REQUEST['id_item'];
    $cantidad = $_REQUEST['cantidad'];
    
    $consulta = Meta::Consulta_Unico("SELECT id_producto, stock FROM productos WHERE id_producto=".$id_item);

    if ($consulta['id_producto']!=''){
        $id = $consulta['id_producto'];
        $stock = $consulta['stock'];

        $nuevo_stock = intval($stock) + intval($cantidad);

        $actualiza = Meta::Actualizar_Campo('productos', 'stock', $nuevo_stock, 'id_producto', $id);
    }
    
    $resp['estado'] = 1;
}catch(Exception $e){

}

$respuesta[] = $resp;

echo json_encode($respuesta);