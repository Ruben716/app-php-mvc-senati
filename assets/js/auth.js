async function login(event) {
    event.preventDefault();
    let nombreUsuario = document.getElementById('username').value;
    let claveUsuario = document.getElementById('password').value;




        try {
            const respuesta = await fetch ('auth/login',{
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    username: nombreUsuario,
                    password:  claveUsuario
                })
            });
            const respuestaJson = await respuesta.json();

            if(respuestaJson.status === 'error'){
                showAlertAuth('loginAlert','error',respuestaJson.message);
                return false;

            }
            //refireccionar ala pagina web 
            window.location.href = '/web';


        } catch (error) {
            showAlertAuth('loginAlert','error','error al iniciar sesion'.error);
                return false;
            
        }
    };

function register(){
    event.preventDefault();
    let nombreCompleto = document.getElementById('full_name').value;
    let usuario = document.getElementById('username').value;
    let email = document.getElementById('email').value;
    let contraseña = document.getElementById('password').value;
    let confirmarContraseña = document.getElementById('username').value;

    
}

function showAlertAuth(containerId, type, message) {
    const container = document.getElementById(containerId);
    container.innerHTML = `
        <div class="alert alert-${type === 'error' ? 'danger' : 'success'} alert-dismissible fade show">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    `;

    // Auto-cerrar después de 5 segundos
    setTimeout(() => {
        const alert = container.querySelector('.alert');
        if (alert) {
            alert.remove();
        }
    }, 5000);
}