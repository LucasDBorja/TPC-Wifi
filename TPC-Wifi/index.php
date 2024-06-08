<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Transferência de Arquivos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <nav>
            <button onclick="showSection('internalUpload')">Fazer Upload (Pasta de Uploads)</button>
            <button onclick="showSection('externalUpload')">Fazer Upload (Pasta de Pent)</button>
            <button onclick="showSection('internalDownload')">Baixar da Pasta de Uploads</button>
            <button onclick="showSection('externalDownload')">Baixar da Pasta de Pent</button>
        </nav>
        
        <div id="internalUpload" class="section" style="display: none;">
            <h1>Fazer Upload (Pasta de Uploads)</h1>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="folder" value="uploads">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload File" name="submit">
            </form>
        </div>

        <div id="externalUpload" class="section" style="display: none;">
            <h1>Fazer Upload (Pasta de Pent)</h1>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="folder" value="pent">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload File" name="submit">
            </form>
        </div>

        <div id="internalDownload" class="section" style="display: none;">
            <h1>Baixar Arquivos (Pasta de Uploads)</h1>
            <ul>
                <?php
                $dir = "uploads/";
                if (is_dir($dir)){
                    if ($dh = opendir($dir)){
                        while (($file = readdir($dh)) !== false){
                            if ($file != "." && $file != "..") {
                                echo "<li><a href='uploads/$file' download>$file</a></li>";
                            }
                        }
                        closedir($dh);
                    }
                }
                ?>
            </ul>
        </div>

        <div id="externalDownload" class="section" style="display: none;">
            <h1>Baixar Arquivos (Pasta de Pent)</h1>
            <ul>
                <?php
                $dir = "pent/";
                if (is_dir($dir)){
                    if ($dh = opendir($dir)){
                        while (($file = readdir($dh)) !== false){
                            if ($file != "." && $file != "..") {
                                echo "<li><a href='pent/$file' download>$file</a></li>";
                            }
                        }
                        closedir($dh);
                    }
                }
                ?>
            </ul>
        </div>
    </div>

    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.section').forEach(section => {
                section.style.display = 'none';
            });
            document.getElementById(sectionId).style.display = 'block';
        }
    </script>
</body>
</html>
