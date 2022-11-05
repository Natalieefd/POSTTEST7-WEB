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
      <h3>login</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="username" required placeholder="Username">
      <input type="password" name="password" required placeholder="Password">
      <input type="submit" name="login_user" value="login" class="form-btn">
      <p>don't have an account? <a href="register_form_user.php">register here</a></p>
   </form>

</div>

</body>
</html>

<?php
session_start();
require 'config.php';

if(isset($_POST['login_user'])){
   $username = $_POST['username'];
   $password = $_POST['password'];

   $query = "SELECT * FROM data_user WHERE username = '$username'";

   $result = $db->query("$query");

   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);
      $user = $row['$user'];

      if(password_verify($password, $row['pass'])){
         $_SESSION['login_user'] = $user;
         
         echo "<script>
                  document.location.href = 'home.php';
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
?>