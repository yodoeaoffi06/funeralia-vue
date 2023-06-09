<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Cliente</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">

  <div class="container">
    <div class="regresar">
      <form action="/home" method="GET">
        @csrf
        <button class="back-button">&#8592;</button>
      </form>
    </div>
    <div class="form">
      <h1>Registro de Usuarios</h1>
        <form action="/create-client" method="POST">
          @csrf
          <div class="form-group">
            <label for="nombre">Nombre completo:</label>
            <input type="text" name="nombre" required>
          </div>
          <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="tel" name="telefono" required>
          </div>
          <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" required>
          </div>
          <button type="submit" class="continue-button">Continuar</button>
        </form>
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

input[type="text"],
input[type="tel"] {
  width: 100%;
  padding: 0.5rem;
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
