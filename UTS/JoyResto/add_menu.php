<?php 
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    } else {
        header("location: index.php");
    }

    include 'config.php';
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
                        $sql = "INSERT INTO menu (nama, deskripsi, harga, gambar) VALUES ('$nama', '$deskripsi', '$num_harga', '$image')";
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
                <label for="nama">Nama Menu</label>
                <input type="text" id="nama_menu" name="nama_menu" placeholder="Nama Menu..">

                <label for="harga">Harga</label>
                <input type="text" id="harga" name="harga" placeholder="Harga..">

                <label for="image">Gambar Menu</label>
                <input type="file" id="image" name="image" accept="image/*">

                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" placeholder="Deskripsi.." style="height:200px"></textarea>

                <input type="submit" name="submit" value="Submit">
                <a href="menu.php"><input type="button" value="< Back"></a>
            </form>
        </div>
    </div>

    <?php  include 'footer.php'; ?>
    <?php  include 'script.php'; ?>
</body>
</html>