<?php 

require 'meta.php';

$id_pedido = $_REQUEST['id_pedido'];

$items = Meta::Consulta_Unico("SELECT * FROM pedidos WHERE id_pedido=".$id_pedido);

if ($items['id_pedido']!=''){
	$respuesta[] = $items;
}

echo json_encode($respuesta);