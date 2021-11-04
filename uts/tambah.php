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
    //cek apakah tombol submit telah ditekan atau belum
    if(isset($_POST["submit"])){
        
        // cek apakah data berhasil ditambah atau tidak
        if (tambah($_POST) > 0) {
            
            echo "
            <script>
	            alert('Data Berhasil Ditambahkan!');
	            document.location.href = 'admin.php';
            </script>
            ";     
        }
        else{
            echo "
            <script>
	            alert('Data Gagal Ditambahkan!');
	            document.location.href = 'admin.php';
            </script>
            ";    
            //echo mysqli_error($conn);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <!-- My CSS -->
    <link rel="stylesheet" href="css\tambah.css">
</head>

<body>
    <div>
        <h1>Tambah Data Makanan</h1>
        <form action="" method="POST">
            <label for="nama">Nama Makanan : </label>
            <input type="text" name="nama" id="nama" autocomplete="off" required>
            <label for="harga">Harga Makanan : </label>
            <input type="text" name="harga" id="harga" autocomplete="off" required>
            <label for="foto">Foto Makanan : </label>
            <input type="text" name="foto" id="foto" autocomplete="off" required>
            <button type="submit" name="submit">Submit</button>
            <button type="reset">Reset</button>
        </form>
    </div>
</body>

</html>