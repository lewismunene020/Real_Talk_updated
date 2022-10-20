<?php

$tmp_name = $_FILES["file"]["tmp_name"];
$image_name = $_FILES['file']['name'] ;


if (move_uploaded_file($tmp_name , "uploads" . $image_name)){
    echo "upload successful";
}
?>