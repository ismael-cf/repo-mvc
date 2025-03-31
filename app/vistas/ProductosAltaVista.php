<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Agregar Producto</title>
    
    <style>
        /* Fondo con gradiente */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc); /* Gradiente */
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            animation: fadeIn 0.8s ease-in-out; /* Animación de entrada */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Contenedor principal */
        .form-container {
            background: #fff;
            color: #333;
            width: 100%;
            max-width: 600px;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            transition: transform 0.3s ease;
        }

        .form-container:hover {
            transform: scale(1.03); /* Efecto suave al pasar el mouse */
        }

        h1 {
            text-align: center;
            color: #007bff;
            font-size: 32px;
            margin-bottom: 20px;
        }

        /* Estilos para etiquetas */
        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #555;
        }

        /* Estilos para inputs */
        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
            font-size: 14px;
        }

        input[type="text"]:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Botones */
        button, .btn-regresar {
            display: inline-block;
            width: 100%;
            padding: 15px;
            font-size: 16px;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button {
            background: #28a745; /* Verde para agregar */
            margin-bottom: 15px;
        }

        button:hover {
            background: #218838; 
        }

        .btn-regresar {
            background: #007bff;
        }

        .btn-regresar:hover {
            background: #0056b3;
        }

        /* Estilos para formularios responsivos */
        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }

            button, .btn-regresar {
                padding: 12px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

<!-- Formulario -->
<div class="form-container">
    <h1>Agregar Nuevo Producto</h1>

    <form action="<?php echo RUTA_APP; ?>productos/guardarAlta" method="POST">
        
        <!-- Nombre -->
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <!-- Marca -->
        <label for="marca">Marca:</label>
        <input type="text" name="marca" required>

        <!-- Talla -->
        <label for="talla">Talla:</label>
        <input type="text" name="talla">

        <!-- Color -->
        <label for="color">Color:</label>
        <input type="text" name="color">

        <!-- Precio -->
        <label for="precio">Precio:</label>
        <input type="text" name="precio" required>

        <!-- Botón para agregar -->
        <button type="submit">Agregar Producto</button>

        <!-- Botón de regresar -->
        <a href="../vistas/ProductosVista.php" class="btn-regresar">Regresar</a>
    </form>
</div>

</body>
</html>
