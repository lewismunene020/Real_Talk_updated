<?php

$data = json_decode(file_get_contents('php://input'), true);

foreach ($data as $data2 => $value) {
    echo "{ ".$data2." : ".$value." } \n\n";
}

$pull  = exec(' eval "$(ssh-agent -s)" && ' );
echo $pull;
$pull  = exec('ssh-add  ~/.ssh/githubssh &&');
echo $pull;
$pull  = exec('git pull  origin master &&');
echo $pull;

$pull  = exec('GREEN="\033[0;32m" && echo"$GREEN CHANGES PULLED SUCCESSFULLY "');
echo $pull;

$reply  = shell_exec("./pullGit")


?>