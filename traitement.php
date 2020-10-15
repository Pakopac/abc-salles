<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>abc-salles</title>
</head>
<body>
<form enctype="multipart/form-data" action="traitement.php" method="post">
    <input name="file" type="file">
    <button>Valider</button>
</form>
</body>
</html>
<?php
    if ( isset($_FILES["file"])) {

        //if there was an error uploading the file
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

        }
        else {

            $row = 1;
            if (($handle = fopen($_FILES["file"]["name"], "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $num = count($data);
                    $row++;
                    for ($c=0; $c < $num; $c++) {
                        echo $data[$c] . "<br />\n";
                    }
                }
                fclose($handle);
            }
        }
    } else {
        echo "No file selected <br />";
    }


