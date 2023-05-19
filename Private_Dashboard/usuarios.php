<!DOCTYPE html>
<html lang="en">
<?php

// Inialize session
session_start();
error_reporting(0);
   require_once("include/connection.php");
  $id = mysqli_real_escape_string($conn,$_GET['id_usuario']);


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
    $(document).on("click", ".edit-user", function() {
  var userId = $(this).data("user-id");
  $.ajax({
    url: "get_user.php?id=" + userId,
    method: "GET",
    success: function(data) {
      var user = JSON.parse(data);
      $("#update_user input[name=id]").val(user.id);
      $("#update_user input[name=fname]").val(user.fname);
      $("#update_user input[name=email]").val(user.email);
      $("#update_user input[name=pass]").val(user.pass);
      $("#update_user select[name=tipo]").val(user.tipo);
      
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


              $r = mysqli_query($conn,"SELECT * FROM usuarios where id_usuario = '$id'") or die (mysqli_error($con));

              $row = mysqli_fetch_array($r);

               $id=$row['email'];
               $user=$row['nombre_usuario'];
              

            ?>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
                <li style="margin-top: 10px;">Bienvenido!</font> <?php echo ucwords(htmlentities($user)); ?></li>
           
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
          <i class="fas fa-microscope mr-3"></i>Departamentos</a>
              <a href="user_log.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-chalkboard-teacher mr-3"></i>Sesiones de usuarios</a>
    <!--     <a href="#" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-money-bill-alt mr-3"></i>Orders</a> -->
      </div>
    <!-- Sidebar -->
    </div>
    <!-- Sidebar -->
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
            <a href="dashboard.php">Inicio </a>
            <span>/</span>
            <span>Usuarios</span>
          </h4>
        </div>
      </div>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Agregar usuario
</button>

<div class="modal" id="myModal">

<form action="create_Admin.php" method="POST">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-user-plus"></i> Agregar usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
           <div class="md-form mb-5">
        </div>
        <form>
  <div class="form-group">
    <label for="text">Nombre completo</label> 
    <input id="text" name="nombre" type="text" class="form-control" required="required">
  </div>
  <div class="form-group">
    <label for="text1">Correo electrónico</label> 
    <input id="text1" name="email" type="text" class="form-control" required="required">
  </div>
  <div class="form-group">
    <label for="text2">Contraseña</label> 
    <input id="text2" name="pass" type="text" class="form-control" required="required">
  </div>
  
  <div class="form-group">
    <label for="select">Tipo de usuario</label> 
    <div>
      <select id="select" name="tipo" class="custom-select">
        <option value="admin">Administrador</option>
        <option value="usuario">Usuario</option>
        <option value="operador">Operador</option>
      </select>
    </div>
  </div> 
  </form>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-info" name="reg" >Registrar</button>
      </div>
    </div>
  </div>
</div>
</form>
</div>
<div class="">
  
 <table id="dtable" class = "table table-striped">
          <thead>
              <th>Nombre</th>
              <th>Correo electrónico</th>
              <th>Contraseña</th>
              <th>Permisos</th>
               <th>Opciones</th>
          </thead><br /><br />
          <tbody>
          <?php
require_once("include/connection.php");

$query = "SELECT * FROM usuarios";
$result = mysqli_query($conn,$query);
while($rs=mysqli_fetch_array($result)){
  $id =  $rs['id_usuario'];
  $fname=$rs['nombre_usuario'];
  $email=$rs['email'];
  $pass=$rs['admin_password'];
  $tipo=$rs['tipo_usuario'];
?>       
    
    <tr>
    <td width='15%'><?php echo $fname; ?></td>
    <td width='10%'><?php echo $email; ?></td>
    <td width="10%"><?php echo str_repeat("•", 20); ?></td>
    <td width="5%"><?php echo $tipo; ?></td>
    <td align='center' width="1%"> 
    <a href="#" class="edit-user" data-toggle="modal" data-target="#update_user" data-user-id="<?php echo $id; ?>">
  <i class="far fa-edit"></i>
</a>

<a href="delete_admin.php?id=<?php echo htmlentities($rs['id_usuario']); ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este elemento?')">
  <i class='far fa-trash-alt'></i>
</a>
      
    </td>
  </tr>
       
<?php
}
?>


</tbody>
</table>
<hr>
</div>
<div class="footer">
  <p>Universidad del Caribe &copy; <?php echo date('Y');?></p>
</div>
    <!--/.Copyright-->

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
<div class="modal fade" id="update_user">
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
  $query = "SELECT * FROM usuarios WHERE id_usuario=" . $_GET['id'];
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $fname = $row['nombre_usuario'];
    $email = $row['email'];
    $pass = $row['admin_password'];
    $tipo = $row['tipo_usuario'];
  }
}
?>

    <form action="update_admin.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
      <div class="form-group">
        <label for="fname">Nombre de usuario:</label>
        <input type="text" id="fname" name="fname" class="form-control" value="<?php echo $fname; ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" value="<?php echo $email; ?>" required>
      </div>
      <div class="form-group">
        <label for="pass">Contraseña:</label>
        <input type="password" id="pass" name="pass" class="form-control" value="<?php echo $pass; ?>" required>
      </div>
      <div class="form-group">
        <label for="tipo">Tipo de usuario:</label><br>
        <select id="tipo" name="tipo" class="custom-select">
          <option value="Administrador" <?php if($tipo == 'admin') echo 'selected'; ?>>Administrador</option>
          <option value="Usuario" <?php if($tipo == 'user') echo 'selected'; ?>>Usuario</option>
          <option value="Operador" <?php if($tipo == 'op') echo 'selected'; ?>>Operador</option>
        </select>
      </div>
    </div>
    <input type="hidden" name="id_usuario" value="<?php echo $id; ?>">
    <!-- Modal footer -->
    <div class="modal-footer d-flex justify-content-center">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      <button type="submit" class="btn btn-primary" name="update"onclick="return confirm('¿Los cambios son correctos?')">Actualizar</button>
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
  $("#update_user").on('hide.bs.modal', function(){
    $(this).find('form').trigger('reset');
  });
});
</script>

</html>
