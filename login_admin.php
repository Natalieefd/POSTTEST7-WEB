<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <link rel="stylesheet" href="input_style.css">

</head>
<body>
   <div class="form-container">
      <form action="" method="post">
         <h3>login Admin</h3>

         <input type="text" name="username" placeholder="Masukkan username">
         <input type="password" name="password" placeholder="Masukkan password">
         <input type="submit" name="login_admin" value="login" class="form-btn">
         <p>belum memiliki akun? <a href="register_form_admin.php">register</a></p>
      </form>
   </div>
</body>
</html>

<!-- ?php

session_start();
require 'config.php';

if(isset($_POST['login_admin'])){
   $username = $_POST['username'];
   $password = $_POST['password'];

   $query = "SELECT * FROM data_admin
            WHERE username = '$username' AND pass = '$password'";

   $result = $db->query("$query");


   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);
      $user = $row['$user'];

      if(password_verify($password, $row['pass'])){
         $_SESSION['login_admin'] = $user;
         
         echo "<script>
                  alert(Selamat Data $username);
                  document.location.href = 'admin_page.php';
               </script>";

      } else {
         echo "<script>
                  alert('Username atau Password salah !');
               </script>";
      }

   } else {
      echo "<script>
               alert('Akun Tidak Terdaftar !');
            </script>";
   }
};
?> -->

<?php 
    session_start();
    require 'config.php';

    if(isset($_POST['login'])){
        $user = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM data_admin
                WHERE username='$user'";
        $result = $db->query($query);
        $row = mysqli_fetch_array($result);
        if($row){
            $username = $row['username'];

            var_dump($query);
            
            if(password_verify($password, $row['psw'])){
            
                $_SESSION['login_admin'] = $username;

                echo "<script>
                        alert('Selamat Datang $username');
                        document.location.href = 'index.php';
                    </script>";
                }
      } else {
         echo "<script>
                  alert('Username atau Password salah !');
               </script>";
      }

   } else {
      echo "<script>
               alert('Akun Tidak Terdaftar !');
            </script>";
   };
?>