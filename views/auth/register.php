<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirigir si ya está autenticado

?>
<!-- views/auth/register.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Sistema de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- <link href="<?= BASE_URL ?>/assets/css/style.css" rel="stylesheet"> -->
    <style>
        body {
            background: linear-gradient(135deg, #6a11cb, #2575fc); /* Fondo con gradiente azul-violeta */
            color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .card {
            border: none;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
        }
        .card-body {
            color: #212529;
        }
        h2 {
            color: #6a11cb; /* Violeta universal */
        }
        label {
            color: #2575fc; /* Azul */
        }
        input {
            border: 1px solid #6a11cb; /* Borde violeta */
        }
        input:focus {
            outline: none;
            box-shadow: 0 0 5px #6a11cb;
        }
        button {
            background-color: #2575fc; /* Azul */
            border: none;
        }
        button:hover {
            background-color: #6a11cb; /* Violeta */
        }
        a {
            color: #6a11cb;
        }
        a:hover {
            color: #2575fc;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Registro</h2>
                        <div id="registerAlert"></div>
                        <form id="registerForm" onsubmit="register(event)">
                            <div class="mb-3">
                                <label for="full_name" class="form-label">Nombre Completo</label>
                                <input type="text" class="form-control" id="full_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="confirm_password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                Registrarse
                            </button>
                        </form>
                        <div class="text-center mt-3">
                            <p>¿Ya tienes cuenta? <a href="<?= BASE_URL ?>/login">Inicia Sesión</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= BASE_URL ?>/assets/js/auth.js"></script>
</body>
</html>
