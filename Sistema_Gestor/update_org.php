<?php
require_once("include/connection.php");

if(isset($_POST['id'])) {
  $id_orga = (int)$_POST['id_orga'];
  $nombre = $_POST['nombre'];
  $alias = $_POST['alias'];
  $tipo = $_POST['tipo'];
  $rep = $_POST['representante'];
  $dir = $_POST['direccion'];
  $cp = $_POST['codigo postal'];

  $query = "UPDATE organismos SET nombre='$nombre', alias='$alias', representante='$rep' WHERE id_orga=$id_orga";
  $result = mysqli_query($conn, $query);

  if ($result) {
    // El cambio se hizo de manera exitosa
    echo "<script>alert('El cambio se hizo de manera exitosa.')</script>";
  } else {
    // Hubo un error al hacer el cambio
    echo "<script>alert('Hubo un error al hacer el cambio.')</script>";
  }
  
  // Redireccionar a la página principal
  header("Location: organismos.php");
  exit();
}
?>

