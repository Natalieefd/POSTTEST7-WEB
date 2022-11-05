<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="edit_profile.css">
    <title>Edit Profile | Cozy Furniture</title>
</head>
<body>
    <div class="header-brand">
        <div class="first_name">cozy</div>
        <div class="last_name">furniture</div>
    </div>
    <div class="navigation">
        <li><a href="admin_page.html" title="Back"><i class="fa-solid fa-arrow-left"></i></a></li>
    </div>
    <div class="content">
        <form action="" method = "post">
        <h3>edit profile</h3><br>

            <label for="">Username</label><br>
            <input type="text" name="username" placeholder="username"><br><br>

            <label for="">Password</label><br>
            <input type="password" name="password" required placeholder="Password"><br><br>

            <label for="">Konfirmasi Password</label><br>
            <input type="password" name="cpassword" required placeholder="confirm your password"><br><br>

            <input type="hidden" name="tanggal_upload" value= <?=date("d-m-Y")?> >
            <input type="submit" name="kirim" value="kirim" class="button">
        </form>
    </div>
    <div class="footer-c">
        Copyright &copy; 2022 Designed by Natalie Fuad
    </div>
</body>
</html>

<?php
    require 'config.php';

    if (isset($_POST['kirim'])) {
        $username = $_POST['username'];
        $pass = $_POST['password'];
        $cpass = $_POST['cpassword'];

        $user = $db->query("SELECT * FROM data_admin WHERE username = '$username'");

        if(mysqli_num_rows($user) > 0){
            echo "<script>
                alert('Username sudah digunakan, silahkan gunakan username lain')
                </scripr>";
        }else{
            if($pass = $cpass){
                $pass = password_hash($pass, PASSWORD_DEFAULT);
                $query = "UPDATE data_admin SET username='$username', pass='$pass'
                            WHERE username='$username'";

                $result = $db->query($query);

                if ($result) {
                    echo "<script>
                            alert('Data Berhasil Diupdate');
                            document.location.href = 'home.php';
                        </script>";

                } else {
                    echo "<script>
                            alert('Data Gagal Diupdate !');
                        </script>";
                }
            }
        }
    }
?>