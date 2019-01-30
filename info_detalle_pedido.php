<?php 

require 'meta.php';

$id_pedido = $_REQUEST['id_pedido'];

$items = Meta::Consulta("SELECT * FROM pedidos_detalle D, productos P WHERE (D.id_pedido=".$id_pedido.") AND (D.id_item=P.id_producto) ORDER BY D.id_pedido_detalle ASC");

if (count($items)){
    foreach ($items as $linea) {
        $respuesta[] = $linea;
    }
}

echo json_encode($respuesta);