<?php 
//koneksi ke database
    $conn = mysqli_connect("localhost","root","","restoranrafi");

    //mengambil data dari tabel mahasiswa
    $result = mysqli_query($conn, "SELECT * FROM menu");
    
    ////mengecek kesalahan pada koneksi anda
    // var_dump($result);
    // if (!$result) {
    //     echo mysqli_error($conn);
    // }

    //ambil data dari object result
    //mysqli_fetch_row
    //mysqli_fetch_assoc
    //mysqli_fetch_array
    //mysqli_fetch_object
    
    // while ($menu = mysqli_fetch_assoc($result)){
    //     var_dump($menu["nama"]);
    // }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Admin -->
    <link rel="stylesheet" href="css/admin.css">
    <title>Admin Restoran</title>
</head>

<body>
    <h1>Administrator</h1>
    <div class="container">
        <div class="tabel">
            <table>
                <tr>
                    <th>id</th>
                    <th>nama makanan</th>
                    <th>harga</th>
                    <th>foto</th>
                    <th>aksi</th>
                </tr>
                <?php $i = 1; ?>
                <?php while($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["harga"]; ?></td>
                    <td><img src="image/<?php echo $row["foto"]; ?>" alt=""></td>
                    <td>
                        <a href="#">Ubah</a> |
                        <a href="#">Hapus</a>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</body>

</html>