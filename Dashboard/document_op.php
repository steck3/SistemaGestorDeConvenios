<!DOCTYPE html>
<html lang="en">
<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['email'])) {
header('Location: index.html');
}

?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Sistema Gestor de Convenios</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>

    <script src="js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="medias/css/dataTable.css" />
    <script src="medias/js/jquery.dataTables.js" type="text/javascript"></script>
    <!-- end table-->
    <script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
      $('#dtable').dataTable({
                "aLengthMenu": [[5, 10, 15, 25, 50, 100 , -1], [5, 10, 15, 25, 50, 100, "All"]],
                "iDisplayLength": 10,
                language:{
                 
                  search:         "Buscar",
                  info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                  infoPostFix: "",
                  infoFiltered: "(filtrado de un total de _MAX_ registros)",
                  loadingRecords: "Cargando...",
                  lengthMenu: "Mostrar _MENU_ registros",
                  processing: "Procesando...",
                  searchPlaceholder: "Término de búsqueda",
                  zeroRecords: "No se encontraron resultados",
                  emptyTable: "Ningún dato disponible en esta tabla",

                  paginate:{
                    first:      "Primero",
                    previous:   "Anterior",
                    next:       "Siguiente",
                    last:       "Ultimo",
                  }
                }
            });
  })
    </script>

  <style>
          select[multiple], select[size] {
    height: auto;
    width: 20px;
}
.pull-right {
    float: right;
    margin: 2px !important;
}

    .map-container{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.map-container iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
#loader{
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('img/lg.flip-book-loader.gif') 50% 50% no-repeat rgb(249,249,249);
        opacity: 1;
    }
  </style>

    <script src="jquery.min.js"></script>
<script type="text/javascript">
  $(window).on('load', function(){
    //you remove this timeout
    setTimeout(function(){
          $('#loader').fadeOut('slow');  
      });
  
  });
</script>
</head>

<body class="grey lighten-3">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="#">
          <strong class="blue-text"></strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
         
          </ul>
            <?php 

             require_once("include/connection.php");
             $id = mysqli_real_escape_string($conn,$_SESSION['email']);
             $r = mysqli_query($conn,"SELECT * FROM usuarios where id_usuario = '$id'") or die (mysqli_error($conn));
             $row = mysqli_fetch_array($r);
             $id=$row['email'];

            ?>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
                <li style="margin-top: 10px;">Bienvenido!</font> <?php echo ucwords(htmlentities($id)); ?></li>
            <li class="nav-item">
              <a href="#" class="nav-link waves-effect" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link waves-effect" target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="nav-item">
            <a href="logout.php" class="nav-link border border-light rounded waves-effect"onclick="return confirm('¿Estás seguro de que deseas cerrar sesion?');">
               <i class="far fa-user-circle"></i>Cerrar sesion
              </a>
            </li>
          </ul>

        </div>

      </div>
    </nav>
    <!-- Navbar -->

     <!-- Sidebar -->
     <div class="sidebar-fixed position-fixed">
      <a class="img-fluid"><img src="img/logo_ucaribe.png" width="200px" height="85px" div style="margin: 20px;"  alt="Responsive image">
    </a>

    <div class="list-group list-group-flush">
          <a href="operador.php" class="list-group-item active waves-effect">
          <i class="fas fa-chart-pie mr-3"></i>Panel principal</a>
          <a href="organismo_op.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-solid fa-school mr-3"></i>Organismos</a>
          <a href="document_op.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-folder mr-3"></i>Convenios</a>
          <a href="departamento.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-microscope mr-3"></i>Departamentos</a>   
      </div>
    <!-- Sidebar -->
    </div>
  <!--Add admin-->
<!--end modaladmin-->
   <!--Add organismo-->
