<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobiliario</title>
</head>
<body>
    <div class="container">
        <div class="form">
            <h1>Mobiliario</h1>
            <form action="/generate-mobilary" method="POST">
                @csrf
                <div class="form-group">
                    <label for="servicio">ID del Servicio:</label>
                    <input type="text" name="id_servicio" value="{{ $id_servicio }}" placeholder="{{ $id_servicio }}"readonly>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Tipo de Mobiliario:</label>
                            <select name="id_mobiliario" id="mobiliario-select" required>
                                <option value="">Seleccione un mobiliario</option>
                            </select>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    var id_tipo_servicio = {!! json_encode($id_tipo_servicio) !!};
                                    $.ajax({
                                        url: '/get-mobilary/' + id_tipo_servicio,
                                        type: 'GET',
                                        dataType: 'json',
                                        success: function(response) {
                                            var mobiliarios = response.data; // Suponiendo que los mobiliarios están en la propiedad "data" del JSON
                                            
                                            // Generar las opciones en el elemento select
                                            $.each(mobiliarios, function(index, mobiliario) {
                                                $('#mobiliario-select').append('<option value="' + mobiliario.id_mobiliario + '">' + mobiliario.nombre + '</option>');
                                            });
                                        },
                                        error: function(xhr, status, error) {
                                            console.error(error);
                                        }
                                    });
                                });
                            </script>
                        </div>
                        <div class="col">
                            <label>Cantidad:</label>
                            <input type="number" name="cantidad" placeholder="1" required>
                        </div>
                    </div>
                </div>
                <div class="row"></div>
                <button type="submit" class="finish-button" id="mi-boton">Finalizar</button>
                <script>
                    document.getElementById('mi-boton').addEventListener('click', function() {
                        var select = document.getElementById('mobiliario-select');
                        var valorSeleccionado = select.value;
                        var id_tipo_servicio = {!! json_encode($id_tipo_servicio) !!};

                        // Realizar la lógica para cambiar el valor del select según el valor seleccionado
                        if (id_tipo_servicio === '1') {
                            if (valorSeleccionado === '1') {
                                select.value = '12';
                            } else if (valorSeleccionado === '2') {
                                select.value = '13';
                            } else if (valorSeleccionado === '3') {
                                select.value = '14';
                            } else if (valorSeleccionado === '4') {
                                select.value = '15';
                            } else if (valorSeleccionado === '5') {
                                select.value = '16';
                            } else if (valorSeleccionado === '6') {
                                select.value = '17';
                            }
                        } else if (id_tipo_servicio === '2') {
                            if (valorSeleccionado === '1') {
                                select.value = '18';
                            } else if (valorSeleccionado === '2') {
                                select.value = '19';
                            } else if (valorSeleccionado === '3') {
                                select.value = '20';
                            } else if (valorSeleccionado === '4') {
                                select.value = '21';
                            } else if (valorSeleccionado === '5') {
                                select.value = '22';
                            }
                        } 
                    });
                </script>
            </form>
        </div>
    </div>
    
    <style>
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

    .row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    }

    .col {
    flex: 1;
    }

    select,
    input[type="number"] {
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

    .add-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 20px;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
    font-family: 'Cinzel Decorative', cursive;
    margin-top: 1rem;
    }

    .finish-button {
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

    .finish-button:hover {
    background-color: #0056b3;
    }
    </style>
    
</body>
</html>