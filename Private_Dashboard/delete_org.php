
<?php

 require_once("include/connection.php");

$id = mysqli_real_escape_string($conn,$_GET['id']);
echo "El valor de ID es: " . $id;

mysqli_query($conn,"DELETE FROM  organismos WHERE id_orga='$id'")or die(mysqli_error());
echo "<script type='text/javascript'>alert('¡Registro eliminado!');document.location='organismos.php'</script>";
?>
