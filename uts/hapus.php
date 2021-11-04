<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        echo "
            <script>
	            document.location.href = 'login.php';
            </script>
              "; 
    }
    require 'functions.php';
    $id = $_GET["id"];
    if(hapus($id) > 0){
        echo "
            <script>
	            alert('Data Berhasil Dihapus!');
	            document.location.href = 'admin.php';
            </script>
            ";   
    }
    else{
        echo "
            <script>
	            alert('Data Gagal dihapus!');
	            document.location.href = 'admin.php';
            </script>
            ";   
    }

?>