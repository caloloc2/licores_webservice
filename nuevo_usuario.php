<?php 

require 'meta.php';

$resp['estado'] = 0;

try{    
    $nombres = $_REQUEST['nombres'];
    $direccion = $_REQUEST['direccion'];
    $usuario = $_REQUEST['usuario'];
    $clave = $_REQUEST['clave'];
    $tipo_usuario = 0;

    $consulta = Meta::Consulta_Unico("SELECT * FROM usuarios WHERE usuario='".$usuario."'");

    if ($consulta['usuario']==''){
        $nu = Meta::Nuevo_Usuario($nombres, $direccion, $tipo_usuario, $usuario, $clave);    
        $resp['estado'] = 1;
    }else{
        $resp['estado'] = 2;
    }
    
}catch(Exception $e){

}

$respuesta[] = $resp;

echo json_encode($respuesta);