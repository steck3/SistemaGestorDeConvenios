<?php
require_once("include/connection.php");

if(isset($_GET['id'])) {
  $query = "SELECT * FROM departamento WHERE id_dept=" . $_GET['id'];
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $dept = array(
      "id_dept" => $row['id_dept'],
      "dept" => $row['dept'],
      "op" => $row['operador'],
      "org" => $row['org'],
      //"tipo" => $row['tipo_usuario']
    );
    echo json_encode($dept);
  }
}
?>
