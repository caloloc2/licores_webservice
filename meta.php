<?php

/**
 * Representa el la estructura de las metas
 * almacenadas en la base de datos
 */
require 'conexion.php';

class Meta
{
    function __construct()
    {
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function Consulta($sql)
    {
        $consulta = $sql;
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function Ejecutar($sql) {
        // Consulta de la meta
        $consulta = $sql;

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();
                        
            return 1;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function Consulta_Unico($sql) {
        // Consulta de la meta
        $consulta = $sql;

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Ejecutar_Sentencia($sql)
    {
        try{

            // Sentencia INSERT
            $comando = $sql;

            // Preparar la sentencia
            $sentencia = Database::getInstance()->getDb()->prepare($comando);

            return $sentencia->execute();

            return 1;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
        

    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function Actualizar_Campo($tabla, $campo, $valor, $id, $id_valida)
    {
        // Sentencia DELETE
        $comando = "UPDATE ".$tabla." SET ".$campo."=? WHERE ".$id."= ?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($valor, $id_valida));
    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nuevo_Pedido($nombre, $direccion, $retira_local, $forma_pago, $fecha, $hora, $estado)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO pedidos (nombre, direccion, retira_local, forma_pago, fecha, hora, estado) VALUES (?,?,?,?,?,?,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($nombre, $direccion, $retira_local, $forma_pago, $fecha, $hora, $estado));

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nuevo_Pedido_Detalle($id_pedido, $id_item, $cantidad)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO pedidos_detalle (id_pedido, id_item, cantidad) VALUES (?,?,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id_pedido, $id_item, $cantidad));

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nuevo_Producto($nombre, $valor, $stock, $imagen, $estado)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO productos (nombre, valor, stock, imagen, estado) VALUES (?,?,?,?,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($nombre, $valor, $stock, $imagen, $estado));

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nuevo_Usuario($nombres, $direccion, $tipo_usuario, $usuario, $clave)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO usuarios (nombres, direccion, tipo_usuario, usuario, clave) VALUES (?,?,?,?,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($nombres, $direccion, $tipo_usuario, $usuario, $clave));

    }
}

?>