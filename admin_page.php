<?php
    require 'config.php';
    session_start();

    if(isset($_SESSION['login_admin'])){
        echo "<script>
            alert('Akses ditolak, sialhkan login terlebih dahulu');
            document.location,href = 'login_admin.php';
            </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head><title>Admin Page | Cozy Furniture</title>
    <link rel="stylesheet" href="style_admin_page.css">
    <link rel="stylesheet" href="fontawesome/fontawesome-free-6.2.0-web/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script type="text"></script>
</head>
<body>
    <scripts type="text"></scripts>
    <ul class="header-brand" onclick="return changecolor()">
        <div class="first_name">cozy</div>
        <div class="last_name">furniture</div></a>
    </ul>

    <div class="main-content">
        <nav class="wrapper">
            <img src="pictures/sun-and-moon.png" id="button">
            <div class="search-box">
                <div class="search-button">
                    <i class="fa-solid fa-magnifying-glass" onclick="return fitur()"></i>
                </div>
                <div class="search-input">
                    <input class="input" type="text" placeholder="search here...." title="Search">
                </div>
            </div>
            <div class="navigation">
                <li><a href="edit_profil_admin.php" title="Edit Profile"><i class="fa-solid fa-user-tie"></i></a></li>
                <li><a href="katalog.php" title="CRUD Catalog"><i class="fa-solid fa-tags"></i></a></li>
                <li><a href="about_us.html" title="About Us"><i class="fa fa-question fa-xm"></i></a></li>
                <li><a href="logout_admin.php" title="Log Out"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
            </div>
        </nav>
        <div class="text-box">
            <button class="back-button" onclick="changecolor()" title="Back"><i class="fa-solid fa-chevron-left fa-2xl"></i></button>
            <img id="main-text-image" src="pictures/main-img.png" width="270px">
            <div id="main-text">let's make a cozy and elegant home with us!</div>
            <button class="next-button" onclick="changeImage('pictures/main-img.png')" title="Next"><i class="fa-solid fa-chevron-right fa-2xl"></i></button>
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