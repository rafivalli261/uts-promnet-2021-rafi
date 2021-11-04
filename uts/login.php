<?php
    session_start();
    require 'functions.php';
    //cek cookie
    if(isset($_COOKIE["dragonslash"]) && isset($_COOKIE["xiao"])){
        $dragonslah = $_COOKIE["dragonslash"];
        $xiao = $_COOKIE["xiao"];

        //ambil username berdasarkan id
        $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $dragonslash");

        $row = mysqli_fetch_assoc($result);

        // cek cookie dan username
        if($xiao === hash('sha256', $row['username'])){
            $_SESSION["login"] = true;
        }

    }

    if (isset($_SESSION["login"])) {
            echo "<script>
                    document.location.href = 'admin.php';
                  </script>";   
    }
    

    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
        
        //cek username
        if(mysqli_num_rows($result) == 1){

            //cek password
            $row = mysqli_fetch_assoc($result);
            
            if(password_verify ($password , $row["password"]) ){
                // kalo pake header internal server error, 500
                // header('Location : admin.php;');
                // exit;

                // set sessionnya
                $_SESSION["login"] = true;

                //set remember me
                if (isset($_POST["remember"])) {
                    //buat cookienya
                    setcookie('dragonslash', $row["id"] , time()+3600);
                    setcookie('xiao', hash('sha256', $row['username']),time()+3600);
                }

                echo "
                    <script>
	                    // alert('Login Sukses!');
	                    document.location.href = 'admin.php';
                    </script>
                    "; 
            }
        }

        $error = true;
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <!-- CSS -->
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="container">
        <h1>Halaman Login</h1>
        <?php if(isset ($error) ) : ?>
        <p>Username / Password Salah</p>
        <?php endif ?>
        <form action="" method="post">
            <input type="text" name="username" id="username" required autocomplete="off" placeholder="Username">
            <input type="password" name="password" id="password" required autocomplete="off" placeholder="Password">
            <span>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>
            </span>
            <br>
            <button type="submit" name="login">Link Start</button>
        </form>

    </div>
</body>

</html>