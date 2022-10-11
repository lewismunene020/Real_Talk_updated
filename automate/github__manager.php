<?php

$data = json_decode(file_get_contents('php://input'), true);

foreach ($data as $data2 => $value) {
    echo "{ ".$data2." : ".$value." } \n\n";
}

$pull  = exec("./pullGit");
echo $pull;
?>