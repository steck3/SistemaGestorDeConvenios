<?php

 require_once("include/connection.php");

$id = mysqli_real_escape_string($conn,$_GET['ID']);


mysqli_query($conn,"DELETE FROM convenios WHERE id_conv='$id'")or die(mysql_error());
echo "<script type='text/javascript'>alert('Archivo Eliminado');document.location='convenio.php'</script>";
?>
