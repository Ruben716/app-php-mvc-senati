<?php
class Usuario{
 
    private $conn;

    public $id_usuario;
    public $nombre_usuario;
    public $clave;
    public $correo;
    public $nombre_completo;
    public $rol;
    public $fecha_creacion;
    public $fecha_actualizacion;


    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function login($nombre_usuario, $clave_usuario){
        $query = "SELECT * FROM usuario WHERE nombre_usuario = :nombre_usuario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre_usuario',$nombre_usuario);
        $stmt->execute();




        
        if($stmt->rowCount() > 0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($clave_usuario, $row['clave'])){
                return $row;
        }



    }return false;
}
    public function validaUsuario($usuario){
        $query = "SELECT id_usuario FROM usuario WHERE nombre_usuario = :nombre_usuario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre_usuario',$usuario);
        $stmt->execute();

        return  $stmt ->rowCount()>0;
    }

    public function validaCorreo($correo){
        $query = "SELECT id_usuario FROM usuario WHERE correo = :correo";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();
    
        return $stmt->rowCount() > 0;
    }

    public function register($data) {
        try {
            // Consulta para insertar el nuevo usuario en la base de datos
            $query = "INSERT INTO usuario (nombre_completo, nombre_usuario, correo, clave, rol) 
                      VALUES (:nombre_completo, :nombre_usuario, :correo, :clave, :rol)";
            $stmt = $this->conn->prepare($query);
    
            // Uso de variables intermedias para evitar referencias incorrectas
            $nombreCompleto = $data->nombreCompleto;
            $usuario = $data->usuario;
            $email = $data->email;
            $contraseña = password_hash($data->contraseña, PASSWORD_DEFAULT);
            $rol = $data->rol; 
    
            $stmt->bindParam(':nombre_completo', $nombreCompleto);
            $stmt->bindParam(':nombre_usuario', $usuario);
            $stmt->bindParam(':correo', $email);
            $stmt->bindParam(':clave', $contraseña);
            $stmt->bindParam(':rol', $rol);
    
            // Ejecutar la consulta
            $stmt->execute();
    
            // Respuesta de éxito
            return [
                'status' => 'success',
                'message' => 'Registro exitoso.'
            ];
        } catch (Exception $e) {
            // Captura de errores
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }
    
    
    
    



}
