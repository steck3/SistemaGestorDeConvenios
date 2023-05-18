<?php
require_once("include/connection.php");

if(isset($_POST['id'])) {
  $id = $_POST['id'];
  $fname = $_POST['fname'];
  $email = $_POST['email'];
  $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT, array('cost' => 12));  //PASSWORD_ARGON2I//PASSWORD_ARGON2ID
  $tipo = $_POST['tipo'];

  $query = "UPDATE usuarios SET nombre_usuario='$fname', email='$email', admin_password='$pass', tipo_usuario='$tipo' WHERE id_usuario=$id";
  $result = mysqli_query($conn, $query);

  if ($result) {
    // El cambio se hizo de manera exitosa
    echo "<script>alert('El cambio se hizo de manera exitosa.')</script>";
  } else {
    // Hubo un error al hacer el cambio
    echo "<script>alert('Hubo un error al hacer el cambio.')</script>";
  }
  
  // Redireccionar a la página principal
  header("Location: view_admin.php");
  exit();
}
?>
