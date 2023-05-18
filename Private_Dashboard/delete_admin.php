
<?php

 require_once("include/connection.php");

$id = mysqli_real_escape_string($conn,$_GET['id']);


mysqli_query($conn,"DELETE FROM usuarios WHERE id_usuario='$id'")or die(mysql_error($conn));
echo "<script type='text/javascript'>alert('Eliminado correctamente!');document.location='view_admin.php'</script>";
?>
