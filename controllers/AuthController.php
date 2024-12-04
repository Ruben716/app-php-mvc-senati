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
        $database=new Database();
        $this->db = $database->connect(); 


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
            throw new Exception('error del papus');
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }




    }


}