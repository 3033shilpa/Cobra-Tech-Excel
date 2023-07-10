<?php

@include 'config.php';
session_start();


if (isset($_POST['submit'])) {

   $email = $_POST['email'];
   $pass = $_POST['password'];
   $pass = mysqli_real_escape_string($conn, $_POST['password']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);

   $select = " SELECT * FROM user_form WHERE user_email = '$email' && user_password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
      $type = $row['user_type'];

      if ($type === 'admin') {

         $_SESSION['admin_name'] = $row['username'];
         header("Location: index.php?p_id=1");
      } else if ($row['user_type'] === 'user') {
         $_SESSION['user_name'] = $row['username'];
         header("Location: homepage.php?p_id=1");
      } else if ($row['user_type'] === 'delivery agent') {
         $_SESSION['delivery_name'] = $row['username'];
         header("Location: delivery-home.php?p_id=1");
      }
   } else {
      $error[] = 'incorrect email or password!';
   }
};
?>
<?php include "header.php"; ?>
<?php include "main_navigation.php"; ?>
<div class="form-container -mt-36">
   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if (isset($error)) {
         foreach ($error as $error) {
            echo '<span class="error-msg">' . $error . '</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
      <p> <a href="reset_form.php">forgot password?</a></p>
   </form>

</div>

<?php include "footer.php"; ?>