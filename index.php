<?php

#El index muestra las salidas de las vistas y tambien a traves de enviaremos 
#las distintas acciones del usuario al controlador correspondiente

require_once 'controladores/plantilla.controlador.php';

require_once 'controladores/formularios.controlador.php';
require_once 'modelos/formularios.modelo.php';

/* require_once 'modelos/conexion.php';

$conexion = Conexion::contectar();
    echo "<pre>"; print_r($conexion);echo "</pre>";
     */

$plantilla = new ControladorPlantilla();
$plantilla-> ctrTraerPlantilla();

?>