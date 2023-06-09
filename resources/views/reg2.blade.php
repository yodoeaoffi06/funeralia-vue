<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Servicio</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <div class="regresar">
            <form action="/reg1" method="GET">
                <button class="back-button" >&#8592;</button>
            </form>
        </div>
        <div class="form">
            <h1>Fechas</h1>
            <form action="/create-service" method="POST">
                @csrf
                <input type="hidden" name="id_cliente" value="{{ $id_cliente }}">
                <div class="form-group">
                    <label for="fechaEntrega">Fecha de entrega:</label>
                    <input type="date" name="fecha_entrega" required>
                </div>
                <div class="form-group">
                    <label for="fechaRecogida">Fecha de recogida:</label>
                    <input type="date" name="fecha_recogida" required>
                </div>
                <div class="form-group">
                    <label for="tipoServicio">Tipo de servicio:</label>
                    <select name="id_tipo_servicio" required>
                        <option value="">Seleccione un servicio</option>
                        <option value="1">Fúnebre</option>
                        <option value="2">Eventos</option>
                    </select>
                </div>
                <button type="submit" class="continue-button">Continuar</button>
            </form>
        </div>
    </div>

    <style scoped>
    .container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    font-family: 'Cinzel Decorative', cursive;
    }

    .regresar {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: flex-start;
    padding: 1rem;
    }

    .form {
    text-align: center;
    }

    .form-group {
    margin-bottom: 1rem;
    }

    label {
    display: block;
    }

    input[type="date"],
    select {
    width: 100%;
    padding: 0.5rem;
    box-sizing: border-box;
    }

    .back-button {
    position: absolute;
    top: 1rem;
    left: 1rem;
    font-size: 1.5rem;
    background-color: transparent;
    border: none;
    cursor: pointer;
    }

    .continue-button {
    position: absolute;
    bottom: 1rem;
    right: 1rem;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    font-size: 16px;
    font-family: 'Cinzel Decorative', cursive;
    }

    .continue-button:hover {
    background-color: #0056b3;
    }
    </style>
</body>
</html>

