<?php 
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    } else {
        header("location: index.php");
    }
    include 'config.php';
    $sql = "SELECT * FROM users";
    $result = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<?php  include 'head.php'; ?>
<link rel="stylesheet" href="menu.css">
<body>
    <?php  include 'navbar.php'; ?>      
    <div class="transparan" style="overflow-x:auto;">
        <br>
        <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Waktu Daftar</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($result)){ ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
            </tr>

            <?php } ?>
        </tbody>
        </table>
    </div>    

    <?php  include 'footer.php'; ?>
    <?php  include 'script.php'; ?>
</body>
</html>