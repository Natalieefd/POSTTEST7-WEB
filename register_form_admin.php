<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="input_style.css">
   <title>Register Admin | Cozy Furniture</title>
</head>
<body> 
   <div class="form-container">
      <form action="" method="post">
         <h3>register</h3>

         <input type="text" name="username" required placeholder="Username">
         <input type="password" name="password" required placeholder="Password">
         <input type="password" name="cpassword" required placeholder="confirm your password">
         <input type="submit" name="submit" value="register" class="form-btn">
         <p>already have an account? <a href="login_admin.php">login here</a></p>
      </form>
   </div>
</body>
</html>

<?php

require 'config.php';

if(isset($_POST['submit'])){
   $username = $_POST['username'];
   $pass = $_POST['password'];
   $cpass = $_POST['cpassword'];

   $user = $db->query("SELECT * FROM data_admin WHERE username = '$username'");

   if(mysqli_num_rows($user) > 0){
      echo "<script>
          alert('Username sudah digunakan, silahkan gunakan username lain')
          </scripr>";
  } else {
      if($pass = $cpass){
         $pass = password_hash($pass, PASSWORD_DEFAULT);
         $insert = "INSERT INTO data_admin(username, pass)
                     VALUES('$username', '$pass')";
         
         $result = $db->query($insert);
         
         if($result){
            echo "<script>
               alert('Registrasi berhasil');
               document.location.href = 'login_admin.php');
            </script>";
         } else {
             echo "<script>
                 alert('Registrasi Gagal');
                 </script>";
         }

      }else{
         echo "<script>
              alert ('Konfirmasi password salah');
          </script>";
      }
   }
};
?>