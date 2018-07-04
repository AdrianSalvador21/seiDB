<?php

require_once 'query_fns.php';

  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  $data = json_decode($_POST['data'], true);

  //Recibimos los parametros en variables
  $nombre = $data['nombre'];
  $edad = $data['edad'];
  $correo = $data['correo'];
  $contrasenia = $data['contrasenia'];

  $consulta_usuario = "SELECT * FROM usuarios WHERE correo = '$correo'";
  $arreglo = get_items($consulta_usuario);

  if(count($arreglo) >=1){
    //usuario ya existe
    //echo json_encode($arreglo);
    //Usuario ya existe
    echo json_encode($arreglo);
  }
  else{
    //$consulta = "INSERT INTO usuarios(id, nombre, apellido, correo, contrasenia) VALUES(NULL, '$nombre', '$apellido', '$correo', '$contrasenia')";
    //set_items($consulta);
    //echo json_encode($arreglo);
    if(preg_match('/^(?:[^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*|"[^\n"]+")@(?:[^<>()[\].,;:\s@"]+\.)+[^<>()[\]\.,;:\s@"]{2,63}$/', $correo)){
      //Correo valido
      $encriptar = crypt( $contrasenia, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
      $consulta = "INSERT INTO usuarios(id, nombre, password, correo, edad) VALUES(NULL, '$nombre', '$encriptar', '$correo', '$edad')";
      set_items($consulta);
      echo json_encode($arreglo);
    }else{
      //correo no valido
      $arreglo = ["error", "correo"];
      echo json_encode($arreglo);
    }
  }

 ?>
