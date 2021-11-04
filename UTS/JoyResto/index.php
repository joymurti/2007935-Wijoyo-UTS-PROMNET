<?php 
    session_start();

    function rupiah($angka){
	
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
     
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php  include 'head.php'; ?>
<body>
    <?php  include 'navbar.php'; ?>      
    <div class="parallax-wrapper" id="home">
        <div class="content-home">
            <h1 id="title-text"><i>JoyResto</i></h1>
            <p id="intro-text">Serve You Better...</p>
        </div>
    </div>
    <div class="regular-wrapper" id="about">
        <div class="content" id="regular-content">
            <div class="title-container">
                <h1 class="title-text">The Restaurant</h1>
                <h3 class="subtitle-text">A little history of how we started.</h3>
                <hr>
            </div>
            <div class="history-content">
                <div class="history-isi"><img src="assets/food1.png"></div>
                <div class="history-isi">
                    <p style="text-align: justify; font-family: 'Josefin Sans', sans-serif;  letter-spacing: 1pt; word-spacing: 2pt;">
                        Dimulai dari cita-cita membangun cita rasa yang khas, kami memulai mendirikan sebuah tempat makan yang hangat dan menyenangkan. Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, eum illum voluptas odit veniam, eligendi quibusdam quae aperiam sequi modi, suscipit nemo ipsam! Temporibus praesentium error id, odit unde nihil? Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae inventore ratione voluptates. Perferendis animi facilis, aliquam officiis quae ut! Ullam tempora consequatur modi nemo dolorum eveniet nulla natus fugiat eum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati nemo placeat magnam. Asperiores praesentium sequi provident porro laboriosam necessitatibus quidem iusto suscipit repudiandae sapiente sunt, consectetur minima odio aliquid excepturi. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum officia, expedita temporibus at consequatur consectetur veritatis sequi nulla eos animi modi autem? Sequi soluta nobis ad velit possimus corrupti nisi?
                        <br><br>
                        <i style="font-family: Italianno; font-size: 48px;" id="ttd">El Joyo</i>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="regular-wrapper" id="special">
        <div class="content" id="regular-content">
            <div class="title-container">
                <h1 class="title-text" style="color: white;">Special for today!</h1>
                <h3 class="subtitle-text" style="color: white;">Check out our special menu today.</h3>
                <hr>
            </div>
            <div class="card">
                <div class="card-isi"><img src="assets/food1.png"></div>
                <div class="card-isi">
                    <div class="title-container">
                        <h2 class="title-text">Pancake</h1>
                        <h4 class="subtitle-text">With caramel.</h3>
                    </div>
                    <p style="text-align: justify; font-family: 'Josefin Sans', sans-serif;  letter-spacing: 1pt; word-spacing: 2pt;">
                        Pancake spesial dengan perpaduan caramel yang indah dan cantik.
                    </p>
                    <button class="btn flex">
                        ORDER
                        <span class="material-icons">
                            arrow_right_alt
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="regular-wrapper" id="reservation">
        <div class="content" id="regular-content">
            <div class="title-container">
                <h1 class="title-text">Reservations</h1>
                <h3 class="subtitle-text">Book a table online. Message sent via email.</h3>
                <hr>
            </div>
            <div class="card-pesan">
                <div class="row">
                    <div class="col">
                        <label for="date">Tanggal</label> <br><br>
                        <input type="date" id="date" name="date">
                        <br><br>
                        <label for="email">Email</label> <br><br>
                        <input type="email" id="email" name="email">
                    </div>
                    <div class="col">
                        <label for="nama">Nama</label> <br><br>
                        <input type="text" id="nama" name="nama">
                        <br><br>
                        <label for="jumlah">Jumlah</label> <br><br>
                        <input type="number" id="jumlah" name="jumlah">
                    </div>
                    <div class="col">
                        <label for="jam">Jam</label> <br><br>
                        <input type="time" id="jam" name="jam">
                        <br><br>
                        <label for="telepon">No.Telepon</label> <br><br>
                        <input type="tel" id="tel" name="tel">
                    </div>
                </div>
                <div style="text-align: center;">
                    <button class="btn">
                        MAKE RESERVATION
                    </button>
                </div>
                <br>
            </div>
        </div>
    </div>
    <div class="regular-wrapper" id="fitur">
        <div class="content" id="regular-content">
            <div class="title-container">
                <h1 class="title-text" style="color: white;">WHY ARE WE THE BEST ?</h1>
                <h3 class="subtitle-text" style="color: white;">Here the reasons.</h3>
                <hr>
            </div>
            <div class="card-fitur">
                <div class="card-fitur-isi">
                    <img src="assets/food5.png">
                    <h3>Caring</h3>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex placeat doloribus harum eius itaque perferendis corrupti asperiores vero. Ipsum assumenda consequuntur laborum illo rem dolor asperiores consequatur, quisquam laudantium ad.</p>
                </div>
                <div class="card-fitur-isi">
                    <img src="assets/food6.png">
                    <h3>Loving</h3>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex placeat doloribus harum eius itaque perferendis corrupti asperiores vero. Ipsum assumenda consequuntur laborum illo rem dolor asperiores consequatur, quisquam laudantium ad.</p>
                </div>
                <div class="card-fitur-isi">
                    <img src="assets/food7.png">
                    <h3>Understanding</h3>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex placeat doloribus harum eius itaque perferendis corrupti asperiores vero. Ipsum assumenda consequuntur laborum illo rem dolor asperiores consequatur, quisquam laudantium ad.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="regular-wrapper" id="menu">
        <div class="content" id="regular-content">
            <div class="title-container">
                <h1 class="title-text">Our Menu</h1>
                <h3 class="subtitle-text">The awarding winning menu.</h3>
                <hr>
            </div>
            <div class="card-menu">
                <div class="row" id="menu-row">
                    <?php
                    
                        include 'config.php';
                        $sql = "SELECT * FROM menu";
                        $result = mysqli_query($link, $sql);

                    ?>
                    <?php while ($row = mysqli_fetch_array($result)){ ?>
                    <?php if ($row['id_menu']%2!=0) { ?>
                    <div class="col">
                    <?php } ?>
                        <div class="card-menu-isi">
                            <img src="assets/<?php echo $row['gambar']; ?>">
                            <h3><?php echo $row['nama']; ?></h3>
                            <p><?php echo $row['deskripsi']; ?></p>
                            <h1><?php echo rupiah($row['harga']); ?></h1>
                        </div>
                    <?php if ($row['id_menu']%2==0) { ?>
                    </div>
                    <?php 
                            }
                        } 
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php  include 'footer.php'; ?>
    <?php  include 'script.php'; ?>
</body>
</html>