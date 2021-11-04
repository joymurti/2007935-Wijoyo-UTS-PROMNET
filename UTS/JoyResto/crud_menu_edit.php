<?php 
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    } else {
        header("location: index.php");
    }

    include 'config.php';

    if (isset($_GET['edit'])) {
        $id_menu = $_GET['edit'];
        $sql = "SELECT * FROM menu WHERE id_menu='$id_menu'";
        $result = mysqli_query($link, $sql);
    }

    if (isset($_POST['submit'])) {
        $nama = $_POST['nama_menu'];
        $harga = $_POST['harga'];
        $num_harga = (int)$harga;
        $deskripsi = $_POST['deskripsi'];

        $image = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageSize = $_FILES['image']['size'];
        $imageError = $_FILES['image']['error'];
        $imageExt = explode('.', $image);
        $imageActualExt = strtolower(end($imageExt));
        $allowedImg = array('jpg', 'jpeg', 'png');

        if (in_array($imageActualExt, $allowedImg)) {
            if ($imageError === 0) {
                if ($imageSize <= 500000) {
                    $imageDestination =  __DIR__.'/img/'.basename($image);
                    if (move_uploaded_file($imageTmpName, $imageDestination)) {
                        $sql = "UPDATE menu SET nama='$nama', deskripsi='$deskripsi', harga='$num_harga', gambar='$image' WHERE id_menu='$id_menu'";
                        mysqli_query($link, $sql);
                        header("location: menu.php");
                    } else {
                        echo "Data Tidak Berhasil Disimpan !";
                    }
                } else {
                    echo "Ukuran Gambar Terlalu Besar !";
                }
            } else {
                echo "Terdapat Error Saat Mengupload Gambar !";
            }
        } else {
            echo "Tipe Gambar Tidak Diperbolehkan !";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php  include 'head.php'; ?>
<link rel="stylesheet" href="crud_menu.css">
<body>
    <?php  include 'navbar.php'; ?>    

    <div class="transparan">
        <div class="container">
            <form action="" method="POST" enctype="multipart/form-data">
                <?php while ($row = mysqli_fetch_array($result)) { ?>
                <label for="nama">Nama Menu</label>
                <input type="text" id="nama_menu" name="nama_menu" placeholder="Nama Menu.." value="<?php echo $row['nama'];?>">

                <label for="harga">Harga</label>
                <input type="text" id="harga" name="harga" placeholder="Harga.." value="<?php echo $row['harga'];?>">

                <label for="image">UPLOAD ULANG Gambar Menu</label>
                <input type="file" id="image" name="image" accept="image/*">

                <label for="image_old">Gambar Menu Sebelum Update</label>
                <img src="img/<?php echo $row['gambar'];?>" id="img_old" name="img_old" style="height: 200px; width: 200px; text-align: center; display: block; margin-left: auto; margin-right: auto; width: 50%;">
                <br>

                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" placeholder="Deskripsi.." style="height:200px"><?php echo $row['deskripsi'];?></textarea>

                <input type="submit" name="submit" value="Submit">
                <a href="menu.php"><input type="button" value="< Back"></a>

                <?php

                    if (isset($_POST['submit'])) {
                        $old_image = __DIR__.'/img/'.basename($row["gambar"]);
                        if (!unlink($old_image)) { 
                            echo ("$old_image Tidak bisa dihapus"); 
                        } 
                    }

                ?>

                <?php } ?>
            </form>
        </div>
    </div>

    <?php  include 'footer.php'; ?>
    <?php  include 'script.php'; ?>
</body>
</html>