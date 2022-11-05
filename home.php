<?php
    require 'config.php';
    session_start();
    
    if(!isset($_SESSION['login_user'])){
        echo "<script>
                alert('Akses ditolak, silahkan login terlebih dahulu !');
                document.location.href = 'login_user.php';
            </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head><title>Home | Cozy Furniture</title>
    <link rel="stylesheet" href="fontawesome/fontawesome-free-6.2.0-web/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="home.css">
    <script type="text"></script>
</head>
<body>
    <scripts type="text"></scripts>
    <ul class="header-brand" onclick="return changecolor()">
        <div class="first_name" href="home.html">cozy</div>
        <div class="last_name" href="home.html">furniture</div>
    </ul>

    <div class="main-content">
        <nav class="wrapper">
            <img src="pictures/sun-and-moon.png" id="button">
            <form action="home.php" method="GET">
                <div class="search-box">
                    <div class="search-button">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <div class="search-input">
                        <input class="input" type="text" name="search" placeholder="search here...." title="Search" value="<?php if(isset($_GET['search'])){ echo $_GET['search'];}?>">
                    </div>
                </div>
            </form>
            <div class="navigation">
                <li><a href="edit_profile_user.php" title="User"><i class="fa-solid fa-user"></i></a></li>
                <li><a href="favorite.html" title="favourite"><i class="fa fa-heart fa-xm"></i></a></li>
                <li><a href="about_us.html" title="About Us"><i class="fa fa-question fa-xm"></i></a></li>
                <li><a href="logout_user.php" title="Log Out"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
            </div>
        </nav>
        <div class="text-box">
            <table>
                <tr>
                    <th scope="col"> No </th>
                    <th scope="col"> Kode katalog </th>
                    <th scope="col"> Nama Katalog </th>
                    <th scope="col"> Warna Katalog </th>
                    <th scope="col"> Jenis Katalog </th>
                    <th scope="col"> Gambar Katalog </th>
                </tr>
                
                <?php
                    include 'config.php';

                    if(isset($_GET['search'])) {
                        $kata_cari = $_GET['search'];

                        $query = "SELECT * FROM katalog WHERE kode_katalog like '%".$kata_cari."%' OR nama_katalog like '%".$kata_cari."%' OR jenis_katalog like '%".$kata_cari."%' OR warna_katalog like '%".$kata_cari."%' ORDER BY kode_katalog ASC";
                    } else {
                        $query = "SELECT * FROM katalog ORDER BY kode_katalog ASC";
                    }
                    
                    $result = $db->query($query);

                    if(!$result) {
                        die("Error");
                    }
                    
                    while ($row = mysqli_fetch_assoc($result)){
                ?>
                
                <?php 
                    require 'config.php';
                    $result = $db->query("SELECT * FROM katalog");
                    $i = 1;
                    while($row = mysqli_fetch_array($result)){
                ?>
        
                    <tr>
                        <td scope="row"><?=$i?></td>
                        <td scope="row"><?=$row['kode_katalog']?></td>
                        <td scope="row"><?=$row['nama_katalog']?></td>
                        <td scope="row"><?=$row['warna_katalog']?></td>
                        <td scope="row"><?=$row['jenis_katalog']?></td>
                        <td><img src="gambar_katalog/<?=$row['foto_katalog']?>" alt="" width="100px"></td>
                    </tr>
                <?php 
                    $i++;}
                ?>

                <?php 
                }
                ?>
            </table>
        </div>
    </div>

    <div>
        <div class="footer">
            <ul class="footer-sosmed">
                <ul class="footer-brand">
                    <div class="firstname">cozy</div>
                    <div class="lastname">furniture</div>
                </ul>
                <ul class="footer-about1">
                    <li><a href="https://instagram.com" title="Instagram"><i class="fab fa-instagram fa-x"></i>   instagram</a></li>
                    <li><a href="https://facebook.com" title="Facebook"><i class="fab fa-facebook fa-x"></i>   facebook</a></li>
                    <li><a href="https://gmail.com" title="Email"><i class="fa-solid fa-envelope"></i>   email</a></li>
                </ul>
                <ul class="footer-about2">
                    <li><a href="/" title="Contac Us"><i class="fa-solid fa-phone"></i> contact</a></li>
                    <li><a href="/" title="Help"><i class="fa-solid fa-circle-info"></i> help</a></li>
                </ul>
            </ul>
        </div>
    </div>
    <div class="footer-c">
        Copyright &copy; 2022 Designed by Natalie Fuad
    </div>
    <script>
        var button = document.getElementById("button");
            button.onclick = function() {
                document.body.classList.toggle("dark-theme");

                var x = document.getElementByclassName("button");
                var y = x.replace(/^.*[\\\/]/, "");
            }

            document.getElementById("main-text-image").addEventListener("click", function() {
                alert("Hanya Pajangan!");
            });

            input.addEventListener("click", myFunction);

            function changecolor(){
                document.getElementById("main-text").style.color = "blue"
            }

            function changeImage(){
                document.getElementById("main-text-image").src = "pictures/2.png";
            }

            function halaman(){
                alert("halaman Tidak Tersedia");
            }

            function fitur() {
                alert ("Fitur belum tersedia");
            }
    </script>

</body>
</html>