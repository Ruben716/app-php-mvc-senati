<?php

class AuthController {
    //atributos 
    //constructor 
    //metodos
    //constructor
    
    private $db;
    private $usuario;

    public function __construct() {
        //instanciar la base de datos
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
        $database=new Database();
        $this->db = $database->connect(); 

        $this->usuario = new Usuario($this->db);



    }

    public function showLogin() {
        include 'views/auth/login.php';

}

    public function showRegister() {
        include 'views/auth/register.php';

}   
    public function loging () {
        header('Content-Type: application/json');

        try {
            
            $data = json_decode(file_get_contents("php://input"));
            if(empty($data->username) && empty($data->password)){
                throw new Exception('Usuario y contraseña son requeridos');

            }
            $usuario = $this->usuario->login($data->username,$data->password);
            if($usuario){
                session_start();
                $_SESSION['id_usuario'] = $usuario['id_usuario'];
                $_SESSION['usuario'] = $usuario['nombre_usuario'];
                $_SESSION['rol'] = $usuario['rol'];
                $_SESSION['correo'] = $usuario['correo'];
                $_SESSION['nombre_completo'] = $usuario['nombre_completo'];


                echo json_encode([
                   'status' =>'success',
                   'message' => 'Sesión iniciada correctamente',
                   'usuario' =>[
                       'nombre_usuario'  => $usuario['nombre_usuario'],
                       'rol'  =>$usuario['rol'],
                       'nombre_completo'  =>$usuario['nombre_completo']
                   ]
                ]);

            }
            else{
                throw new Exception('Usuario o contraseña incorrectos');
            }






            // var_dump($usuario);

        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }




    }
    public function register () {
        header('Content-Type: application/json');
        try {
            $data = json_decode(file_get_contents("php://input"));
            
            if ($data->contraseña !== $data->confirmarContraseña) {
                throw new Exception('Las contraseñas no coinciden.');
            }
    
           
    
            echo json_encode([
                'status' => 'success',
                'message' => 'Registro exitoso.'
            ]);
        } catch (\Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
    


}