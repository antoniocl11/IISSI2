<?php
/*Consulta para el usuario Administrador*/
    function consultarAdmin($conexion){
        $consulta = "SELECT * FROM ADMINISTRADOR";
        return $conexion->query($consulta);
       
    }
?>