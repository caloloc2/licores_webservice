<?php 



if ((isset($_REQUEST['id_usuario']))&&(!empty($_REQUEST['id_usuario']))){
		$id_usuario = $_REQUEST['id_usuario'];

		require 'meta.php';

		$items = Meta::Consulta("SELECT * FROM pedidos WHERE id_usuario=".$id_usuario." ORDER BY id_pedido ASC");

		if (count($items)>0){
				foreach ($items as $linea) {
				$respuesta[] = $linea;
			}
		}
}

echo json_encode($respuesta);