<div class="modal fade" id="modalRegisterForm2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <form action="location.php" method="POST">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-user-plus"></i> Agregar organismo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
           <div class="md-form mb-5">
 </div>
        <div class="form-group">
        <label for="org">Nombre del organismo</label> 
        <input id="org" name="org" type="text" required="required" class="form-control">
        </div>
        <div class="form-group">
    <label for="id_org">Identificador del organismo</label> 
    <input id="id_org" name="id_org" type="text" required="required" class="form-control">
  </div>

  <div class="form-group">
    <label for="tipo_org">Tipo de organismo</label> 
    <input id="tipo_org" name="tipo_org" type="text" required="required" class="form-control">
  </div>
  <div class="form-group">
    <label for="rep_ext">Representante legal del organismo</label> 
    <input id="rep_ext" name="rep_ext" type="text" class="form-control">
  </div>
  <div class="form-group">
    <label for="textarea">Dirección</label> 
    <textarea id="textarea" name="textarea" cols="40" rows="5" class="form-control"></textarea>
  </div>
  <div class="form-group">
    <label for="text">Código postal</label> 
    <input id="text" name="text" type="text" class="form-control">
  </div> 

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-info" name="reguser">Registrar</button>
      </div>
    </div>
  </div>
</div>
</form>
<!--end modalorganismo-->

  </header>
  <!--Main Navigation-->
 <div id="loader"></div>
  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">
          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="dashboard.php">Inicio</a>
            <span>/</span>
            <span>Convenios</span>
          </h4>
        </div>
      </div>   
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalDoc">
        Agregar convenio
      </button>
      <div class="modal" id="ModalDoc">
      <form action="create_conv.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="usuario" value="<?php echo $id ?>">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-file-medical"></i> Agregar convenio </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">          
    <div class="form-group">
        <label for="org">Nombre del convenio</label> 
        <input id="org" name="nombre" type="text" required="required" class="form-control">
        </div>
        <label for="org">Organismo</label> 
    <div class="form-group">
    <select id="org" name="org" aria-describedby="orgHelpBlock" required="required" class="custom-select">
