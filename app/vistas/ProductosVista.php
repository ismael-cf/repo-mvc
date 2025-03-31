<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Accesorios de Moda</title>
    <link rel="stylesheet" href="../public/css/style.css"> <!-- Estilo externo -->
    
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
            flex-direction: column;
            color: #fff;
        }

        h1 {
            margin: 20px 0;
            color: #ddd;
            font-size: 36px;
            text-align: center;
        }

        /* Contenedor para la tabla */
        .container {
            width: 90%;
            max-width: 1200px;
            background: #fff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .container:hover {
            transform: scale(1.02); /* Zoom suave al pasar el cursor */
        }

        /* Estilos para las tablas */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color: #333;  /* Texto oscuro para la tabla */
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:hover {
            background-color: #f4f4f4;
        }

        /* Fila de detalles ocultas por defecto */
        .details {
            display: none; /* Oculto al inicio */
            background-color: #f9f9f9;
            color: #333;
        }

        .details td {
            padding: 10px 20px;
        }

        /* Botones */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }

        .btn-modificar {
            background-color: #28a745;
        }

        .btn-modificar:hover {
            background-color: #218838;
        }

        .btn-borrar {
            background-color: #dc3545;
        }

        .btn-borrar:hover {
            background-color: #c82333;
        }

        .btn-agregar {
            display: inline-block;
            padding: 15px 30px;
            font-size: 18px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
            margin: 20px 0;
        }

        .btn-agregar:hover {
            background-color: #218838;
        }

        /* Animación suave para desplegar */
        .fade {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

    </style>
</head>

<body>

<h1>Moda Store Accesorios Para Tod@s</h1>

<div class="container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Talla</th>
                <th>Color</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $accesorio): ?>
                <!-- Fila principal: visible siempre -->
                <tr onclick="toggleDetails(this)">
                    <td><?= $accesorio['id'] ?></td>
                    <td><?= $accesorio['nombre'] ?></td>
                    <td><?= $accesorio['marca'] ?></td>
                    <td><?= $accesorio['talla'] ?? 'Único' ?></td>
                    <td><?= $accesorio['color'] ?></td>
                    <td>$<?= number_format($accesorio['precio'], 2) ?></td>
                    <td>
                        <a href="<?= RUTA_APP . "productos/modificar/" . $accesorio['id'] ?>" class="btn btn-modificar">Modificar</a>
                        <a href="<?= RUTA_APP . "productos/borrar/" . $accesorio['id'] ?>" class="btn btn-borrar" onclick="return confirm('¿Estás seguro de que deseas eliminar este accesorio?')">Borrar</a>
                    </td>
                </tr>
                <!-- Fila desplegable: oculta hasta que se activa -->
                <tr class="details">
                    <td colspan="7">
                        <strong>Descripción:</strong> Accesorio de moda premium. <br>
                        <strong>Stock disponible:</strong> 25 unidades. <br>
                        <strong>Fecha de ingreso:</strong> <?= date("d-m-Y") ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Botón para agregar un nuevo accesorio -->
<a href="<?= RUTA_APP . 'productos/alta'; ?>" class="btn-agregar">Agregar nuevo accesorio</a>

<script>
    // Función para desplegar/ocultar detalles
    function toggleDetails(row) {
        const detailsRow = row.nextElementSibling;

        // Alternar visibilidad
        if (detailsRow.classList.contains('fade')) {
            detailsRow.classList.remove('fade');
            detailsRow.style.display = 'none';
        } else {
            detailsRow.classList.add('fade');
            detailsRow.style.display = 'table-row';
        }
    }
</script>

</body>
</html>
