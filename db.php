<?php

  mysqli_connect("localhost", "root", "", "register");
   
  
  if (mysqli_connect_error()) {
  
      echo "Connection Error.";
  
  } else {
  
    //   echo "Database Connection Successfully.";
  }

?>