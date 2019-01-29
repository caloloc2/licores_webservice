<?php 

require 'meta.php';

$items = Meta::Consulta("SELECT * FROM pedidos ORDER BY id_pedido ASC");

if (count($items)>0){
    foreach ($items as $linea) {
		$respuesta[] = $linea;
	}
}

echo json_encode($respuesta);