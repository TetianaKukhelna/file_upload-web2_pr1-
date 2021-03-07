<?php
header('Content-Type: application/json; charset=utf-8');
$upload = "/home/xkukhelna/public_html/files/";
$target_file = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$name=$_POST['name'];
$imageFileType = strtolower(pathinfo($target_file . basename($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION)));
    switch ($_FILES['upfile']['error']){
        case 0:
            break;
        case 1:
        case 2:
            throw new RuntimeException('Limit');
        case 4:
            throw new RuntimeException('No file sent');
        default:
            throw new RuntimeException('Unknown');
    }


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    $count = 1;
    $newtarget_file = $upload . "(".$count.")" . $name.".".$imageFileType;
    rename($target_file, $newtarget_file);
    $count += 1;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". ( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

echo '<table class="sortable"  style="border:2px solid #721c24;">';

    echo '<tr class="border" style="padding:5px;border:1px solid #000; ">';
        echo '<th style="background-color:#000;color:white;">Meno</th>';
        echo '<th style="background-color:#000;color:white;">Velkost</th>';
        echo '<th style="background-color:#000;color:white;">Datum</th>';
    echo '</tr>';

    echo '<tbody>';

    if(isset($_GET["path"])){
        $dir = "files/" . $_GET["path"];
    }
    else
        $dir = "files/";
    ?>

    <?php
    $dir = "/home/xkukhelna/public_html/files/";
    $dir_handle=@opendir($dir) or die("Unable to open $dir");

    $tmp_dir = dirname($_SERVER['SCRIPT_FILENAME'] . '/public_html');
    if(DIRECTORY_SEPARATOR==='\\') $tmp_dir = str_replace('/',DIRECTORY_SEPARATOR,$tmp_dir);
    $tmp = get_absolute_path($tmp_dir . '/' .$_REQUEST['file']);

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

    function get_absolute_path($path): string // Заменяет все вхождения строки поиска на строку замены
    {
        $path = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);
        $parts = explode(DIRECTORY_SEPARATOR, $path);
        $absolutes = [];
        foreach ($parts as $part) {
            if ('.' == $part) continue;
            if ('..' == $part) {
                array_pop($absolutes);
            } else {
                $absolutes[] = $part;
            }
        }
        return implode(DIRECTORY_SEPARATOR, $absolutes);
    }

    closedir($dir_handle);

    if(!empty($name)){
        echo "<p>Meno: $name</p>";
    }

    echo '</tbody>';
echo '</table>';
?>