<?php

 require_once("include/connection.php");
   
   if(isset($_POST['reg'])){
    
        
         $user_name = mysqli_real_escape_string($conn,$_POST['nombre']);
         $user_email = mysqli_real_escape_string($conn,$_POST['email']);
         $user_password = password_hash($_POST['pass'], PASSWORD_DEFAULT, array('cost' => 12));  //PASSWORD_ARGON2I//PASSWORD_ARGON2ID
         $user_status = mysqli_real_escape_string($conn,$_POST['tipo']);
		
         

	$q_checkadmin = $conn->query("SELECT * FROM `usuarios` WHERE `email` = '$user_email'") or die(mysqli_error());
		$v_checkadmin = $q_checkadmin->num_rows;
		if($v_checkadmin == 1){
			echo '
				<script type = "text/javascript">
					alert("Direccion de correo no disponible.");
					window.location = "usuarios.php";
				</script>
			';
		}else{
			$conn->query("INSERT INTO `usuarios` VALUES('','$user_name', '$user_email', '$user_password','$user_status')") or die(mysqli_error());
			echo '
				<script type = "text/javascript">
					alert("¡Usuario registrado!");
					window.location = "usuarios.php";
				</script>
			';
		}
	}	


 ?>


