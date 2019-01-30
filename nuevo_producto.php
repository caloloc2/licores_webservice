<?php 

require 'meta.php';

$resp['estado'] = false;

try{    
    $nombre = $_REQUEST['nombre'];
    $valor = $_REQUEST['precio'];
    $stock = $_REQUEST['stock'];
    $imagen = $_REQUEST['imagen'];

    if ($imagen==''){
        $imagen = 'http://www.selectsupportpartnerships.com/wp-content/themes/selectsupport4u/images/template/no-image-100x100.gif';
    }

    $np = Meta::Nuevo_Producto($nombre, $valor, $stock, $imagen, 0);    
    
    $resp['estado'] = true;
}catch(Exception $e){

}

$respuesta[] = $resp;

echo json_encode($respuesta);