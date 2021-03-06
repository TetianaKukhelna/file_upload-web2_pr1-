<?php
header('Content-Type: application/json; charset=utf-8');
$upload = "/home/xkukhelna/public_html/files/";
$target_file = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
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
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
echo '<section class="main">';
    echo '<div class="border-r-20 blocks" >';
        echo '<div class="marg_20">Meno </div>';
        echo '<div class="marg_20"> Velkost </div>';
        echo '<div class="marg_20"> Datum </div>';
    echo    '</div>';
echo '</section>';