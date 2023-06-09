<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="register-container">
    <div class="image-container">
        <!-- Aquí puedes ajustar la ruta de la imagen -->
        <img src="{{ asset('assets/cementerio.png') }}" alt="Imagen de fondo" />
    </div>
    <div class="form-container">
        <h2 class="form-title">Registro de empleados</h2>
        <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" />
        </div>
        <div class="form-group">
            <label for="apellidoPaterno">Apellido Paterno:</label>
            <input type="text" id="apellidoPaterno" name="apellidoPaterno" />
        </div>
        <div class="form-group">
            <label for="apellidoMaterno">Apellido Materno:</label>
            <input type="text" id="apellidoMaterno" name="apellidoMaterno" />
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" />
        </div>
        <div class="form-group">
            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" />
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" />
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirmar contraseña:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" />
        </div>
        <div class="form-group">
            <label for="cargo">Cargo:</label>
            <select id="cargo" name="cargo">
            <option value="">Seleccionar cargo</option>
            <option value="Gerente">Gerente</option>
            <option value="Secretaria">Secretaria</option>
            <option value="Trabajador">Trabajador</option>
            </select>
        </div>
        <button class="form-button" type="submit">Registrar</button>
        </form>
    </div>
    </div>

    <style>
    .register-container {
    display: flex;
    height: 100vh;
    }

    .image-container {
    flex: 1;
    }

    .image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    }

    .form-container {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 20px;
    }

    .form-title {
    margin-bottom: 20px;
    font-size: 24px;
    font-weight: bold;
    font-family: 'Cinzel Decorative', cursive;
    color: #333;
    text-align: center;
    }

    form {
    display: flex;
    flex-direction: column;
    align-items: center;
    }

    .form-group {
    margin-bottom: 15px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    }

    label {
    font-weight: bold;
    font-size: 16px;
    font-family: 'Cinzel Decorative', cursive;
    color: #333;
    margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
    width: 300px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    }

    select {
    width: 300px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    }

    .form-button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    font-size: 16px;
    font-family: 'Cinzel Decorative', cursive;
    }

    .form-button:hover {
    background-color: #0056b3;
    }
    </style>
</body>
</html>