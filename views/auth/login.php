<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Redirigir si ya está autenticado
?>

<!-- views/auth/login.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.10.2/lottie.min.js"></script>


    <style>
        /* Fondo general con degradado morado-azul */
        body {
            background: linear-gradient(135deg, #6a1b9a, #283593);
            color: #fff;
        }

        /* Personalización del contenedor del formulario */
        .card {
            background: #4a148c; /* Morado oscuro */
            border: none;
        }

        .card-body {
            background: #673ab7; /* Morado medio */
            border-radius: 8px;
            color: #fff;
        }

        /* Encabezado del formulario */
        h2 {
            color: #e1bee7; /* Morado claro */
        }

        /* Inputs del formulario */
        .form-control {
            background: #311b92; /* Azul oscuro */
            color: #fff;
            border: 1px solid #7e57c2; /* Borde morado */
        }

        .form-control:focus {
            border-color: #b39ddb; /* Borde morado claro al enfocar */
            box-shadow: 0 0 5px rgba(179, 157, 219, 0.7);
        }

        /* Botón */
        .btn-primary {
            background: #512da8; /* Azul universal */
            border: none;
        }

        .btn-primary:hover {
            background: #311b92; /* Azul oscuro al pasar el mouse */
        }

        /* Links */
        a {
            color: #b39ddb; /* Morado claro */
            text-decoration: none;
        }

        a:hover {
            color: #d1c4e9; /* Morado aún más claro */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Iniciar Sesión</h2>
                        <div id="loginAlert"></div>
                        

                        <form id="loginForm" onsubmit="login(event)">
                            <div class="mb-3">
                                <label for="username" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="username" >
                            </div>
                             <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" >
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                Iniciar Sesión
                            </button>
                        </form>
                        <div class="text-center mt-3">
                            <p>¿No tienes cuenta? <a href="<?= BASE_URL ?>/register">Regístrate</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img id="animeDance" src="<?= BASE_URL ?>/assets/img/Animation - 1733843106833.gif" alt="Animación" style="width: 200px; height: 300px; margin: auto;">
    <script src="<?= BASE_URL ?>/assets/js/auth.js"></script>
    
</body>
</html>
