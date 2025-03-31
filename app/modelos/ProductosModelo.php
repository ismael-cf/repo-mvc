<?php
class ProductosModelo
{
    private $obj_mySQLdb;

    // Constructor: Instancia la clase MySQLdb para realizar consultas a la base de datos
    function __construct()
    {
        $this->obj_mySQLdb = new MySQLdb();  // Instanciamos la conexión con la base de datos
    }

    // Obtener todos los productos
    public function getProductos()
    {
        $sql = "SELECT * FROM productos";  // Consulta para obtener todos los productos
        return $this->obj_mySQLdb->querySelect($sql);  // Ejecutar consulta y retornar los resultados
    }

    // Obtener un solo producto por su ID
    public function getProductoById($id)
    {
        $sql = "SELECT * FROM productos WHERE id = $id";  // Consulta para obtener un producto por ID
        $result = $this->obj_mySQLdb->querySelect($sql);  // Ejecutar consulta y almacenar resultados
        return $result[0];  // Retornar el primer (y único) producto encontrado
    }

    // Insertar un nuevo producto en la base de datos
    public function guardarProducto($nombre, $marca, $talla, $color, $precio)
    {
        // Consulta para insertar un nuevo producto con los valores proporcionados
        $sql = "INSERT INTO productos (nombre, marca, talla, color, precio) 
                VALUES ('$nombre', '$marca', '$talla', '$color', '$precio')";
        $this->obj_mySQLdb->queryExecute($sql);  // Ejecutar la consulta de inserción
    }

    // Actualizar los detalles de un producto existente
    public function actualizarProducto($id, $nombre, $marca, $talla, $color, $precio)
    {
        // Consulta para actualizar el producto con los nuevos valores proporcionados
        $sql = "UPDATE productos SET 
                nombre = '$nombre', 
                marca = '$marca', 
                talla = '$talla', 
                color = '$color', 
                precio = '$precio' 
                WHERE id = $id";
        return $this->obj_mySQLdb->queryExecute($sql);  // Ejecutar la consulta de actualización
    }

    // Eliminar un producto de la base de datos por su ID
    public function eliminarProducto($id)
    {
        $sql = "DELETE FROM productos WHERE id = $id";  // Consulta para eliminar el producto por su ID
        $this->obj_mySQLdb->queryExecute($sql);  // Ejecutar la consulta de eliminación
    }
}
?>
