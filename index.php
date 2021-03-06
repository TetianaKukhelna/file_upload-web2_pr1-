<?php
    if(isset($_GET["path"])){
        $dir = "files/" . $_GET["path"];
    }
    else
        $dir = "files/";
?>

<?php
    $dir = "home/xkukhelna/public_html/files/";
    $adresar = scandir($dir);
    foreach($adresar as $polozka){
        var_dump(is_dir("files/" . $polozka));
        if(is_dir("files/".$polozka)){
            $link = "?path=".$polozka;
            echo "<a href='".$link."'>{$polozka}</a>";
            echo "<br>";
        }
        else
            echo $polozka . "<br>";
    }
?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Files upload</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="main.css">
</head>

<body>
<script src="scripts.js"></script>
<br><br>
<form id="data" action="stranka.php" method="post" enctype="multipart/form-data">
    <label for="fileToUpload">Meno suboru:</label>
    <input id="text" type="text" name="filename">
    <input id="fileToUpload" type="file" name="fileToUpload">
    <input id="submit" type="submit" value="Upload" name="submit" class="tlac">
</form>

</body>
</html>