<!DOCTYPE html>
<html lang="en">
<?php

session_start();
if(!isset($_SESSION["email"])){
    header("location:index.html");

} else{
    $uname = $_SESSION['email'];
}
const apiKey = 'ef321ccb85de46d88f204b51acfce59b';
const postalCode = '10001'; // Código postal a buscar
const endpoint = 'https://api.opencagedata.com/geocode/v1/json?q=${postalCode}&key=ef321ccb85de46d88f204b51acfce59b&language=es&pretty=1';
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Sistema Gestor de Convenios</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <style>

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

               $id=$row['nombre_usuario'];
               // $fname=$row['fname'];
               // $lname=$row['lname'];

            ?>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
                  <li style="margin-top: 10px;">Bienvenido, </font> <?php echo ucwords(htmlentities($id)); ?></li>
            <li class="nav-item">
            <a href="logout.php" class="nav-link border border-light rounded waves-effect"onclick="return confirm('¿Estás seguro de que deseas cerrar sesion?');">
               <i class="far fa-user-circle"></i>Cerrar sesión
              </a>
            </li>
          </ul>

        </div>

      </div>
    </nav>
    <!-- Navbar -->
 <div id="loader"></div>
    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">
      <a class="img-fluid"><img src="img/logo_ucaribe.png" width="200px" height="85px" div style="margin: 20px;"  alt="Responsive image">
    </a>

      <div class="list-group list-group-flush">
        <a href="dashboard.php" class="list-group-item active waves-effect">
          <i class="fas fa-chart-pie mr-3"></i>Panel principal
        <a href="convenio_user.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-folder mr-3"></i>Convenios</a>
        
      </div>
    <!-- Sidebar -->

  </header>
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
            <span>Panel principal</span>
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

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">

              <?php
                   require_once("include/connection.php");
                             $sql ="SELECT *,count(organismo) as count FROM convenio group by organismo;";
                             $result = mysqli_query($conn,$sql);
                             $chart_data="";
                             while ($row = mysqli_fetch_array($result)) { 
                                $name[]  = $row['organismo']  ;
                                $counts[] = $row['count'];
                            }                     
                    ?>
                <CENTER><h3 class="page-header" >NÚMERO DE CONVENIOS POR ORGANISMO</h3></CENTER>  
              <canvas id="myChart"width="400" height="150"></canvas>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 mb-4">

          <!--Card-->
          

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>

  <!-- Charts -->
  <script>
    // Line
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
     data: {
            labels:<?php echo json_encode($name); ?>,
            datasets: [{
                      backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#6ae27e", "#dc69e2", "#687be2", "#e28868", "#6c68e2", "#ab68e2", "#e268b7"],
                      // hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"],
                data:<?php echo json_encode($counts); ?>,
            }]
        },
      options: {
          legend: {
            display: false
          },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]

        }
      }
    });



    //pie
    


  
  </script>
</body>
</html>
