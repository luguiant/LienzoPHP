<?php



define("CONTROLADOR_DEFECTO", "Usuarios");
define("ACCION_DEFECTO","index");
define("BASE_DIR",str_replace("\\","/",realpath('./')));
define("APP_ROOT",str_replace("\\","/",realpath('app')));
define("BASE_URL",getBaseUrl());
define("BASE_PUBLIC",getBaseUrl().'public/');
//define("BASE_CORE",);
ini_set("display_errors", 1);//configuracion de errores


function getBaseUrl()
{
    // output: /myproject/index.php
    $currentPath = $_SERVER['PHP_SELF'];

    // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index )
    $pathInfo = pathinfo($currentPath);

    // output: localhost
    $hostName = $_SERVER['HTTP_HOST'];

    // output: http://
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';

    // return: http://localhost/myproject/
    return $protocol.$hostName.$pathInfo['dirname']."/";
}
?>
