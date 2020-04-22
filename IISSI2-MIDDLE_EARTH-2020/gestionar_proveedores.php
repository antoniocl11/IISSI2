<?php  


    /*Consultar proveedores*/
    function consultarTodosProveedores($conexion){
        $consulta = "SELECT * FROM PROVEEDOR";
        return $conexion->query($consulta);
       
    }

