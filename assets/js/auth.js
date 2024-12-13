async function login(event) {
    event.preventDefault();

    Swal.fire({
        title: "Procesando...",
        text: "Estamos verificando tus credenciales.",
        icon: "info",
        showConfirmButton: false,
        allowOutsideClick: false
    });

    let nombreUsuario = document.getElementById('username').value;
    let claveUsuario = document.getElementById('password').value;

    try {
        const respuesta = await fetch('auth/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                username: nombreUsuario,
                password: claveUsuario
            })
        });

        const respuestaJson = await respuesta.json();
        console.log("Respuesta JSON del servidor:", respuestaJson);

        if (respuestaJson.status !== 'success') {
            Swal.fire({
                title: "Error",
                text: respuestaJson.message || "Credenciales incorrectas.",
                icon: "error"
            });
            return false;
        }

        // Éxito
        Swal.fire({
            title: "¡Éxito!",
            text: "Inicio de sesión exitoso. Redirigiendo...",
            icon: "success",
            timer: 3000,
            showConfirmButton: true
        });
        setTimeout(() => {
            window.location.href = 'home';
        }, 3000);

    } catch (error) {
        console.error("Error en el login:", error);
        Swal.fire({
            title: "Error",
            text: "Ocurrió un problema al iniciar sesión.",
            icon: "error"
        });
        return false;
    }
}



async function register(e){
        e.preventDefault();
        const nombreCompleto = document.getElementById('full_name').value;
        const usuario = document.getElementById('username').value;
        const email = document.getElementById('email').value;
        const contraseña = document.getElementById('password').value;
        const confirmarContraseña = document.getElementById('confirm_password').value;
        const rol = document.getElementById('rol').value;


        try {
            const respuesta = await fetch('auth/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    nombreCompleto,
                    usuario,
                    email,
                    contraseña,
                    confirmarContraseña,
                    rol,

                })
            });
    
            const respuestaJson = await respuesta.json();
            console.log("Respuesta JSON del servidor:", respuestaJson);
    
            if (respuestaJson.status !== 'success') {
                Swal.fire({
                    title: "Error",
                    text: respuestaJson.message || "Credenciales incorrectas.",
                    icon: "error"
                });
                return false;
            }

            // Éxito
            Swal.fire({
                title: "Éxito!",
                text: "Registro exitoso. Redirigiendo...",
                icon: "success",
                timer: 3000,
                showConfirmButton: true
            });
            setTimeout(() => {
                window.location.href = 'login';
            }, 1000);
        } catch (error) {
            console.error("Error en el login:", error);
            Swal.fire({
                title: "Error",
                text: "Ocurrió un problema al registrarce.",
                icon: "error"
            });
            return false;

            
        }

        
      
    
        
    }





