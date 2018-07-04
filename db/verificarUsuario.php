<?php

require_once 'query_fns.php';

  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  $data = json_decode($_POST['data'], true);

  $correo = $data['correo'];
  $contrasenia = $data['contrasenia'];

  $encriptar = crypt( $contrasenia, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

  $consulta = "SELECT * from usuarios where correo = '$correo' AND password = '$encriptar'";
  $arreglo = get_items($consulta);

  echo json_encode($arreglo);
 ?>
