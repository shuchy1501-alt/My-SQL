<?php

if(isset($_POST["btn_submit"])){

    $file = $_FILES["file"];

    $name = $file["name"];
    $tmp_name = $file["tmp_name"];
    $size = $file["size"];

    echo "<pre>";
    print_r($file);
    echo "</pre>";

    if($size <= (1024 * 1024)){ // 1 MB

        move_uploaded_file($tmp_name, "upload/".$name);

        echo "File Uploaded Successfully<br>";

        echo "<embed src='upload/$name' width='500' height='500'>";

    }else{

        echo "Allowed file size is 1 MB";

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>

    <form action="#" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="btn_submit">Upload</button>
    </form>

</body>
</html>