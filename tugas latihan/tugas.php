<?php 
    //membuat koneksi antara database dengan file php
    $conn = mysqli_connect("localhost","root","", "bertaniilmu");
    $panen = mysqli_query($conn, "SELECT * FROM datapanen"); //return object
    $tanam = query("SELECT * FROM datapanen"); //return array dari mysqli_fetch_asosoc
    var_dump($tanam);
    
    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $row[] = $result;
        while($row = mysqli_fetch_assoc($result)){
            $baris[] = $row; 
        }
        if (!isset($baris)) {
            $baris = NULL;
        }
        return $baris;
    }

    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM datapanen WHERE id = $id");
        return mysqli_affected_rows($conn);
    }
    
    function tambah($data){
        global $conn;
        //mengatasi user iseng -> htmlspecialchars
        $nama = htmlspecialchars($data["nama"]);
        $hasil = htmlspecialchars($data["hasil"]);
        $lama = htmlspecialchars($data["lama"]);
        $tanggal = htmlspecialchars($data["tanggal"]);

        $query = "INSERT INTO datapanen
                    VALUES
                    ('', '$nama','$hasil','$lama','$tanggal')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function ubah($data){
        global $conn;
        //mengatasi user iseng -> htmlspecialchars
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $hasil = htmlspecialchars($data["hasil"]);
        $lama = htmlspecialchars($data["lama"]);
        $tanggal = htmlspecialchars($data["tanggal"]);

        $query = "UPDATE datapanen SET 
                    nama = '$nama',
                    hasil = '$hasil',
                    lama = '$lama',
                    tanggal = '$tanggal'
                  WHERE id = $id
                    ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

        if (isset($_POST["submit"])) {
            if (!isset($_GET['aksi'])) {
                if(tambah($_POST) > 0 ){
                    echo " <script> alert('Data Berhasil Ditambahkan!'); document.location.href = 'tugas.php'; </script>";
                }
                else{
                    echo mysqli_error($conn);    
                }
            }
         }

         if(isset($_GET['aksi'])){
            echo mysqli_error($conn);
            if ($_GET['aksi'] == 'hapus') {
                if(hapus($_GET['id']) > 0){
                    echo "<script> alert('Data Berhasil Dihapus!'); document.location.href = 'tugas.php'; </script>";
                    $aksi == NULL;
                }
                    else{
                        echo mysqli_error($conn);
                    }
            }
            else if($_GET['aksi'] == 'ubah' && isset($_POST["submit"])){
                if (ubah($_POST) > 0) {
                    echo "<script> alert('Data Berhasil Diubah!'); document.location.href = 'tugas.php'; </script>";
                    $aksi == NULL;
                }

            }
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas PHP & Database</title>
    <style>
    .table,
    .table tr,
    .table th,
    .table td {
        border: 1px solid black;
        font-size: 1.3rem;
    }

    .table {
        width: 100%;
    }

    table h3 {
        padding: 2rem;
        margin: auto;
        text-align: center;
    }
    </style>
</head>

<body>
    <form action="" method="post">
        <fieldset>
            <legend>
                <h2>Tambah Data</h2>
            </legend>
            <?php
                if (!isset($_GET['aksi'])) {
                    $aksi = NULL;
                }
                else{
                    $aksi = $_GET['aksi']; 
                }
            ?>
            <?php if($aksi != 'ubah'): ?>
            <table>
                <tr>
                    <td><label for="nama">Nama Tanaman : </label></td>
                    <td><input type="text" name="nama" id="nama" required></td>
                </tr>
                <tr>
                    <td><label for="hasil">Hasil Panen : </label></td>
                    <td><input type="text" name="hasil" id="hasil" required> kg</td>
                </tr>
                <tr>
                    <td><label for="lama">Lama Tanam : </label></td>
                    <td><input type="text" name="lama" id="lama" required> bulan</td>
                </tr>
                <tr>
                    <td><label for="tanggal">Tanggal : </label></td>
                    <td><input type="date" name="tanggal" id="tanggal" required> bulan</td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <button type="submit" name="submit">Tambah</button>
                        <button type="reset">Bersihkan</button>
                    </td>
                </tr>
            </table>

            <?php else: ?>
            <?php 
                    
                    $id = $_GET['id'];
                    $change = query("SELECT * FROM datapanen WHERE id = $id ")[0]; 
                    
                    ?>
            <table>
                <tr>
                    <td><input type="hidden" name="id" value="<?= $change["id"]?>"></td>
                </tr>
                <tr>
                    <td><label for="nama">Nama Tanaman : </label></td>
                    <td><input type="text" name="nama" id="nama" required value="<?= $change['nama']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="hasil">Hasil Panen : </label></td>
                    <td><input type="text" name="hasil" id="hasil" required value="<?= $change['hasil']; ?>"> kg</td>
                </tr>
                <tr>
                    <td><label for="lama">Lama Tanam : </label></td>
                    <td><input type="text" name="lama" id="lama" required value="<?= $change['lama']; ?>"> bulan</td>
                </tr>
                <tr>
                    <td><label for="tanggal">Tanggal : </label></td>
                    <td><input type="date" name="tanggal" id="tanggal" required value="<?= $change['tanggal']; ?>">
                        bulan</td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <button type="submit" name="submit">Tambah</button>
                        <button type="reset">Bersihkan</button>
                    </td>
                </tr>
            </table>
            <?php endif; ?>
        </fieldset>
        <fieldset>
            <legend>
                <h2>Data Tabel</h2>
            </legend>
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Nama Tanaman</th>
                    <th>Hasil Panen</th>
                    <th>Lama Tanam</th>
                    <th>Tanggal Panen</th>
                    <th>Tindakan</th>
                </tr>
                <?php $i = 1; ?>
                <?php if(!isset($tanam)): ?>
                <tr>
                    <td colspan="6">
                        <h3>Data kosong!!!</h3>
                    </td>
                </tr>
                <?php else: ?>
                <?php foreach($tanam as $data): ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $data["nama"]; ?></td>
                    <td><?= $data["hasil"]; ?> kg</td>
                    <td><?= $data["lama"]; ?> bulan</td>
                    <td><?= $data["tanggal"]; ?></td>
                    <td>
                        <a href="tugas.php?id=<?=$data["id"]; ?>&aksi=ubah">Ubah</a> |
                        <a href="tugas.php?id=<?=$data["id"]; ?>&aksi=hapus"
                            onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </fieldset>
    </form>
</body>

</html>