<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Files upload</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="main.css">
    <script src="sorttable.js"></script>
</head>

<body>
<script src="scripts.js"></script>
<br><br>
<form id="data" action="stranka.php" method="post" enctype="multipart/form-data">
    <label for="fileToUpload">Meno suboru:
    <input id="text" type="text" name="name"></label>
    <input id="fileToUpload" type="file" name="fileToUpload">
    <input id="submit" type="submit" value="Upload" name="submit" class="tlac">
</form>

<table class="sortable"  style="border:2px solid #721c24;">

    <tr class="border" style="padding:5px;border:1px solid #000; ">
        <th style="background-color:#000;color:white;">Meno</th>
        <th style="background-color:#000;color:white;">Velkost</th>
        <th style="background-color:#000;color:white;">Datum</th>
    </tr>

    <tbody>
    <?php
    if(isset($_GET["path"])){
        $dir = "files/" . $_GET["path"];
    }
    else
        $dir = "files/";
    ?>

    <?php
    $dir = "/home/xkukhelna/public_html/files/";
    $dir_handle=@opendir($dir) or die("Unable to open $dir");


    while ($file=readdir($dir_handle))
    {

        if (is_dir("$dir/$file")) {
            echo "<tr><td style='padding:5px;border:1px solid #000; '><a href='index.php?link=$dir/$file'>$file</td>\n";
            echo "<td style='padding:5px;border:1px solid #000; '>". filesize($file)."</td>\n";
            echo "<td style='padding:5px;border:1px solid #000; '>".date ("F d Y H:i:s.". filemtime($file))."</td>\n";
            echo "</tr>";
        } else {
            echo "<tr><td style='padding:5px;border:1px solid #000; '>$file</td>\n";
            echo "<td style='padding:5px;border:1px solid #000; '>". filesize($file),"</td>\n";
            echo "<td style='padding:5px;border:1px solid #000; '>".date ("F d Y H:i:s.". filemtime($file))."</td>\n";
            echo "</tr>";
        }

    }
    closedir($dir_handle);

    if(!empty($name)){
        echo "<p>Meno: $name</p>";
    }
    ?>
    </tbody>
</table>

</body>
</html>