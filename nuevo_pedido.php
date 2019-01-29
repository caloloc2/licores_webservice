<?php 

require 'meta.php';

$fecha = date('Y-m-d');
$hora = date('H:i:s');

$respuesta['estado'] = false;

try{
    $info = $_REQUEST;
    $detalle = $_REQUEST['detalle'];

    $np = Meta::Nuevo_Pedido($info['nombre'], $info['direccion'], $info['retira_local'], $info['forma_pago'], $fecha, $hora, 0);
    $idnp = Meta::Consulta_Unico("SELECT id_pedido FROM pedidos ORDER BY id_pedido DESC LIMIT 1");

    if (count($detalle)>0){
        if ($idnp['id_pedido']!=''){
            $descompone = explode("**", $detalle);
            foreach ($descompone as $linea) {
                if ($linea!=''){
                    $valores = explode("//", $linea);
                    $id_pedido = $idnp['id_pedido'];
                    $id_item = $valores[0];
                    $cantidad = $valores[1];
                    
                    $npd = Meta::Nuevo_Pedido_Detalle($id_pedido, $id_item, $cantidad);
                }                
            }

            
        }
    }
    
    $respuesta['estado'] = true;
}catch(Exception $e){

}

echo json_encode($respuesta);