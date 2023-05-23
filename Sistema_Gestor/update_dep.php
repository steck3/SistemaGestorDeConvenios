<?php
require_once("include/connection.php");

if(isset($_POST['id_dept'])) {
  $id = $_POST['id_dept'];
  $dept = $_POST['dept'];
  $oper = $_POST['op'];
  $org = $_POST['org'];

  $query = "UPDATE departamento SET dept='$dept', operador='$oper', org='$org' WHERE id_dept=$id";
  $result = mysqli_query($conn, $query);

  if ($result) {
    // El cambio se hizo de manera exitosa
    echo "<script>alert('El cambio se hizo de manera exitosa.')</script>";
  } else {
    // Hubo un error al hacer el cambio
    echo "<script>alert('Hubo un error al hacer el cambio.')</script>";
  }
  
  // Redireccionar a la página principal
  header("Location: departamento.php");
  exit();
}
?>
