<?php 

    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();
    
    setcookie('dragonslash', '', time() - 3601);
    setcookie('xiao', '', time() - 3601);

    echo "<script> document.location.href = 'login.php'; </script>";  
?>