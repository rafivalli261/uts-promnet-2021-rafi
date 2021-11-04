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
    $menu_rafi = query("SELECT * FROM menu");

    //jika tombol cari ditekan
    if (isset($_POST['cari'])) {
        $menu_rafi = cari($_POST["keyword"]);
        if ($menu_rafi == NULL) {
        echo "
            <script>
            alert('Data Tidak Diketemukan!');
	        document.location.href = 'admin.php';
            </script>
              "; 
        }
    }
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Admin -->
    <link rel="stylesheet" href="admin.css" type="text/css">
    <title>Admin Restoran</title>
</head>

<body>
    <h1>Administrator</h1>
    <a href="tambah.php" class="tambah">Tambah Makanan</a>
    <a href="logout.php" class="logout">Logout</a>
    <form action="" method="POST">
        <button type="submit" name="cari">Cari Data</button>
        <input type="text" name="keyword" placeholder="Ketikkan kata kunci .." autocomplete="off">
    </form>
    <div class="container">
        <table>
            <tr>
                <th>No</th>
                <th>Nama Makanan</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($menu_rafi as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["harga"]; ?></td>
                <td><img src="image/<?= $row["foto"]; ?>" alt=""></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
                    <a href="hapus.php?id=<?= $row["id"]; ?>"
                        onclick="return confirm('Apakah anda yakin mau menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>