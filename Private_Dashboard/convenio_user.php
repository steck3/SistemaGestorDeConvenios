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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/3.0.3/purify.min.js" integrity="sha512-TBmnYz6kBCpcGbD55K7f4LZ+ykn3owqujFnUiTSHEto6hMA7aV4W7VDPvlqDjQImvZMKxoR0dNY5inyhxfZbmA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="medias/css/dataTable.css" />
    <script src="medias/js/jquery.dataTables.js" type="text/javascript"></script>
 <!--   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> -->
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

$(document).on('click', '.file-info', function() {
  // Obtener el ID del convenio
  var id_conv = $(this).data('id');
  
  // Hacer una llamada AJAX para obtener los datos del convenio
  $.ajax({
    url: 'get_convenio.php',
    type: 'POST',
    data: {id_conv: id_conv},
    success: function(data) {
      // Actualizar el contenido del modal con los datos obtenidos
      $('#myModal .modal-body').html(data);
    }
  });
});
</script>

<script>
$(document).on('click', '#download-pdf', function() {
  window.jsPDF = window.jspdf.jsPDF;

  // Obtener el contenido del modal
  var content = $('#myModal .modal-body')[0];

  // Obtener el nombre del convenio
  var name = $('#myModal .modal-title').text().trim().replace(/\s+/g, '_');

  // Crear un nuevo objeto jsPDF
  var pdf = new jsPDF();

  // Convertir el contenido del modal en una imagen con html2canvas
  html2canvas(content).then(function(canvas) {
    // Agregar la imagen al archivo PDF
    pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, pdf.internal.pageSize.width, pdf.internal.pageSize.height);

// Descargar el archivo PDF
pdf.save(name + '.pdf');
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
               $r = mysqli_query($conn,"SELECT * FROM usuarios where id_usuario = '$id'") or die (mysqli_error($conn));
               $row = mysqli_fetch_array($r);
               $id=$row['nombre_usuario'];
            ?>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
                <li style="margin-top: 10px;">Bienvenido,  </font> <?php echo ucwords(htmlentities($id)); ?></li>
            
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
        <a href="dashboard_user.php" class="list-group-item active waves-effect">
          <i class="fas fa-chart-pie mr-3"></i>Panel principal
        </a>
        <a href="convenio_user.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-folder mr-3"></i>Convenios</a>
        
   
      </div>
    <!-- Sidebar -->
    </div>
  <!--Add admin-->
<!--end modaladmin-->
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
       <td width="15%"><a href='downloads.php?file_id=<?php echo $id; ?>'  class="btn btn-sm btn-outline-primary"><i class="fas fa-download"></i></a> 
       <a href='#<?php echo $id; ?>' data-id='<?php echo $id; ?>' data-toggle='modal' data-target='#myModal' class='btn btn-sm btn-outline-primary file-info'><i class='fa fa-file' id='file-<?php echo $id; ?>'></i></a>
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