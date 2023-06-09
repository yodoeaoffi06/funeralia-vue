<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">


  <div class="main-container">
    <div class="sidebar">
      <div class="sidebar-header">
        <h2>Menu</h2>
      </div>
      <div class="sidebar-content">
        <form action="/logout" method="POST">
          @csrf
          <button class="sidebar-button">Logout</button>
        </form>
        <form action="/reg1" method="GET">
          @csrf
          <button class="sidebar-button">Añadir Servicio</button>
        </form>
      </div>
    </div>
    <div class="content">
      <h1>Calendario de Servicios Funerarios</h1>
      <div v-for="service in services" :key="service.id" class="service">
        <div class="service-info">
          <p><strong>Número de Servicio Funerario:</strong> 1</p>
          <p><strong>Fecha de Entrega:</strong> 2023/06/08</p>
          <p><strong>Fecha de Recogida:</strong> 2023/06/10</p>
          <p><strong>Ubicación:</strong> Calle Real</p>
          <p><strong>Tipo de Servicio:</strong> Fúnebre</p>
          <p><strong>Teléfono del Cliente:</strong> 2851105381</p>
        </div>
      </div>
    </div>
  </div>



<style scoped>
.main-container {
  display: flex;
  height: 100vh;
}

.sidebar {
  width: 200px;
  background-color: #f2f2f2;
}

.sidebar-header {
  background-color: #ccc;
  padding: 10px;
}

.sidebar-content {
  padding: 10px;
}

.sidebar-button {
  width: 100%;
  margin-bottom: 5px;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 20px;
  cursor: pointer;
  font-size: 16px;
  font-family: 'Cinzel Decorative', cursive;
}

.sidebar-button:hover {
  background-color: #0056b3;
}

.content {
  flex: 1;
  padding: 20px;
}

h1 {
  margin-bottom: 20px;
  font-size: 24px;
  font-weight: bold;
  font-family: 'Cinzel Decorative', cursive;
  color: #333;
  text-align: center;
}

.service {
  border: 1px solid #ccc;
  padding: 10px;
  margin-bottom: 10px;
}

.service-info {
  margin-bottom: 10px;
  font-weight: bold;
  font-size: 16px;
  font-family: 'Cinzel Decorative', cursive;
  color: #333;
}

</style>

    </body>
</html>
