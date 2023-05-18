<?php 
  require_once("include/connection.php");

  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM convenio WHERE id_conv='$id' LIMIT 1") or die (mysqli_error($conn));

    if(mysqli_num_rows($query) == 1) {
      $file = mysqli_fetch_array($query);
      // Aquí se pueden realizar las operaciones necesarias con los datos obtenidos de la base de datos
      $name = $file['nombre'];
      $size = $file['organismo'];
      $uploads = $file['vigencia_inicio'];
      $status = $file['vigencia_final'];
    } else {
      echo "El convenio no existe";
      exit();
    }
  } else {
    echo "No se proporcionó el ID del convenio";
    exit();
  }
?>

<!-- Aquí se puede colocar el código HTML que se quiera mostrar en la página -->

<h2>Información del convenio <?php echo $name; ?></h2>
<p>Organismo: <?php echo $size; ?></p>
<p>Vigencia inicio: <?php echo $uploads; ?></p>
<p>Vigencia final: <?php echo $status; ?></p>