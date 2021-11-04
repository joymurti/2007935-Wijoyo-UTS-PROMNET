<?php 
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    } else {
        header("location: index.php");
    }
    include 'config.php';
    $sql = "SELECT * FROM menu";
    $result = mysqli_query($link, $sql);

    if (isset($_GET['submit'])) {
        $sql = "SELECT * FROM menu WHERE nama LIKE '%".$_GET['search']."%' OR deskripsi LIKE '%".$_GET['search']."%'";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) == 0) {
            $show = "Data kosong !";
        } else {
            $show = "none";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php  include 'head.php'; ?>
<style>
</style>
<link rel="stylesheet" href="menu.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
    <?php  include 'navbar.php'; ?>      
    <div class="transparan" style="overflow-x:auto;">   
        <div class="flex-row">
            <div>
                <a href="add_menu.php" id="link-id"><button id="add-btn" class="normal-button">+ Menu</button></a>
            </div>
            <div>
                <form class="example" action="" method="GET">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit" name="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div> 
        <br>
        <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Menu</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($result)){ ?>
            <tr>
                <td><?php echo $row['id_menu']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['deskripsi']; ?></td>
                <td><?php echo $row["harga"]; ?></td>
                <td><img src="img/<?php echo $row['gambar']; ?>" alt="" srcset=""></td>
                <td>
                    <a href="crud_menu_edit.php?edit=<?php echo $row['id_menu']; ?>"><button class="update normal-button">Update</button></a>
                    <br>
                    <a href="delete.php?id=<?php echo $row['id_menu']; ?>"><button class="delete normal-button">Delete</button></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
        <br>
        <div class="alert" style="display: <?php echo $show ?>;">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            <strong><?php echo "Data not found!"; ?></strong>
        </div>
    </div>    

    <?php  include 'footer.php'; ?>
    <?php  include 'script.php'; ?>
</body>
</html>
