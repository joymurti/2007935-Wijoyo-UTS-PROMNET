<?php 
    include 'koneksi.php';

    // Insert Data
    if (isset($_POST['submit'])){
        $id = time();
        $nama = $_POST['nama'];
        $hasil = $_POST['hasil'];
        $lama = $_POST['lama'];
        $tanggal = $_POST['tanggal'];
        if(!empty($nama) && !empty($hasil) && !empty($lama) && !empty($tanggal)){
            $sql = "INSERT INTO detail_tanaman (id, nama, hasil, lama, tanggal) VALUES(".$id.",'".$nama."','".$hasil."','".$lama."','".$tanggal."')";
            $simpan = mysqli_query($conn, $sql);
        } else echo "<script>alert('Tidak dapat menyimpan, data belum lengkap!');</script>";
    } 
    
    // Update Data
    else if (isset($_GET['submit'])) {
        $id = $_GET['id'];
        $nama = $_GET['nama'];
        $hasil = $_GET['hasil'];
        $lama = $_GET['lama'];
        $tanggal = $_GET['tanggal'];
        $sql_update = "UPDATE detail_tanaman SET nama='$nama', hasil='$hasil', lama='$lama', tanggal='$tanggal' WHERE id='$id'";
        $simpan_update = mysqli_query($conn, $sql_update);
    }

    // Tampil Data Edit Pada Form
    if (isset($_GET['edit'])) {
        $edit_id = $_GET['edit'];
        $sql_edit = "SELECT * FROM detail_tanaman WHERE id='$edit_id'";
        $edit = mysqli_query($conn, $sql_edit);
    }
    
    // Delete Data
    else if (isset($_GET['del'])) {
        $del_id = $_GET['del'];
        $sql_del = "DELETE FROM detail_tanaman WHERE id='$del_id'";
        $delete = mysqli_query($conn, $sql_del);
    }

    // Tampil Data
    $sql_select = "SELECT * FROM detail_tanaman";
    $select = mysqli_query($conn, $sql_select);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Latihan-1</title>
</head>
<body>
    <?php if (isset($_GET['edit'])) { ?>
    <form action="" method="GET">
    <?php } else { ?>        
    <form action="" method="POST">
    <?php } ?>        
        <fieldset>
            <legend>Tambah Data</legend>
            <?php if(isset($_GET['edit'])) { ?>
                <?php while ($data = mysqli_fetch_array($edit)) { ?>
                Nama Tanaman <input type="text" name="nama" value="<?php echo $data['nama']; ?>"> <br>
                Hasil Panen <input type="text" name="hasil" value="<?php echo $data['hasil']; ?>"> kg <br>
                Lama Tanam <input type="text" name="lama" value="<?php echo $data['lama']; ?>"> bulan <br>
                Tanggal Panen <input type="date" name="tanggal" value="<?php echo $data['tanggal']; ?>"> <br>
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <?php } ?>
            <?php } else { ?>
                Nama Tanaman <input type="text" name="nama"> <br>
                Hasil Panen <input type="text" name="hasil"> kg <br>
                Lama Tanam <input type="text" name="lama"> bulan <br>
                Tanggal Panen <input type="date" name="tanggal"> <br>
            <?php } ?>    
            <input type="submit" value="<?php if(isset($_GET['edit'])) { echo "Update"; } else { echo "Simpan"; } ?>" name="submit">             
            <?php if(isset($_GET['edit'])) { ?>
            <?php } else { ?>
            <input type="reset" value="Bersihkan">
            <?php } ?>
        </fieldset>
    </form>
    <br>
    <fieldset>
        <legend>Data Panen</legend>
        <table border="1">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nama Tanaman</td>
                    <td>Hasil Panen</td>
                    <td>Lama Tanam</td>
                    <td>Tanggal Panen</td>
                    <td>Tindakan</td>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($select)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['hasil']; ?></td>
                    <td><?php echo $row['lama']; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                    <td id="tindakan">
                        <a href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
                        <a href="index.php?del=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </fieldset>
</body>
</html>