<?php 

require 'meta.php';

$items = Meta::Consulta("SELECT * FROM productos ORDER BY id_producto ASC");

if (count($items)>0){
    foreach ($items as $linea) {
		$respuesta[] = $linea;
	}
}

echo json_encode($respuesta);