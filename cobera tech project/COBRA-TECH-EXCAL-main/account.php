<?php @include 'config.php'; ?>
<?php @include 'header.php'; ?>
<?php session_start(); ?>


<?php
if (isset($_SESSION['admin_name'])) {
  include "admin_navigation.php";
  $username = $_SESSION['admin_name'];
} else if (isset($_SESSION['user_name'])) {
  include "user_navigation.php";
  $username = $_SESSION['user_name'];
} else {
  include "delivery-nav.php";
  $username = $_SESSION['delivery_name'];
}
?>
<?php


$query = "SELECT * FROM user_form WHERE username = '{$username}'";
$select_user_profile_query = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($select_user_profile_query)) {
  $user_id = $row['user_Id'];
  $user_fullname = $row['user_fullname'];
  $user_phone_number = $row['user_phone'];
  $user_address = $row['user_address'];
  $username = $row['username'];
  $user_email = $row['user_email'];
  $user_type = $row['user_type'];
}

if (isset($_POST['update'])) {
  $username = $_POST['name'];
  $user_fullname = $_POST['user_fullname'];
  $user_phone_number = $_POST['user_phone_number'];
  $user_address = $_POST['user_address'];

  $query = "UPDATE user_form SET ";

  $query .= "user_fullname = '{$user_fullname}', ";
  $query .= "user_phone = '{$user_phone_number}', ";
  $query .= "user_address = '{$user_address}', ";
  $query .= "username = '{$username}' ";


  $query .= "WHERE user_id = {$user_id} ";

  $select_user_profile_query = mysqli_query($conn, $query);
  if (!$select_user_profile_query) {
    die("Query Failed" . mysqli_error($conn));
  }
}
?>


<body>
  <div class="form-container">

    <form action="" method="post">
      <h3>Profile</h3>
      <h4>Username</h4>
      <input type="text" name="name" value="<?php echo $username; ?>">


      <h4>User_fullname</h4>
      <input type='text' name='user_fullname' value="<?php echo $user_fullname; ?>">
      <h4>User_Phone Number</h4>
      <input type='text' name='user_phone_number' value="<?php echo $user_phone_number; ?>">
      <h4>User Address</h4>
      <input type='text' name='user_address' value="<?php echo $user_address; ?>">
      <!-- <h4></h4> -->
      <input type="submit" name="update" value="Update Now" class="form-btn">
    </form>

  </div>


  <?php include "footer.php"; ?>