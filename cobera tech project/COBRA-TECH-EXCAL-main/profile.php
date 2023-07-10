<?php
@include 'config.php';
session_start();

if ($_SESSION['admin_name'])
    $username = $_SESSION['admin_name'];
else if ($_SESSION['donor_name'])
    $username = $_SESSION['donor_name'];
else
    $username = $_SESSION['receiver_name'];

$query = "SELECT * FROM user_form WHERE username = '{$username}'";
$select_user_profile_query = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($select_user_profile_query)) {
    $user_id = $row['user_Id'];
    $user_name = $row['username'];
    $user_password = $row['user_password'];
    $user_email = $row['user_email'];
}

if (isset($_POST['update'])) {
    $user_name = $_POST['name'];
    $user_password = $_POST['password'];
    $user_email = $_POST['email'];
    $query = "UPDATE user_form SET ";
    $query .= "username = '{$user_name}', ";
    $query .= "user_password = '{$user_password}', ";
    $query .= "user_email = '{$user_email}' ";
    $query .= "WHERE user_id = {$user_id} ";
    $select_user_profile_query = mysqli_query($conn, $query);
    if (!$select_user_profile_query) {
        die("Query Failed" . mysqli_error($conn));
    }
}
?>

<?php include "header.php" ?>

<div class="form-container">

    <form action="" method="post">
        <h3>Profile</h3>
        <h4>Username</h4>
        <input type="text" name="name" value="<?php echo $username; ?>">
        <h4>User_Password</h4>
        <input type="password" name="password" value="<?php echo $user_password; ?>">
        <h4>User_Email</h4>
        <input type="email" name="email" value="<?php echo $user_email; ?>">
        <!-- <h4></h4> -->
        <input type="submit" name="update" value="Update Now" class="form-btn">
    </form>

</div>
<?php include "footer.php" ?>