<?php include "header.php"; ?>
<?php include "config.php"; ?>
<?php session_start(); ?>
<?php
include "user_navigation.php";
?>

<?php


if (isset($_POST['add'])) {

    $med_name = $_POST['name'];
    $med_expiryDate = date('Y-m-d', strtotime($_POST['expiredDate']));
    $med_category = $_POST['category'];
    $med_brand = $_POST['brand'];
    $med_quantity = $_POST['quantity'];

    $query = " INSERT INTO medicines(med_name,med_expiryDate,med_category,med_brand,med_availableQuant,med_status) VALUES('{$med_name}','$med_expiryDate','{$med_category}','{$med_brand}',$med_quantity,'Pending') ";

    $result = mysqli_query($conn, $query);
    $prev_Id = mysqli_insert_id($conn);

    $username = $_SESSION['user_name'];
    $query = "SELECT user_id FROM user_form WHERE username = '$username'";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($run);
    $user_id = $row['user_id'];

    $the_query = "INSERT INTO order_list(order_med_Id,order_user_Id,quant_order,order_status,order_type) VALUES($prev_Id,$user_id,$med_quantity,'Pending','PickUp')";
    $result = mysqli_query($conn, $the_query);
}

?>


<center>
    <h3>
        <?php
        $query = "SELECT * FROM recommended ORDER BY demand DESC";
        $run = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($run);
        $med_name = $row['med_name'];
        echo "Recommeded Medicine : ";
        echo $med_name;
        ?>

    </h3>
</center>
<div class="form-container">

    <form action="" method="post">
        <h3>Add Medicine</h3>
        <input type="text" name="name" required placeholder="Medicine name">
        <input type="date" min=<?php echo 'now()'; ?> name="expiredDate" required placeholder="dd/mm/yyyy">
        <select name="category">
            <option value="">Select Category</option>
            <option value="Antibiotics">Antibiotics</option>
            <option value="Antiseptic">Antiseptic</option>
            <option value="Antipyretics">Antipyretics</option>
            <option value="Mood stabilizers">Mood stabilizers</option>
            <option value="Stimulant">Stimulant</option>
            <option value="Analgesic">Analgesic</option>
        </select>
        <input type="text" name="brand" required placeholder="Brand">
        <input type="number" min="0" name="quantity" required placeholder="Quantity">
        <input type="text" name="pickUpAddress" required placeholder="Address">
        <input type="submit" name="add" value="Add" class="form-btn">
        <p> <a href="homepage.php">Close</a></p>
    </form>

</div>
<?php include "footer.php"; ?>