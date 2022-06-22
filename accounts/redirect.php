<?php

  session_start();

  if(isset($_SESSION['unique_id'])){
    #header("location:/Real_Talk/HomePage/");
    echo "redirect";
  }
  else{echo "dont";}
  
?>