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
  <title>Sistema Gestor de Convenios</title>  <!-- Font Awesome -->
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
                "iDisplayLength": 10
                //"destroy":true;
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
          <!--   <li class="nav-item active">
              <a class="nav-link waves-effect" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#">About
                MDB</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#">Free
                download</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#">Free
                tutorials</a>
            </li> -->
          </ul>
            <?php 

             require_once("include/connection.php");


               $id = mysqli_real_escape_string($conn,$_SESSION['email']);


              $r = mysqli_query($conn,"SELECT * FROM usuarios where id_usuario = '$id'") or die (mysqli_error($con));

              $row = mysqli_fetch_array($r);

               $id=$row['email'];
               // $fname=$row['fname'];
               // $lname=$row['lname'];

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
    <!--     <a href="#" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-money-bill-alt mr-3"></i>Orders</a> -->
      </div>
    <!-- Sidebar -->

    </div>
  <!--Add admin-->
  <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
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
    <input id="text" name="text" type="text" class="form-control" required="required">
  </div>
  <div class="form-group">
    <label for="text1">Correo electrónico</label> 
    <input id="text1" name="text1" type="text" class="form-control" required="required">
  </div>
  <div class="form-group">
    <label for="text2">Contraseña</label> 
    <input id="text2" name="text2" type="text" class="form-control" required="required">
  </div>
  <div class="form-group">
    <label for="rol">Rol</label> 
    <div>
      <select id="rol" name="rol" required="required" class="custom-select">
        <option value="op_ext">Operador Externo</option>
        <option value="op_int">Operador Interno</option>
        <option value="rep_ext">Representante Externo</option>
        <option value="rep_int">Representante Interno</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="dep">Departamento</label> 
    <div>
      <select id="dep" name="dep" class="custom-select" required="required">
        <option value="rabbit">Rabbit</option>
        <option value="duck">Duck</option>
        <option value="fish">Fish</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="select">Tipo de usuario</label> 
    <div>
      <select id="select" name="select" class="custom-select">
        <option value="admin">Administrador</option>
        <option value="usuario">Usuario</option>
      </select>
    </div>
  </div> 
  </form>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-info" name="reg">Registrar</button>
      </div>
    </div>
  </div>
</div>
</form>
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
            <span>Sesiones de usuarios</span>
          </h4>
<!-- 
          <form class="d-flex justify-content-center">
       
            <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
            <button class="btn btn-primary btn-sm my-0 p" type="submit">
              <i class="fas fa-search"></i>
            </button>

          </form> -->

        </div>

      </div>
      <!-- Heading -->
      <div class="">
    <!--   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalRegisterForm">Add File</button> -->
    <a href="convenio.php"><button type="button" class="btn btn-info"><i class="fas fa-chevron-circle-left"></i>  Document</button></a>
    </div>
  
<hr>
 
 <div class="col-md-12">

  <table id="dtable" class = "table table-striped" style="">
     <thead>

    <!-- <th>ID</th> -->
    <th>USER LOGGED</th>    
     <th>YOUR IP</th>
     <th>HOST</th>
     <th>ACTION</th> 
     <th>TIMEIN</th>
     <th>ACTION</th> 
     <th>TIMEOUT</th>


</thead>
<tbody>

    
    <tr>
        <?php 
   
        require_once("include/connection.php");

      $query = mysqli_query($conn,"SELECT * from history_log") or die (mysqli_error($conn));
      while($file=mysqli_fetch_array($query)){
       //  $id =  $file['id'];
         $name =  $file['email_address'];
         $ip =  $file['ip'];
         $host =  $file['host'];
         $action =  $file['action'];
         $logintime =  $file['login_time'];
         $actions =  $file['actions'];
         $logouttime =  $file['logout_time'];
      
    
      ?>
     
      <!-- <td><?php echo  $id; ?></td> -->
      <td><?php echo $name; ?></td>
       <td><?php echo $ip; ?></td>
      <td><?php echo $host; ?></td>
      <td><?php echo $action; ?></td>
      <td><?php echo $logintime; ?></td>
      <td><?php echo $actions; ?></td>
      <td><?php echo $logouttime; ?></td>

    </tr>
<?php } ?>
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

</html>
