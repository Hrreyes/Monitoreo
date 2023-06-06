<?php
require_once "../conexion.php";
global $connection;
$id= $_REQUEST['id'];
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
switch ($action) {
  case 'removeModification':
      $query = "DELETE FROM feic_informacion_general_modificaciones_escritura_publica WHERE id =$id";
      $result = mysqli_query($connection, $query);
      return $result;
    break;
  case 'removeIndividualPerson':
      $query = "DELETE FROM feic_informacion_general_estructura_accionaria_individual WHERE id =$id";
      $result = mysqli_query($connection, $query);
      return $result;
    break;
  case 'removeLegalPerson':
      $query = "DELETE FROM feic_informacion_general_estructura_accionaria_juridica WHERE id =$id";
      $result = mysqli_query($connection, $query);
      return $result;
    break;
  case 'removeCouncilPerson':
      $query = "DELETE FROM feic_informacion_general_organo_superior WHERE id =$id";
      $result = mysqli_query($connection, $query);
      return $result;
    break;
  default:
    # code...
    break;
}

?>