<?php
    session_start();

    //Importo los archivos necesarios para la gestion del nuevo proveedor
    require_once("gestionBD.php");

    //Si la variable formulario está definida
    if(isset($_SESSION["formulario"])){
        //Recojo los datos del formulario
        $nuevoProveedor["cif"] = $_REQUEST["cif"];
        $nuevoProveedor["nombre"] = $_REQUEST["nombre"];
        $nuevoProveedor["telefono"] = $_REQUEST["telefono"];
        $nuevoProveedor["direccion"] = $_REQUEST["direccion"];

        $_SESSION["formulario"] = $nuevoProveedor;
    }

    else{
        header("Location: form_alta_proveedor.php");
    }
    //Validamos el formulario en el servidor
    $conexion = crearConexionBD();
    $errores = validarDatosProveedor($conexion, $nuevoProveedor);
    cerrarConexionBD($conexion);

    //Si se han detectado errores
    if (count($errores)>0) {
        // Guardo en la sesión los mensajes de error y volvemos al formulario
        $_SESSION["errores"] = $errores;
        Header('Location: form_alta_proveedor.php');
    } else{
        // Si todo va bien, vamos a la página de acción (inserción del usuario en la base de datos)
        
        Header('Location: accion_alta_proveedor.php');
    }
    function validarDatosProveedor($conexion, $nuevoProveedor){
        $errores = array();
        
        //Validacion CIF, no puede estar
        if($nuevoProveedor["cif"]=="" || $nuevoProveedor["cif"]==null)
        $errores[] = "<p>El campo CIF no puede estar vacío</p>";
        //el DNI debe contener 8 numero y una letra mayuscula al final
        else if(!preg_match("/^[A-Z][0-9]{8}$/", $nuevoProveedor["cif"])){
        $errores[] = "<p>El CIF debe contener 8 números y una letra mayúscula</p>";
        }
        
        //El campo nombre no puede estar vacío
        if($nuevoProveedor["nombre"]=="" || $nuevoProveedor["nombre"]==null){
            $errores[] = "<p>El campo nombre no puede estar vacío ni ser nulo</p>";
        }
        else if(!preg_match("/^[a-zA-ZÑñÁÉÍÓÚáéíóú0-9,.\s]*$/", $nuevoProveedor["nombre"])){
            $errores[] = "El campo nombre no posee el formato correcto.";
        }

        //El campo teléfono no puede estar vacío, además sólo debe contener
        //9 números y ninguna letra 
        if($nuevoProveedor["telefono"]=="" || $nuevoProveedor["telefono"]==null)
            $errores[] = "<p>El teléfono no puede estar vacío</p>";
        else if(!preg_match("/^[0-9]{9}$/", $nuevoProveedor["telefono"])){
            $errores[] = "<p>El teléfono debe contener 9 números</p>";
        }
        else if (preg_match("/^{a-z}{A-Z}$/", $nuevoProveedor["telefono"])) {
			$errores[] = "<p>El número de teléfono no puede contener letras.</p>";
        }
        
        //El campo direccion no puede estar vacío
        if($nuevoProveedor["direccion"]=="" || $nuevoProveedor["direccion"] == null){
            $errores[] = "<p>El campo dirección no puede estar vacío</p>";
        }
        //El campo direccion debe tener el formato adecuado
        else if(!preg_match("/^[a-zA-ZñÑÁÉÍÓÚáéíóú0-9\s\º\,\''\-\_\.]*$/", $nuevoProveedor["direccion"])){
            $errores[] = "El campo direccion no posee el formato correcto.";
        }


        return $errores;
    }
    
    ?>