<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloc de Notas | Inicio</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body>

    <div class="d-flex">
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h5>Opciones</h5>
                <hr>
            </div>

            <!--Div para menu-->
            <div class="menu">
                <h5 class="subtitle">Directorio</h4>
                <a href="index.php" class="d-block p-3"><i class="fa-solid fa-folder-tree mr-2 lead"></i> Ver Directorio</a>
                <a href="php/newFolder.php" class="d-block p-3"><i class="fa-solid fa-folder-plus mr-2 lead"></i> Crear Carpeta</a>
                <hr>
                <h5 class="subtitle">Archivos</h4>
                <a href="php/newFile.php" class="d-block p-3"><i class="fa-solid fa-file-pen mr-2 lead"></i> Crear y guardar archivo</a>
                <a href="php/openFile.php" class="d-block p-3"><i class="fa-solid fa-file-lines mr-2 lead"></i> Abrir archivo (modo lectura)</a>
                <a href="php/deleteFile.php" class="d-block p-3"><i class="fa-solid fa-file-circle-minus mr-2 lead"></i> Eliminar archivo</a>
            </div>
        </div>

        <div class="w-100">
            <nav class="navbar bg-primary">
                <div class="container-fluid d-flex flex-row justify-content-start align-items-center mb-0">
                    <img src="assets/nota.png" alt="Logo" width="50" height="35">
                    <h3 style="color:#FFFFFF; margin-left: 10px; margin-top: 5px;"> Carpetas | Archivos  </h3>
                </div>
            </nav>

            <div class="container abs-center me-5">
                <div class="">
                        <?php

                            $directory ="directorio/";
                            $openFolder = opendir($directory);
                
                            while ($archive = readdir($openFolder)){
                                if ($archive !== "." && $archive !== ".."){
                                    if(is_dir("directorio/" . $archive)){
                                        echo "<br><h4 class='label'>Carpeta: $archive</h4>";
                                        echo "<table class='table'>
                                                <thead>
                                                <tr>
                                                <th scope='col'>Archivos</th>
                                                <th scope='col'>Tamaño</th>
                                                <th scope='col'>Ultima modificacion</th>
                                                </tr>
                                                </thead>";

                                        $nameFile = "directorio/". $archive;
                                        $files = scandir($nameFile);

                                        if(count($files)>2){
                                            echo "<tbody>";
                                            for ($i=0; $i<count($files); $i++){
                                                if($files[$i] !== "." && $files[$i] !== ".." ){
                                                    $rt = $nameFile . "/" . $files[$i];
                                                    echo "<tr>
                                                            <td>". $files[$i] . "</td>
                                                            <td>". filesize($rt) . " bytes </td>
                                                            <td>". date("F d Y H:i:s.", filectime($rt)) ."</td>
                                                            </tr>";
                                                }
                                            }
                                            echo "</tbody></table>";
                                        } else {
                                            echo "<br><h4 class='label'>No se han creado carpetas en el directorio</h4>";;
                                        }

                                    }
                                }
                            }
                        ?>
                    
                </div>

                <?php

                ?> 
            </div>
        </div>
    </div>

<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>

</body>
</html>