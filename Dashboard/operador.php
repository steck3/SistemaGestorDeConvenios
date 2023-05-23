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

          <!-- Left -->
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
          <i class="fas fa-chart-pie mr-3"></i>Panel principal
        </a>
         
        
        
         <a href="organismo_op.php" class="list-group-item list-group-item-action waves-effect">
         <i class="fas fa-solid fa-school mr-3"></i>Organismos</a>
        <a href="document_op.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-folder mr-3"></i>Convenios</a>
          <a href="departamento.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-microscope mr-3"></i>Departamentos</a>
       
      </div>
    <!-- Sidebar -->

  <!--Add admin-->
 
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



      </div>


<div class="">
  
 <table id="dtable" class = "table table-striped">


          <thead>
              <th>Organismo</th>
              <th>id_org</th>
              <th> Tipo de institucion</th>
              <th>Representante</th>
               <th>Action</th>
          </thead><br /><br />
          <tbody>
     <?php
         require_once("include/connection.php");

            $query="SELECT * FROM organismos";
            $result=mysqli_query($conn,$query);
            while($rs=mysqli_fetch_array($result)){
                $id =  $rs['id'];
               $fname=$rs['nombre'];
               $admin=$rs['id_org'];
               $tipo=$rs['tipo'];
               $rep=$rs['representante'];
           
          ?>       
    
           <tr>
               <td width='10%'><?php echo  $fname; ?></td>
               <td align='left'><?php echo $admin; ?></td>
               <td align='center'><?php echo $tipo; ?></td>
               <td align='center'><?php echo $rep; ?></td>
               <td align='center'><a href="#modalRegisterFormss?id=<?php echo $id;?>"><i class="fas fa-user-edit" data-toggle="modal" data-target="#modalRegisterFormss"></i></a>  <a href="delete_user.php?id=<?php echo htmlentities($rs['id']); ?>"><i class='far fa-trash-alt'></i></a></td>
            
           </tr>
       
    <?php  } ?>
       </tbody>
   </table>

<!-- <div class="text-center">
  <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalRegisterForm">Launch
    Modal Register Form</a>
</div> -->
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






<div class="modal fade" id="modalRegisterFormss" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
    <?php 

require_once("include/connection.php");
  
$q = mysqli_query($conn,"select * from login_user where id = '$id'") or die (mysqli_error($conn));
 $rs1 = mysqli_fetch_array($q);
 
               $id1=$rs1['id'];
               $fname1=$rs1['nombre_usuario'];
               $admin1=$rs1['email_address'];
               $pass1=$rs1['user_password'];
               $status=$rs1['user_status'];
?>
  <div class="modal-dialog" role="document">
    <form method="POST">
    
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-user-edit"></i> Editar Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body mx-3">
           <div class="md-form mb-5">
            <input type="hidden" class="form-control" name="id" value="<?php echo $id1;?>"><br>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" name="nombre_usuario" value="<?php echo $fname1;?>" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Nombre</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="orangeForm-email" name="email_address" value="<?php echo $admin1;?>" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-email">Correo Electronico</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="orangeForm-pass" name="user_password" value="<?php echo $pass1;?>" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Contraseña</label>
        </div>
       <div class="md-form mb-4">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" name="status" value = "Usuario" class="form-control validate" readonly="">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Status </label>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" name="edit">ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>
</form>

  <!--modal--->
 <?php 

 require_once("include/connection.php");

  
 if(isset($_POST['edit'])){
         $user_name = mysqli_real_escape_string($conn,$_POST['nombre_usuario']);
         $email_address = mysqli_real_escape_string($conn,$_POST['email_address']);
         $user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT, array('cost' => 12));  
       //  $user_status = mysqli_real_escape_string($conn,$_POST['status']);

     mysqli_query($conn,"UPDATE `login_user` SET `nombre_usaurio` = '$user_name', `email_address` = '$email_address', `user_password` = '$user_password' where id='$id'") or die (mysqli_error($conn));
  
  echo "<script type = 'text/javascript'>alert('Success Edit User/Employee!!!');document.location='view_user.php'</script>";

}

?>
</html>



