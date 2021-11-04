<?php 
    require 'functions.php';

    if (isset($_POST["register"])) {
        if (registrasi($_POST) > 0){
            echo "<script>
                    alert('User Baru Berhasil Ditambahkan');
                  </script";
        }else{
            echo mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <!-- CSS -->
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="container">
        <h1>Halaman Registrasi</h1>
        <form action="" method="POST">
            <label for="username">Username : </label>
            <input type="text" name="username" id="username" required autocomplete="off">


            <label for="password">Password : </label>
            <input type="password" name="password" id="password" required autocomplete="off">


            <label for="password2">Konfirmasi Password : </label>
            <input type="password" name="password2" id="password2" required autocomplete="off">

            <button type="submit" name="register">Daftar!</button>
            <button type="reset">Reset</button>
        </form>
    </div>
</body>

</html>