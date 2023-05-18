<?php

require_once("../include/connection.php");

session_start();

if(isset($_POST["adminlog"])){

  date_default_timezone_set("asia/manila");
  $date = date("M-d-Y h:i A",strtotime("+0 HOURS"));

  $username = mysqli_real_escape_string($conn, $_POST["email"]);  
  $password = mysqli_real_escape_string($conn, $_POST["admin_password"]);

  $query = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '$username'") or die(mysqli_error($conn));
  $row = mysqli_fetch_array($query);
  $id = $row['id_usuario'];
  $admin = $row['email'];
  $tipo = $row['tipo_usuario']; // Agregamos la columna tipo

  $_SESSION["email"] = $row["email"];

  $counter = mysqli_num_rows($query);

  if ($counter == 0) {	
    echo "<script type='text/javascript'>alert('¡Correo incorrecto! Por favor, inténtelo de nuevo.');
          document.location='index.html'</script>";
  } 
  else {
    if(password_verify($password, $row["admin_password"]))  {

      $_SESSION['email'] = $id;	

      if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
        $ip = $_SERVER["HTTP_CLIENT_IP"];
      }
      elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
      }
      else {
        $ip = $_SERVER["REMOTE_ADDR"];
      }

      $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);

      $remarks = "Inicio sesión";  
      mysqli_query($conn, "INSERT INTO history_log1(id,email,action,ip,host,login_time) VALUES('$id','$admin','$remarks','$ip','$host','$date')") or die(mysqli_error($conn));

      // Agregamos la validación de tipo de usuario
      
	  switch($tipo) {
        case "admin":
          header("Location: dashboard.php");
          break;
        case "operador":
          header("Location: operador.php");
          break;
        case "usuario":
          header("Location: usuario.php");
          break;
        default:
          header("Location: dashboard.php");
      }
	 
	  
    }
    else {
      echo "<script type='text/javascript'>alert('¡Contraseña incorrecta! Por favor, inténtelo de nuevo.');
            document.location='index.html'</script>";
    }
  }
}
?>
