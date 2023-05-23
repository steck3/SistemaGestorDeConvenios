<?php
  require_once("include/connection.php");
  $id_conv = $_POST['id_conv'];
  $query = mysqli_query($conn, "SELECT * FROM convenio WHERE id_conv = $id_conv") or die(mysqli_error($conn));
  
  if ($file = mysqli_fetch_array($query)) {
         $name =  $file['nombre'];
         $org =  $file['organismo'];
         $status =$file['status'];
         $vigencia_i =  $file['vigencia_inicio'];
         $vigencia_f =  $file['vigencia_final'];
         $rep_ext =  $file['rep_ext'];
         $op_ext =  $file['op_ext'];
         $dep_ext =  $file['dept_ext'];
         $firma_ext =  $file['firma_ext'];
         $rep_int =  $file['rep_int'];
         $op_int =  $file['op_int'];
         $dep_int =  $file['dept_int'];
         $firma_int =  $file['firma_int'];
         $beneficio = $file['beneficios'];
         $comp = $file['compromisos'];

        // Obtener fecha actual
        $fecha_actual = date('Y-m-d');
        $fecha_vencimiento = date_create($vigencia_f);
        $intervalo = date_diff(date_create($fecha_actual), $fecha_vencimiento);

        $status = ($intervalo->format('%R') === '-') ? 'Vencido' : 'Activo';

    echo "<p><strong>Nombre:</strong> $name</p>";
    echo "<p><strong>Organismo:</strong> $org</p>";
    echo "<p><strong>Status:</strong> $status</p>";
    echo "<p><strong>Vigencia inicio:</strong> $vigencia_i</p>";
    echo "<p><strong>Vigencia final:</strong> $vigencia_f</p>";
    echo "<p><strong>Representante externo:</strong> $rep_ext</p>";
    echo "<p><strong>Operador externo:</strong> $op_ext</p>";
    echo "<p><strong>Departamento externo:</strong> $dep_ext</p>";
    echo "<p><strong>Fecha de firma externa:</strong> $firma_ext</p>";
    echo "<p><strong>Representante interno:</strong> $rep_int</p>";
    echo "<p><strong>Operador interno:</strong> $op_int</p>";
    echo "<p><strong>Departamento interno:</strong> $dep_int</p>";
    echo "<p><strong>Fecha firma interna:</strong> $firma_int</p>";
    echo "<p><strong>Beneficios:</strong> $beneficio</p>";
    echo "<p><strong>Compromiso:</strong> $comp</p>";
  }
?>
