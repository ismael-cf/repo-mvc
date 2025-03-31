<?php
class Productos extends Controlador
{
    private $objModelo; // Variable para almacenar el objeto del modelo

    // Constructor de la clase
    public function __construct()
    {
        // Cargar el modelo ProductosModelo
        $this->objModelo = $this->modelo('ProductosModelo');
    }

    // Mostrar la lista de productos
    public function index()
    {
        // Obtener los productos desde el modelo
        $data = $this->objModelo->getProductos();
        // Pasar los datos a la vista para mostrar la lista de productos
        $this->vista('ProductosVista', $data);
    }

    // Vista para dar de alta un nuevo producto
    public function alta()
    {
        // Cargar la vista para el formulario de alta de producto
        $this->vista('ProductosAltaVista');
    }

    // Guardar un nuevo producto en la base de datos
    public function guardarAlta()
    {
        // Comprobar si el formulario ha sido enviado por POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener los datos del formulario
            $nombre = $_POST['nombre'];
            $marca = $_POST['marca'];
            $talla = $_POST['talla'];
            $color = $_POST['color'];
            $precio = $_POST['precio'];
            
            // Llamar al método del modelo para guardar el producto
            $this->objModelo->guardarProducto($nombre, $marca, $talla, $color, $precio);
            
            // Redirigir a la lista de productos después de guardar
            header('Location: ' . RUTA_APP . 'productos');
        }
    }

    // Mostrar formulario para modificar un producto existente
    public function modificar($id)
    {
        // Obtener los datos del producto por su ID
        $data = $this->objModelo->getProductoById($id);
        // Pasar los datos a la vista para mostrar el formulario de modificación
        $this->vista('ProductosModificarVista', $data);
    }

    // Guardar los cambios realizados a un producto
    public function guardar($id)
    {
        // Comprobar si el formulario ha sido enviado por POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            // Obtener los datos del formulario
            $nombre = $_POST['nombre'];
            $marca = $_POST['marca'];
            $talla = $_POST['talla'];
            $color = $_POST['color'];
            $precio = $_POST['precio'];
            
            // Llamar al modelo para actualizar el producto con los nuevos datos
            $this->objModelo->actualizarProducto($id, $nombre, $marca, $talla, $color, $precio);
            
            // Redirigir a la lista de productos después de guardar los cambios
            header('Location: ' . RUTA_APP . 'productos');
        }
    }

    // Eliminar un producto
    public function borrar($id)
    {
        // Llamar al modelo para eliminar el producto por su ID
        $this->objModelo->eliminarProducto($id);
        // Redirigir a la lista de productos después de eliminar el producto
        header('Location: ' . RUTA_APP . 'productos');
    }
}
?>
