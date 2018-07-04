<?php
  function db_connect(){
    require_once 'config.php';
    $con = mysqli_connect($mysql_config['host'] = "localhost", $mysql_config['username'] = "root", $mysql_config['password'] = "", $mysql_config['schema'] = "sei");
    if(mysqli_connect_errno()){
      die("Connection failed: ". mysqli_connect_error());
    }
    mysqli_set_charset($con, 'utf8');
    return $con;

  }
 ?>
