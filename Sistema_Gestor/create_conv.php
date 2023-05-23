<?php
 	require_once("include/connection.php");  
 	$target_dir = "../uploads/"; // specify the directory where you want to save the uploaded file
	$target_file = $target_dir . basename($_FILES["myfile"]["name"]);
	$file_path = $target_file;
	move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file); // move the uploaded file to the target directory
	

   if(isset($_POST['regconv'])){       
		 $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
         $user_nombre = mysqli_real_escape_string($conn,$_POST['nombre']);
         $user_org = mysqli_real_escape_string($conn,$_POST['org']);
         $user_vig_inicio = mysqli_real_escape_string($conn,$_POST['vig_inicio']);
         $user_vig_fin = mysqli_real_escape_string($conn,$_POST['vig_fin']);
         $user_rep_ext = mysqli_real_escape_string($conn,$_POST['rep_ext']);
         $user_op_ext = mysqli_real_escape_string($conn,$_POST['op_ext']);
         $user_dep_ext = mysqli_real_escape_string($conn,$_POST['dept_ext']);
         $user_firma_ext = mysqli_real_escape_string($conn,$_POST['firma_ext']);
         $user_rep_int = mysqli_real_escape_string($conn,$_POST['rep_int']);
		 $user_dep_int = mysqli_real_escape_string($conn,$_POST['dep_int']);
		 $user_op_int = mysqli_real_escape_string($conn,$_POST['op_int']);
		 $user_firma_int = mysqli_real_escape_string($conn,$_POST['firma_int']);
         $user_beneficios = mysqli_real_escape_string($conn,$_POST['beneficios']);
         $user_compromisos = mysqli_real_escape_string($conn,$_POST['compromisos']);
		 $q_checkadmin = $conn->query("SELECT * FROM `convenio` WHERE `nombre` = '$user_nombre'") or die(mysqli_error($conn));
		 $v_checkadmin = $q_checkadmin->num_rows;
		 if($v_checkadmin == 1){
			echo '
				<script type = "text/javascript">
					alert("Convenio ya registrado.");
					window.location = "dashboard.php";
				</script>
			';
		}else{
				$conn->query("INSERT INTO `convenio` VALUES('','$user_nombre', '$user_org','',' $user_vig_inicio', ' $user_vig_fin','$user_rep_ext','$user_op_ext','$user_dep_ext',' $user_firma_ext','$user_rep_int','$user_op_int','$user_dep_int','$user_firma_int','$user_beneficios','$user_compromisos','$usuario','$file_path','')") or die(mysqli_error($conn));
				echo '
				<script type = "text/javascript">
					alert("Registro de convenio con exito.");window.location = "convenio.php";
				</script>
				';
			}
	}	
 ?>