<option value="">Seleccione un organismo</option>
<?php
require_once("include/connection.php");
$resultado = mysqli_query($conn, "SELECT nombre FROM organismos");
while ($fila = mysqli_fetch_array($resultado)) {
echo '<option value="' . $fila["nombre"] . '">' . $fila["nombre"] . '</option>';
}
mysqli_free_result($resultado);
?>
</select>
        <script>
        document.getElementById("org").addEventListener("change", function() {
       var organismo = this.value;
       var xhr = new XMLHttpRequest();
       xhr.open("GET", "get-data.php?organismo=" + organismo);
       xhr.onload = function() {
       if (xhr.status === 200) {
       var data = JSON.parse(xhr.responseText);
       var rep_ext = document.getElementById("rep_ext");
       var dept_ext = document.getElementById("dept_ext");
       var op_ext = document.getElementById("op_ext");
       rep_ext.innerHTML = "";
       dept_ext.innerHTML = "";
       op_ext.innerHTML = "";
       for (var i = 0; i < data.length; i++) {
       var option = document.createElement("option");
       option.value = data[i].nombre;
       option.text = data[i].nombre;
       rep_ext.appendChild(option);
       dept_ext.appendChild(option);
       op_ext.appendChild(option); 
       }
       }
        };
        xhr.send();
        });
        </script>



       
      <span id="orgHelpBlock" class="form-text text-muted">Seleccione o agregue la institución educativa.</span>
    </div>
    <div class="form-group">
    <label for="rep_ext">Representante Externo</label> 
    <div>
    <?php 
    require_once("include/connection.php");
    $res = mysqli_query($conn, "SELECT representante FROM organismos");
    echo '<select id="rep_ext" name="rep_ext"  required="required" class="custom-select">';
    while ($fila = mysqli_fetch_array($res)) {
    echo '<option value="' . $fila["representante"] . '">' . $fila["representante"] . '</option>';
    }
    echo '</select>';
    mysqli_free_result($res);
    ?>
    </div>
    </div>

   <div class="form-group">
    <label for="dept_ext">Departamento externo</label> 
    <div>
    <?php 
    require_once("include/connection.php");
    $res = mysqli_query($conn, "SELECT dept FROM departamento");
    echo '<select id="dept_ext" name="dept_ext"  required="required" class="custom-select">';
    while ($fila = mysqli_fetch_array($res)) {
    echo '<option value="' . $fila["dept"] . '">' . $fila["dept"] . '</option>';
    }
    echo '</select>';
    mysqli_free_result($res);
    ?>

      <span id="dep_ex" class="form-text text-muted">Departamento del operador externo.</span>
    </div>
  </div>
  <div class="form-group">
    <label for="op_ext">Operador Externo</label> 
    <div>
    <?php 
    require_once("include/connection.php");
    $res = mysqli_query($conn, "SELECT operador FROM departamento");
    echo '<select id="op_ext" name="op_ext"  required="required" class="custom-select">';
    while ($fila = mysqli_fetch_array($res)) {
    echo '<option value="' . $fila["operador"] . '">' . $fila["operador"] . '</option>';
    }
    echo '</select>';
    mysqli_free_result($res);
    ?>
    </div>
  </div>
  <div class="form-group">
    <label for="firma_ext">Firma externa</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fa fa-pencil-square-o"></i>
        </div>
      </div> 
      <input id="firma_ext" name="firma_ext" placeholder="DD/MM/YYYY" type="date" required="required" class="form-control">
     </div>
     </div> 
     <div class="form-group">
     <label for="rep_int">Representante Interno</label> 
     <div>
     <?php 
     require_once("include/connection.php");
      $res = mysqli_query($conn, "SELECT representante FROM organismos");
      echo '<select id="rep_int" name="rep_int"  required="required" class="custom-select">';
      while ($fila = mysqli_fetch_array($res)) {
      echo '<option value="' . $fila["representante"] . '">' . $fila["representante"] . '</option>';
      }
      echo '</select>';
      mysqli_free_result($res);
    ?>     
        </div>
        </div>
      <div class="form-group">
      <label for="dep_int">Departamento</label> 
      <div>
      <?php 
        require_once("include/connection.php");
        $res = mysqli_query($conn, "SELECT dept FROM departamento");
        echo '<select id="dept_int" name="dep_int"  required="required" class="custom-select">';
        while ($fila = mysqli_fetch_array($res)) {
        echo '<option value="' . $fila["dept"] . '">' . $fila["dept"] . '</option>';
        }
        echo '</select>';
         mysqli_free_result($res);
      ?>
      <span id="dep_intHelpBlock" class="form-text text-muted">Departamento del operador interno.</span>
      </div>
      </div> 
      <div class="form-group">
      <label for="op_int">Operador Interno</label> 
      <div>
      <?php 
    require_once("include/connection.php");
    $res = mysqli_query($conn, "SELECT operador FROM departamento");
    echo '<select id="op_int" name="op_int"  required="required" class="custom-select">';
    while ($fila = mysqli_fetch_array($res)) {
    echo '<option value="' . $fila["operador"] . '">' . $fila["operador"] . '</option>';
    }
    echo '</select>';
    mysqli_free_result($res);
    ?>
      </div>
      </div>
    <div class="form-group">
    <label for="firma_int">Firma interna</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fa fa-pencil-square-o"></i>
        </div>
      </div> 
      <input id="firma_int" name="firma_int" placeholder="DD/MM/YYYY" type="date" required="required" class="form-control">
    </div>
    </div>
  <div class="form-group">
    <label for="vigencia_inicio">Inicio del convenio</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fas fa-calendar-check-o"></i>
        </div>
      </div> 
      <input id="vigencia_inicio" name="vig_inicio" placeholder="DD/MM/YYYY" type="date" class="form-control">      
    </div>
  </div>
  <div class="form-group">
    <label for="vigencia_fin">Finalización del convenio</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fa fa-calendar-minus-o"></i>
        </div>
      </div> 
      <input id="vigencia_fin" name="vig_fin" placeholder="DD/MM/YYYY" type="date" class="form-control">
      </div>
      </div>   
    <div class="form-group">
    <label for="beneficios">Beneficios</label> 
    <textarea id="beneficios" name="beneficios" cols="40" rows="10" class="form-control"></textarea>
      </div>
    <div class="form-group">
      <label for="compromisos">Compromisos</label> 
      <textarea id="compromisos" name="compromisos" cols="40" rows="10" class="form-control"></textarea>
      </div> 
  
  <div class="form-group">
  <label for="myfile">Seleccione un archivo:</label>
  <input type="file" id="myfile" name="myfile"><br><br>
          <footer style="font-size: 16px"><b>File Type:</b><font color="red"><i>.pdf</i></font></footer>
