<?php  
    /*Consultar clientes(usuarios)*/
    function consultarTodosClientes($conexion){
        $consulta = "SELECT * FROM USUARIO";
        return $conexion->query($consulta); 
    }
     /*Añadir usuario*/

     function añadir_usuario($conexion, $nuevoUsuario){
        try{
            $consulta = 'CALL PK_USUARIO.NUEVO_USUARIO(:NIF,:NOMBRE,:APELLIDOS,:EMAIL,:TELEFONO,;ESSOCIO,:DIRECCION,:FECHANACIMIENTO,:CONTRASENA';

            $stmt = $conexion -> prepare($consulta);
            $stmt -> bindParam(':NIF', $nuevoUsuario["nif"]);
            $stmt -> bindParam(':NOMBRE', $nuevoUsuario["nombre"]);
            $stmt -> bindParam(':APELLIDOS', $nuevoUsuario["apellidos"]);
            $stmt -> bindParam(':EMAIL', $nuevoUsuario["email"]);
            $stmt -> bindParam(':TELEFONO', $nuevoUsuario["telefono"]);
            $stmt -> bindParam(':ESSOCIO', $nuevoUsuario["esSocio"]);
            $stmt -> bindParam(':DIRECCION', $nuevoUsuario["direccion"]);
            $stmt -> bindParam(':FECHANACIMIENTO', $nuevoUsuario["fechanacimiento"]);
            $stmt -> bindParam(':CONTRASENA', $nuevoUsuario["contrasena"]);
            $stmt -> execute();
            return "";
        }

        catch(PDOException $e){
            return $e -> getMessage();
            Header("Location: excepcion.php");
        }
    }

    /*Modificar usuario*/
    function modificar_usuario($conexion, $OID_U, $NIF, $NOMBRE,$APELLIDOS,$EMAIL,$TELEFONO,$ESSOCIO,$DIRECCION,$FECHANACIMIENTO,$CONTRASENA){
        try{
            $stmt = $conexion -> prepare('CALL PK_USUARIO.ACTUALIZAR_USUARIO(:OID_U,:NIF,:NOMBRE,:APELLIDOS,:EMAIL,:TELEFONO,;ESSOCIO,:DIRECCION,:FECHANACIMIENTO,:CONTRASENA');
            $stmt -> bindParam(':OID_U', $OID_U);
            $stmt -> bindParam(':NIF',$NIF);
            $stmt -> bindParam(':NOMBRE',$NOMBRE);
            $stmt -> bindParam(':APELLIDOS',$APELLIDOS);
            $stmt -> bindParam(':EMAIL', $EMAIL);
            $stmt -> bindParam(':TELEFONO',$TELEFONO);
            $stmt -> bindParam(':ESSOCIO',$ESSOCIO);
            $stmt -> bindParam(':DIRECCION',$DIRECCION);
            $stmt -> bindParam(':FECHANACIMIENTO',$FECHANACIMIENTO);
            $stmt -> bindParam(':CONTRASENA',$CONTRASENA);
            $stmt -> execute();
            return "";
        }

        catch(PDOException $e){
            return $e -> getMessage();
        }
    }

    /*Eliminar usuario*/

    function eliminar_usuario($conexion,$OID_U){
        try{
            $stmt = $conexion -> prepare('CALL PK_USUARIO.ELIMINAR_USUARIO(:OID_U)');

            $stmt-> bindParam(':OID_U',$OID_U);
            $stmt -> execute();
            return "";
        }

        catch(PDOException $e){
            return $e -> getMessage();
        }
    }

