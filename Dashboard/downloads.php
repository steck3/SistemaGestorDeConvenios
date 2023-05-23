<?php 

require_once("include/connection.php");

if (isset($_GET['file_id'])) {
    $id = mysqli_real_escape_string($conn,$_GET['file_id']);

    // fetch file path from database
    $sql = "SELECT ruta_archivo FROM convenios WHERE id_conv=$id";
    $result = mysqli_query($conn, $sql);

    if ($result !== false && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $filepath = '../uploads/' . $row['ruta_archivo'];

        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($filepath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            readfile($filepath);
            exit;
        } else {
            echo "El archivo no existe en el servidor.";
        }
    } else {
        echo "No se pudo obtener la ruta del archivo de la base de datos.";
    }

}
