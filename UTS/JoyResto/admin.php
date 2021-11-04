<?php 
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    } else {
        header("location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php  include 'head.php'; ?>
<link rel="stylesheet" href="admin.css">
<body>
    <?php  include 'navbar.php'; ?>      
    
    <div class="transparan">
        <div class="container">
            <h1>Data Menu</h1>
            <br>
            <img src="assets/food4.png">
            <a href="menu.php"><button>Click</button></a>
        </div>
    </div>

    <?php  include 'footer.php'; ?>
    <?php  include 'script.php'; ?>
</body>
</html>