<?php
  require_once 'db_fns.php';



  function get_items($consulta){
    $conn = db_connect();
    //ejecuta el query
    $resultado = mysqli_query($conn,$consulta) OR die("EROR".mysqli_error($conn)); //detiene la consulta
    if(!$resultado){
      //cierra la conexion
      mysqli_close($conn);
      //se devuelve el arreglo
      return false;
    }

    else{
      //en caso de haber resultado los almacenara en un arreglo
      $items_array = mysqli_fetch_all($resultado, MYSQLI_ASSOC); //el resultado lo retorna como un arreglo asociativo
      //liberamos los resultados
      mysqli_free_result($resultado);
      //cierra la conexion
      mysqli_close($conn);
      //se devuelve el arreglo
      return $items_array;
    }
  }





  function set_item($consulta){
    $conn = db_connect();
    mysqli_query($conn,$consulta) OR die("EROR". mysqli_error($conn));
  }




  function set_items($consulta){
    $conn = db_connect();
    mysqli_query($conn,$consulta) OR die("EROR". mysqli_error($conn));

  }


 ?>
