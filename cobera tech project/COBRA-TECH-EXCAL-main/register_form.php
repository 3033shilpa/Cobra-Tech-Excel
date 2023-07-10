<?php

@include 'config.php';

if (isset($_POST['submit'])) {

   $name = $_POST['name'];
   $username = $_POST['username'];
   $email = $_POST['email'];
   $pass = $_POST['password'];
   $cpass = $_POST['cpassword'];
   $phone = $_POST['phoneno'];
   $address = $_POST['address'];
   $pass = mysqli_real_escape_string($conn, $_POST['password']);
   $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $phone = mysqli_real_escape_string($conn, $_POST['phoneno']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);

   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE user_email = '$email' && user_password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {

      $error[] = 'user already exist!';
   } else {

      if ($pass != $cpass) {
         $error[] = 'password not matched!';
      } else {
         $insert = "INSERT INTO user_form(user_fullname,user_phone,user_address,username,  user_password,user_email, user_type) VALUES('$name','$phone','$address','$username','$pass','$email','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }
};


?>

<?php include "header.php"; ?>
<?php include "main_navigation.php"; ?>

<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if (isset($error)) {
         foreach ($error as $error) {
            echo '<span class="error-msg">' . $error . '</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="enter your Full Name">
      <input type="text" name="username" required placeholder="enter your Username">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <input type="text" name="phoneno" required placeholder="Enter Phone">
      <input type="text" name="address" required placeholder="Enter Address">
      <select name="user_type">
         <option value="user">Select user type</option>
         <option value="user">User</option>
         <option value="delivery agent">Delivery Agent</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>

</div>
<?php include "footer.php"; ?>