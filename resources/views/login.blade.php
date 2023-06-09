<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">
        <div class="login-container">
            <div class="image-container">
                <!-- Aquí puedes ajustar la ruta de la imagen -->
                <img :src="./assets/cementerio.png" alt="Imagen de fondo" />
            </div>
            <div class="form-container">
                <div class="logo-container">
                    <!-- Aquí puedes ajustar la ruta y el tamaño del logo -->
                    <img :src="paloma.jpg" alt="Logo" class="logo" />
                </div>
                <h2 class="form-title">Iniciar sesión</h2>
                <form action="/login" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Correo electrónico:</label>
                        <input type="email" id="email" v-model="email" />
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" v-model="password" />
                    </div>
                    <button class="form-button">Iniciar sesión</button>
                </form>
            </div>
        </div>

        <style scoped>
            @import url('https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap');

            .login-container {
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

            .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            }

            .logo {
            width: 100px; /* Ajusta el tamaño del logo según tus necesidades */
            height: 100px; /* Ajusta el tamaño del logo según tus necesidades */
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

        input[type="email"],
        input[type="password"] {
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