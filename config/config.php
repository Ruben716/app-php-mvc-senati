<?php
// configuracion de la base de datos 
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','app-php-mvc-senati');

  // Configuración de la URL base
  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
  $server = $_SERVER['SERVER_NAME'];
  $folder = dirname($_SERVER['SCRIPT_NAME']);
  define('BASE_URL', $protocol . $server . $folder);

//configuracion para la ruta para subir archivos (img)

define('UPLOAD_PATH',$_SERVER['DOCUMENT_ROOT'].$folder.'/assets/uploads/');

//configuracion de la sona horaria 

date_default_timezone_set('America/Lima');