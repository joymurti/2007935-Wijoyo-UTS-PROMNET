<?php
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    } else {
        header("location: index.php");
    }
    
    include 'config.php';

    $id_menu = $_GET['id'];

    $result = mysqli_query($link, "SELECT * FROM menu WHERE id_menu='$id_menu'");
    while ($row = mysqli_fetch_array($result)) {
        $img = $row["gambar"];
    }

    $old_image = __DIR__.'/img/'.basename($img);
    if (!unlink($old_image)) { 
        echo ("$old_image Tidak bisa dihapus"); 
    } 

    $sql = "DELETE FROM menu WHERE id_menu='$id_menu'";
    mysqli_query($link, $sql);
    header("location: menu.php");

?>