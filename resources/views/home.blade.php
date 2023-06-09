<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">


<template>
  <div class="main-container">
    <div class="sidebar">
      <div class="sidebar-header">
        <h2>Menu</h2>
      </div>
      <div class="sidebar-content">
        <button @click="logout" class="sidebar-button">Logout</button>
        <button @click="openAddServiceModal" class="sidebar-button">Añadir Servicio</button>
      </div>
    </div>
    <div class="content">
      <h1>Calendario de Servicios Funerarios</h1>
      <div v-for="service in services" :key="service.id" class="service">
        <div class="service-info">
          <p><strong>Número de Servicio Funerario:</strong> {{ service.number }}</p>
          <p><strong>Fecha de Entrega:</strong> {{ service.deliveryDate }}</p>
          <p><strong>Fecha de Recogida:</strong> {{ service.pickupDate }}</p>
          <p><strong>Ubicación:</strong> {{ service.location }}</p>
          <p><strong>Tipo de Servicio:</strong> {{ service.serviceType }}</p>
          <p><strong>Teléfono del Cliente:</strong> {{ service.clientPhone }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue';

export default {
  data() {
    return {
      services: [],
    };
  },
  methods: {
    fetchServices() {
      // Simulación de obtención de datos de la base de datos
      // Aquí deberías implementar la lógica real para obtener los datos actualizados
      // Puedes hacer una solicitud HTTP a tu API o usar otras formas de comunicación con la base de datos
      // En este ejemplo, se usa una lista predefinida de servicios como ejemplo
      this.services = [
        {
          id: 1,
          number: 'SF001',
          deliveryDate: '2023-06-10',
          pickupDate: '2023-06-12',
          location: 'Cementerio XYZ',
          serviceType: 'Cremación',
          clientPhone: '123-456-7890',
        },
        {
          id: 2,
          number: 'SF002',
          deliveryDate: '2023-06-15',
          pickupDate: '2023-06-18',
          location: 'Cementerio ABC',
          serviceType: 'Entierro',
          clientPhone: '987-654-3210',
        },
        // ... Otros servicios obtenidos de la base de datos
      ];
    },
  },
  mounted() {
    this.fetchServices(); // Llama al método fetchServices cuando el componente se monta
  },
};
</script>

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
