<?php  
    /*Consultar clientes(usuarios)*/
    function consultarTodosClientes($conexion){
        $consulta = "SELECT * FROM USUARIO";
        return $conexion->query($consulta); 
    }

