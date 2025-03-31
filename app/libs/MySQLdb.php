<?php
class MySQLdb
{
    // Parámetros de conexión a la base de datos
    private $host = "127.0.0.1";  // Dirección del servidor de la base de datos
    private $usuario = "root";    // Usuario de la base de datos
    private $clave = "";          // Contraseña del usuario de la base de datos
    private $db = "tienda";       // Nombre de la base de datos para la tienda de tenis
    private $conn;                // Variable para la conexión a la base de datos

    // Constructor: se encarga de establecer la conexión con la base de datos
    function __construct()
    {
        // Crear la conexión con la base de datos
        $this->conn = mysqli_connect($this->host, $this->usuario, $this->clave, $this->db);
        
        // Verificar si hubo un error al conectar
        if (mysqli_connect_errno()) {
            // Si hay un error, mostrar mensaje y salir
            printf("Error en la conexión con la base de datos: %s", mysqli_connect_errno());
            exit();
        }

        // Establecer el conjunto de caracteres a UTF-8 para soportar caracteres especiales
        if (!mysqli_set_charset($this->conn, "utf8")) {
            // Si falla la conversión, mostrar el error y salir
            printf("Error en la conversión de caracteres: %s", mysqli_error($this->conn));
            exit();
        }
    }

    /* Método para ejecutar consultas SELECT (retorna un recordSet) */
    public function querySelect($sql)
    {
        $data = array(); // Arreglo para almacenar los resultados de la consulta
        $r = $this->conn->query($sql); // Ejecutar la consulta SELECT

        // Iterar sobre los resultados y agregar cada fila al arreglo
        while ($row = mysqli_fetch_assoc($r)) {
            array_push($data, $row); // Agregar cada fila de datos al arreglo
        }
        return $data; // Retornar los resultados obtenidos
    }

    /* Método para ejecutar consultas que no retornan resultados (INSERT, UPDATE, DELETE) */
    public function queryExecute($sql)
    {
        // Ejecutar la consulta que no retorna resultados (como INSERT, UPDATE, DELETE)
        if ($this->conn->query($sql) === TRUE) {
            return true;  // Consulta ejecutada correctamente
        } else {
            return false; // Hubo un error al ejecutar la consulta
        }
    }
}
?>
