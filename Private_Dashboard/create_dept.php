<?php

 require_once("include/connection.php");
   
   if(isset($_POST['regdept'])){
    
        
         $dept = mysqli_real_escape_string($conn,$_POST['dept']);
         $operador = mysqli_real_escape_string($conn,$_POST['operador']);
		 $org = mysqli_real_escape_string($conn,$_POST['org']);

	$q_checkadmin = $conn->query("SELECT * FROM `departamento` WHERE `dept` = '$dept'") or die(mysqli_error());
		$v_checkadmin = $q_checkadmin->num_rows;
		if($v_checkadmin == 1){
			echo '
				<script type = "text/javascript">
					alert("Departamento ya registrado.");
					window.location = "admin_log.php";
				</script>
			';
		}else{
			$conn->query("INSERT INTO `departamento` VALUES('', '$dept', '$operador', '$org')") or die(mysqli_error());
			echo '
				<script type = "text/javascript">
					alert("Registro exitoso");window.location = "admin_log.php";
				</script>
			';
		}
	}	


 ?>