</div>
  <div class="form-group">
    <button class="btn btn-info" name="regconv" type="submit" >Registrar</button>
  </div>
  </div>
  </div>
  </div>
</form>   
      </div>
      </div>
<hr>
 <div class="col-md-12">
 <table id="dtable" class = "table table-striped">
     <thead>
    <th>Nombre del convenio</th>
    <th>Organismo</th>
    <th>Status</th>
    <th>Inicio</th>
    <th>Fin</th>    
    <th>Subido por</th>
    <th>Opciones</th>
</thead>
<tbody>
    <tr>
        <?php    
        require_once("include/connection.php");
      $query = mysqli_query($conn,"SELECT * FROM convenio group by nombre DESC") or die (mysqli_error($conn));
      
      while($file=mysqli_fetch_array($query)){
         $id =  $file['id_conv'];
         $array =$id;
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
         $user =$file['usuario'];

         $fecha_actual = date('Y-m-d');
         $fecha_vencimiento = date_create($vigencia_f);
         $intervalo = date_diff(date_create($fecha_actual), $fecha_vencimiento);
 
         $status = ($intervalo->format('%R') === '-') ? 'Vencido' : 'Activo';
      ?>   
      <td width="15%"><?php echo  $name; ?></td>
      <td width="15%"><?php echo $org; ?></td>
      <td width="5%"><?php echo $status; ?></td>
       <td width="10%"><?php echo $vigencia_i; ?></td>
       <td width="10%"><?php echo $vigencia_f; ?></td>
       <td width="10%"><?php echo $user; ?></td>
       <td width="25%"><a href='downloads.php?file_id=<?php echo $id; ?>'  class="btn btn-sm btn-outline-primary"><i class="fas fa-download"></i></a> 
       <a href='#<?php echo $id; ?>' data-id='<?php echo $id; ?>' data-toggle='modal' data-target='#myModal' class='btn btn-sm btn-outline-primary file-info'><i class='fa fa-file' id='file-<?php echo $id; ?>'></i></a>
       <a href='delete_conv.php?id=<?php echo $id; ?>'  class="btn btn-sm btn-outline-danger"onclick="return confirm('¿Estás seguro de que deseas eliminar este elemento?')"><i class="fa fa-trash"></i></a> 
    </tr>
<?php } ?> 
<!-- Este es el modal donde se mostrarán los datos -->
<div class='modal fade' id='myModal' role='dialog'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
      <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-magnifying-glass"></i> Informacion del convenio </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      <div class='modal-body'>
        <!-- Aquí se mostrarán los datos de la tabla convenios -->
      </div>
      <div class='modal-footer'>
      <button type='button' id="download-pdf"  class='btn btn-default' ><i class="fa-sharp fa-solid fa-download"></i>Descargar PDF</button>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>
      </div>
    </div>  
  </div>
</div>
<!-- Este es el script que usa ajax para obtener los datos -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</tbody>
   </table>
    </div>  
    <!--Copyright-->
    <hr></div>
    <div class="footer-copyright py-3">
     <p>All right Reserved &copy; <?php echo date('Y');?> </p>
    </div>
    <!--/.Copyright-->
  </footer>
  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/mdb.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>   
<script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/1.0.3/css/dataTables.responsive.css">
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/1.0.3/js/dataTables.responsive.js"></script>
</body>
</html>