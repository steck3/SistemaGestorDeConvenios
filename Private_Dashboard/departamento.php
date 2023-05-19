<!DOCTYPE html>
<html lang="en">
<?php

// Inialize session
session_start();
error_reporting(0);
        require_once("include/connection.php");
  $id = mysqli_real_escape_string($conn,$_GET['id']);


// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['email'])) {
header('Location: index.html');
}
else{
    $uname=$_SESSION['email'];
  //  $desired_dir="user_data/$uname/";
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
<script> 
    $(document).on("click", ".edit-dept", function() {
  var deptId = $(this).data("dep-id");
  $.ajax({
    url: "get_dep.php?id=" + deptId,
    method: "GET",
    success: function(data) {
      var dept = JSON.parse(data);
      $("#update_dep input[name=id_dept]").val(dept.id_dept);
      $("#update_dep input[name=dept]").val(dept.dept);
      $("#update_dep input[name=op]").val(dept.op);
      $("#update_dep input[name=org]").val(dept.org);
    }
  });
});

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

  </style>

    <script src="jquery.min.js"></script>
<script type="text/javascript">
  $(window).on('load', function(){
    //you remove this timeout
    setTimeout(function(){
          $('#loader').fadeOut('slow');  
      });
      //remove the timeout
      //$('#loader').fadeOut('slow'); 
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
          <ul class="navbar-nav mr-auto">    
          </ul>
            <?php 
             require_once("include/connection.php");
               $id = mysqli_real_escape_string($conn,$_SESSION['email']);
               $r = mysqli_query($conn,"SELECT * FROM usuarios where id_usuario = '$id'") or die (mysqli_error($con));
               $row = mysqli_fetch_array($r);
               $id=$row['email'];
            ?>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
                <li style="margin-top: 10px;">Bienvenido!</font> <?php echo ucwords(htmlentities($id)); ?></li>
           
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
        <a href="dashboard.php" class="list-group-item active waves-effect">
          <i class="fas fa-chart-pie mr-3"></i>Panel principal
        </a>
         
         <a href="usuarios.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-users mr-3"></i>Usuarios</a>
        
         <a href="organismos.php" class="list-group-item list-group-item-action waves-effect">
         <i class="fas fa-solid fa-university mr-3"></i>Organismos</a>
        <a href="convenio.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-folder mr-3"></i>Convenios</a>
        <a href="departamento.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-microscope mr-3"></i>Departamento</a>
              <a href="user_log.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-chalkboard-teacher mr-3"></i>Sesiones de usuarios</a>

      </div>
    <!-- Sidebar -->
  <!--Add admin-->
<!--end modaladmin-->
  <!--Add organismo-->
  <div class="modal fade" id="modalRegisterForm2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

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
            <span>Departamentos</span>
          </h4>
        </div>
      </div>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modaldep">
        Nuevo registro
      </button>
      <div class="modal" id="Modaldep">
      <form action="create_dept.php" method="POST">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-user-plus"></i> Agregar departamento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
           <div class="md-form mb-5">
 </div>
 <div class="form-group row">
    <label for="dept" class="col-4 col-form-label">Departamento</label> 
    <div class="col-8">
      <input id="dept" name="dept" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="operador" class="col-4 col-form-label">Operador</label> 
    <div class="col-8">
      <input id="operador" name="operador" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="org" class="col-4 col-form-label">Organismo</label> 
    <div class="col-8">
    <?php 

      require_once("include/connection.php");
      $resultado = mysqli_query($conn, "SELECT nombre FROM organismos");
      echo '<select id="org" name="org" aria-describedby="orgHelpBlock" required="required" class="custom-select">';
      while ($fila = mysqli_fetch_array($resultado)) {
      echo '<option value="' . $fila["nombre"] . '">' . $fila["nombre"] . '</option>';
       }
      echo '</select>';
      mysqli_free_result($resultado);

      ?>
    </div>
  </div> 
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-info" name="regdept">Registrar</button>
      </div>
    </div>
  </div>
</div>
</form>
      </div>
<div class="">  
<table id="dtable" class = "table table-striped">

<thead>
    <th>Id</th>
    <th>departamento</th>
    <th>operador</th>
    <th>Organismo
     <th>Action</th>
</thead><br /><br />
<tbody>
<?php
require_once("include/connection.php");
$query="SELECT * FROM departamento";
$result=mysqli_query($conn,$query);
while($rs=mysqli_fetch_array($result)){
  $id_dept=$rs['id_dept'];
  $dept=$rs['dept'];
  $operador=$rs['operador'];
  $org=$rs['org'];
?>

<tr>
  <td width="5%"><?php echo $id_dept; ?></td>
  <td width="15%"><?php echo $dept; ?></td>
  <td width="15%"><?php echo $operador; ?></td>
  <td width="15%"><?php echo $org; ?></td>
  <td width="1%">
  <a href="#" class="edit-dept" data-toggle="modal" data-target="#update_dep" data-dep-id="<?php echo $id_dept; ?>">
  <i class="fas fa-user-edit"></i></a>  
  
    <a href="delete_dept.php?id=<?php echo htmlentities($rs['id_dept']); ?>"onclick="return confirm('¿Estás seguro de que deseas eliminar este elemento?')">
      <i class='far fa-trash-alt'></i>
    </a>
  </td>
</tr>

<?php
}
?>
</tbody>
</table>

    <hr></div>
    
  </footer>
  <!--/.Footer-->

<!-- Card -->
  <!-- /Start your project here-->

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
   <!--modal--->


   <div class="modal fade" id="update_dep">
  <div class="modal-dialog">
    <div class="modal-content">

    <!-- Modal Header -->
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold"><i class="far fa-edit"></i> Editar usuario</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal body -->
    <div class="modal-body mx-3">
    <?php
require_once("include/connection.php");
if(isset($_GET['id'])) {
  $query = "SELECT * FROM departamento WHERE id_dept=" . $_GET['id'];
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $dept = $row['dept'];
    $op = $row['operador'];
    $org = $row['org'];

  }
}
?>

    <form action="update_dep.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
      <div class="form-group">
        <label for="dept">Departamento:</label>
        <input type="text" id="dept" name="dept" class="form-control" value="<?php echo $dept; ?>" required>
      </div>
      <div class="form-group">
        <label for="op">Operador:</label>
        <input type="text" id="op" name="op" class="form-control" value="<?php echo $op; ?>" required>
      </div>
      <div class="form-group">
        <label for="org">Organismo:</label>
        <div class="form-group">
    <?php 

      require_once("include/connection.php");
      $resultado = mysqli_query($conn, "SELECT nombre FROM organismos");
      echo '<select id="org" name="org" aria-describedby="orgHelpBlock" required="required" class="custom-select">';
      while ($fila = mysqli_fetch_array($resultado)) {
      echo '<option value="' . $fila["nombre"] . '">' . $fila["nombre"] . '</option>';
       }
      echo '</select>';
      mysqli_free_result($resultado);

      ?>
    </div>
      </div>
     
    <input type="hidden" name="id_dept" value="<?php echo $id_dept; ?>">
    <!-- Modal footer -->
    <div class="modal-footer d-flex justify-content-center">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      <button type="submit" class="btn btn-primary" name="update"  onclick="return confirm('¿Los cambios son correctos?')">Actualizar</button>
    </div>

  </div>
</div>

        </form>
      </div>

    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  $("#update_dep").on('hide.bs.modal', function(){
    $(this).find('form').trigger('reset');
  });
});
</script>
</html>
