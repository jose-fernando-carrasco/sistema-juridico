<?php

require 'conexion.php';
include 'api-google/vendor/autoload.php';


putenv('GOOGLE_APPLICATION_CREDENTIALS=cargararchivos-330922-f91ecc7117d4.json');

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->setScopes(['https://www.googleapis.com/auth/drive.file']);

try {
    $nombre = $_FILES['archivos']['name'];
    $extension = $_FILES['archivos']['type'];

    $service = new Google_Service_Drive($client);
    $file_path = $_FILES['archivos']['tmp_name'];

    $file = new Google_Service_Drive_DriveFile();
    $file->setName($nombre);

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $file_path);

    $file->setParents(array("1sbjl0KgwcdZpXppLu1Zcgx61PPtGGm9E"));
    $file->setDescription("Archivo cargado desde PHP");
    $file->setMimeType($mime_type);

    $resultado = $service->files->create(
        $file,
        array(
            'data' => file_get_contents($file_path),
            'mimeType' => "image/png",
            'uploadType' => 'media'
        )
    );

    $ruta = 'https://drive.google.com/open?id=' . $resultado->id;
    
    
    
    $sql = "INSERT INTO archivos(nombre, ruta, extension) VALUES ('$nombre', '$ruta', '$extension')";
    echo $sql;
    $mysqli->query($sql);
    echo '<a href="' . $ruta . '" target="_blank">'. $resultado->name .'</a>';


} catch(Google_Service_Exception $gs){
    $mensaje = json_decode($gs->getMessage());
    echo $mensaje->error->message();

} catch(Exception $e){
    echo $e->getMessage();

}