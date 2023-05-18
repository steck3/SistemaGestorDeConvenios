<?php
require_once("include/connection.php");

if(isset($_GET['id'])) {
  $query = "SELECT * FROM usuarios WHERE id_usuario=" . $_GET['id'];
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $user = array(
      "id" => $row['id_usuario'],
      "fname" => $row['nombre_usuario'],
      "email" => $row['email'],
      "pass" => $row['admin_password'],
      "tipo" => $row['tipo_usuario']
    );
    echo json_encode($user);
  }
}
?>
