<?php

 require_once("include/connection.php");
   
   if(isset($_POST['regorg'])){
    
        
         $user_org = mysqli_real_escape_string($conn,$_POST['org']);
         $user_id = mysqli_real_escape_string($conn,$_POST['alias']);
		 $user_tipo = mysqli_real_escape_string($conn,$_POST['tipo_org']);
		 $user_rep = mysqli_real_escape_string($conn,$_POST['rep_ext']);
		// $user_op = mysqli_real_escape_string($conn,$_POST['op_int']);
		 $user_dir = mysqli_real_escape_string($conn,$_POST['dir']);
		 $user_postal = mysqli_real_escape_string($conn,$_POST['postal']);

		



	$q_checkadmin = $conn->query("SELECT * FROM `organismos` WHERE `nombre` = '$user_org'") or die(mysqli_error($conn));
		$v_checkadmin = $q_checkadmin->num_rows;
		if($v_checkadmin == 1){
			echo '
				<script type = "text/javascript">
					alert("Organismo ya registrado.");
					window.location = "dashboard.php";
				</script>
			';
		}else{
			$conn->query("INSERT INTO `organismos` VALUES('','$user_org', '$user_id', '$user_tipo', '$user_rep','$user_dir','$user_postal')") or die(mysqli_error($conn));
			$org_id = mysqli_insert_id($conn);
			

			echo '
				<script type = "text/javascript">
					alert("Registro de organismo con exito.");window.location = "organismos.php";
				</script>
			';
		}
	}	


 ?>