<?php

$data = json_decode(file_get_contents('php://input'), true);

// echo exec("bash phpExec");
echo "<pre>";
echo shell_exec('bash pullGit');
echo "</pre>";
// foreach ($data as $data2 => $value) {
//     echo "{ ".$data2." : ".$value." } \n\n";
// }

// $pull  = shell_exec('eval "$(ssh-agent -s)"');
// echo $pull;
// $pull  = shell_exec('ssh-add  ~/.ssh/githubssh');
// echo $pull;
// $pull  = shell_exec('git pull  origin master');
// echo $pull;

// $pull  = shell_exec('GREEN="\033[0;32m" && echo"$GREEN CHANGES PULLED SUCCESSFULLY "');
// echo $pull;


function execPrint($command) {
    $result = array();
    exec($command, $result);
    print("<pre>");
    foreach ($result as $line) {
        print($line . "\n");
    }
    print("</pre>");
}
// Print the exec output inside of a pre element
// $command='eval$"(ssh-agent -s)"&ssh-add ~/.ssh/githubssh&&git pull origin master';
// execPrint($command)
// execPrint("python3 github__manager.py");
// execPrint("git status");


// echo shell_exec("python3 github__manager.py");
// echo $reply;

?>
