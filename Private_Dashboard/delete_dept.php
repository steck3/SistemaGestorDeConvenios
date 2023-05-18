
<?php

 require_once("include/connection.php");

$id = mysqli_real_escape_string($conn,$_GET['id']);


mysqli_query($conn,"DELETE FROM departamento WHERE id_dept='$id'")or die(mysql_error($conn));
echo "<script type='text/javascript'>alert('Eliminado correctamente!');document.location='departamento.php'</script>";
?>
