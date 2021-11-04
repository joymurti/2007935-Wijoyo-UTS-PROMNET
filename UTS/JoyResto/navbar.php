<div class="navbar" id="nav">
        <a href="index.php" id="logo"><span><i style="font-family: Italianno; font-size: 20px;">JoyResto</i></span></a>
        <a href="index.php#home">Home</a>
        <a href="index.php#about">About</a>
        <a href="index.php#reservation">Reservation</a>
        <a href="index.php#menu">Menu</a>
        <?php 
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        ?>
            <a href="admin.php" style="background-color: #F9C56A;">Add Menu</a>
            <a href="logout.php" class="login">Logout</a>
            <a href="" class="login" style="background-color: #000000; color: white; cursor: default;">Hi, <?php echo $_SESSION['username'];  ?></a>
            <a href="menu-petugas.php" style="background-color: #F9C56A;" class="login">Admin</a>
        <?php } else { ?>
            <a href="login.php" class="login">Login</a>            
        <?php } ?>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>            
</div>
