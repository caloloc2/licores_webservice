<?php 

require 'meta.php';

$id_pedido = $_REQUEST['id_pedido'];

$items = Meta::Consulta_Unico("SELECT * FROM pedidos WHERE id_pedido=".$id_pedido);

if ($items['id_pedido']!=''){

	$detalle = Meta::Consulta("SELECT * FROM pedidos_detalle D, productos P WHERE (D.id_pedido=".$id_pedido.") AND (D.id_item=P.id_producto)");
	$verificador = 0;

	if (count($detalle)>0){
		foreach ($detalle as $linea) {
			$id_item = $linea['id_item'];
			$cantidad = $linea['cantidad'];
			$stock = $linea['stock'];

			$nuevo_stock = intval($stock) - intval($cantidad);
			if ($nuevo_stock<=0){
				$verificador += 1;
			}
		}

		if ($verificador==0){
			foreach ($detalle as $linea) {
				$id_item = $linea['id_item'];
				$cantidad = $linea['cantidad'];
				$stock = $linea['stock'];
	
				$nuevo_stock = intval($stock) - intval($cantidad);
				if ($nuevo_stock<1){
					$verificador += 1;
				}else{
					
				}
				$actualiza = Meta::Actualizar_Campo('productos', 'stock', $nuevo_stock, 'id_producto', $id_item);
			}
			$actualiza = Meta::Actualizar_Campo('pedidos', 'estado', 1, 'id_pedido', $id_pedido);
			$data['estado'] = 1;
			$respuesta[] = $data;
		}else{
			$data['estado'] = 0;
			$respuesta[] = $data;
		}
	}
}

echo json_encode($respuesta);