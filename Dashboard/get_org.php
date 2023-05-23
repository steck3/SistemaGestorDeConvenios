<?php
require_once("include/connection.php");

if(isset($_GET['id'])) {
  $query = "SELECT * FROM organismos WHERE id_orga=" . $_GET['id'];
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $org = array(
      "id_orga" => $row['id_orga'],
      "nombre" => $row['nombre'],
      "alias" => $row['alias'],
      "tipo" => $row['tipo'],
      "rep" => $row['representante'],
      "dir" => $row['direccion'],
      "cp" => $row['codigo postal'],
    );
    echo json_encode($org);
  }
}
?>