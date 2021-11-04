<?php 
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    } else {
        header("location: index.php");
    }
    include 'config.php';
    $sql = "SELECT * FROM menu";
    $result = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<?php  include 'head.php'; ?>
<link rel="stylesheet" href="menu.css">
<body>
    <?php  include 'navbar.php'; ?>      
    <div class="transparan" style="overflow-x:auto;">
        <a href="add_menu.php" id="link-id"><button id="add-btn">+ Menu</button></a>
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
                    <a href="crud_menu_edit.php?edit=<?php echo $row['id_menu']; ?>"><button class="update">Update</button></a>
                    <br>
                    <a href="delete.php?id=<?php echo $row['id_menu']; ?>"><button class="delete">Delete</button></a>
                </td>
            </tr>

            <?php } ?>
        </tbody>
        </table>
    </div>    

    <?php  include 'footer.php'; ?>
    <?php  include 'script.php'; ?>
</body>
</html>