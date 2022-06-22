<?php

session_start();


if(!isset($_SESSION['unique_id'])){
   echo "session not set";
}
else{
    echo "session set";
}


?>