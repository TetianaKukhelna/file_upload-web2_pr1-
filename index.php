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
<form id="data" action="upload.php" method="post" enctype="multipart/form-data">
    <label for="fileToUpload">Meno suboru:
    <input id="text" type="text" name="name"></label>
    <input id="fileToUpload" type="file" name="fileToUpload">
    <input id="submit" type="submit" value="Upload" name="submit" class="tlac">
</form>



</body>
</html>