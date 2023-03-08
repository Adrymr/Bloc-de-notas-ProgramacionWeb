<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloc de Notas | Inicio</title>
    <link rel="stylesheet" href="../styles.css">
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
                <a href="../index.php" class="d-block p-3"><i class="fa-solid fa-folder-tree mr-2 lead"></i> Ver Directorio</a>
                <a href="newFolder.php" class="d-block p-3"><i class="fa-solid fa-folder-plus mr-2 lead"></i> Crear Carpeta</a>
                <hr>
                <h5 class="subtitle">Archivos</h4>
                <a href="newFile.php" class="d-block p-3"><i class="fa-solid fa-file-pen mr-2 lead"></i> Crear y guardar archivo</a>
                <a href="openFile.php" class="d-block p-3"><i class="fa-solid fa-file-lines mr-2 lead"></i> Abrir archivo (modo lectura)</a>
                <a href="deleteFile.php" class="d-block p-3"><i class="fa-solid fa-file-circle-minus mr-2 lead"></i> Eliminar archivo</a>
            </div>
        </div>

        <div class="w-100">
            <nav class="navbar bg-primary">
                <div class="container-fluid d-flex flex-row justify-content-start align-items-center mb-0">
                    <img src="../assets/nota.png" alt="Logo" width="50" height="35">
                    <h3 style="color:#FFFFFF; margin-left: 10px; margin-top: 5px;">Notas | Nueva nota</h3>
                </div>
            </nav>

            <div class="container">
                <div class="abs-center me-5">
                    <form class="form" action="#" method="post"><br>
                    <label for="folderName" class="label mb-2">Carpeta</label><br>
                    <input type="text" name="folderName" class="inputS mb-4" placeholder="Indique el nombre de la carpeta" required><br>

                    <label for="fileName" class="label mb-2">Titulo de la nota</label><br>
                    <input type="text" name="fileName" class="inputS mb-4" placeholder="Asunto" required><br>

                    <label for="fileContent"  class="label mb-2">Contenido de la nota</label><br>
                    <textarea name="fileContent" id="content" cols="80" rows="10" class="textArea" style="border: 2px solid #4e475e; border-radius: 5px;" placeholder="Escribe tu nota aquí" required></textarea><br>

                    <input type="submit" name="btn-guardar" value=" Crear y Guardar">
                    </form>
                </div>

                <?php
                        if(isset($_POST["btn-guardar"]) && isset($_POST["folderName"]) && isset($_POST["fileName"])){
                            $folder = "../directorio/" . $_POST["folderName"];
                            if (is_dir($folder)){
                                $nameFile = $folder . "/". $_POST["fileName"] . ".txt";

                                if(is_file($nameFile) == false){
                                    $file = fopen($nameFile,"w+") or die ("Error al abrir el archivo");
                                    $fileContent= $_POST["fileContent"];
                                    fwrite($file, $fileContent);
                                    echo "<h4 class='label mb-3' style='text-align:center'>Archivo creado correctamente:" . $nameFile . "</h4>";
                                }else {
                                    echo "<h4 class='label mb-3' style='text-align:center'>Ya existe un archivo con el mismo nombre</";
                                }

                            }else{
                                echo "<h4 class='label mb-3' style='text-align:center'>No existe la carpeta: " . $folder . "</h4";
                            }
                            
                        }    
                ?> 
            </div>
        </div>
    </div>

<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>

</body>
</html>
