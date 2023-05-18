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
$(document).on("click", ".edit_org", function() {
  var orgId = $(this).data("org-id");
  $.ajax({
    url: "get_org.php?id=" + orgId,
    method: "GET",
    success: function(data) {
      var org = JSON.parse(data);
      $("#update_org input[name=id_orga]").val(org.id_orga);
      $("#update_org input[name=nombre]").val(org.nombre);
      $("#update_org input[name=alias]").val(org.alias);
      $("#update_org input[name=tipo]").val(org.tipo);
      $("#update_org input[name=rep]").val(org.rep);
      $("#update_org input[name=dir]").val(org.dir);
      $("#update_org input[name=cp]").val(org.cp);
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

               $id=$row['nombre_usuario'];
               // $fname=$row['fname'];
               // $lname=$row['lname'];

            ?>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
                <li style="margin-top: 10px;">Bienvenido, </font> <?php echo ucwords(htmlentities($id)); ?></li>
           
            
            <li class="nav-item">
              <a href="logout.php" class="nav-link border border-light rounded waves-effect">
               <i class="far fa-user-circle"></i>Cerrar sesión
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
         
         <a href="view_admin.php" class="list-group-item list-group-item-action waves-effect">
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

  <!--Add admin-->
 
<!--end modaladmin-->
  <!--Add organismo-->
  <div class="modal fade" id="modalRegisterForm2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  
<!--end modalorganismo-->

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
            <a href="dashboard.php">Inicio</a>
            <span>/</span>
            <span>Organismos</span>
          </h4>

        </div>

      </div>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalOrg">
        Agregar Organismo
      </button>
      <div class="modal" id="ModalOrg">
      <form action="create_org.php" method="POST">
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
    <label for="alias">Alias</label> 
    <input id="alias" name="alias" type="text" required="required" class="form-control">
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
    <textarea id="textarea" name="dir" cols="40" rows="5" class="form-control"></textarea>
  </div>
  <div class="form-group">
    <label for="text">Código postal</label> 
    <input id="text" name="postal" type="text" class="form-control">
  </div> 

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-info" name="regorg">Registrar</button>
      </div>
    </div>
  </div>
</div>
</form>
      </div>
<div class="">
 <table id="dtable" class = "table table-striped">
          <thead>
              <th>Organismo</th>
              <th>Alias</th>
              <th>Tipo de institución</th>
              <th>Representante</th>
              <th>Dirección</th>
              <th>Codigo postal</th>
              <th>Opciones</th>
          </thead><br /><br />
          <tbody>
     <?php
         require_once("include/connection.php");
            $query="SELECT * FROM organismos";
            $result=mysqli_query($conn,$query);
            while($rs=mysqli_fetch_array($result)){
               $id_orga=$rs['id_orga'];
               $nombre=$rs['nombre']; 
               $alias=$rs['alias'];
               $tipo=$rs['tipo'];
               $rep=$rs['representante'];
               $dir=$rs['direccion'];
               $cp=$rs['codigo postal'];
          ?>       
    <tr>
    <td width='15%'><?php echo $nombre; ?></td>
    <td width='5%'><?php echo $alias; ?></td>
    <td width="8%"><?php echo $tipo; ?></td>
    <td width="10%"><?php echo $rep; ?></td>
    <td width="10%"><?php echo $dir; ?></td>
    <td width="5%"><?php echo $cp; ?></td>
    <td align='center' width="1%"> 
    <a href="#" class="edit_org" data-toggle="modal" data-target="#update_org" data-org-id="<?php echo $id_orga; ?>">
  <i class="far fa-edit"></i>
</a>

<a href="delete_org.php?id=<?php echo htmlentities($rs['id_orga']); ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este elemento?')">
  <i class='far fa-trash-alt'></i>
</a>
      
    </td>
  </tr>
       
    <?php  } ?>
       </tbody>
   </table>
    <hr></div>  
  </footer>
  <!--/.Footer-->

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

   <div class="modal fade" id="update_org">
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
  $query = "SELECT * FROM organismos WHERE id_orga=" . $_GET['id'];
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $alias = $row['alias'];
    $tipo = $row['tipo'];
    $rep = $row['representante'];
    $dir = $row['direccion'];
    $cp = $row['codigo postal'];
  }
}
?>

    <form action="update_org.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
      <div class="form-group">
        <label for="nombre">Nombre del organismo:</label>
        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $nombre; ?>" required>
      </div>
      <div class="form-group">
        <label for="alias">Alias:</label>
        <input type="text" id="alias" name="alias" class="form-control" value="<?php echo $alias; ?>" required>
      </div>
      <div class="form-group">
        <label for="tipo">Tipo:</label>
        <input type="text" id="tipo" name="tipo" class="form-control" value="<?php echo $tipo; ?>" required>
      </div>
      <div class="form-group">
        <label for="rep">Representante:</label>
        <input type="text" id="rep" name="rep" class="form-control" value="<?php echo $rep; ?>" required>
      </div>
      <div class="form-group">
        <label for="dir">Dirección:</label>
        <input type="text" id="dir" name="dir" class="form-control" value="<?php echo $dir; ?>" required>
      </div>
      <div class="form-group">
        <label for="cp">Código postal:</label>
        <input type="text" id="cp" name="cp" class="form-control" value="<?php echo $cp; ?>" required>
      </div>
      </div>
    <input type="hidden" name="id_orga" value="<?php echo $id_orga; ?>">
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
  $("#update_org").on('hide.bs.modal', function(){
    $(this).find('form').trigger('reset');
  });
});
</script>

</html>
