<?php @include 'config.php'; ?>
<?php session_start(); ?>
<?php include "header.php"; ?>
<?php include "user_navigation.php"; ?>

<?php
if (isset($_GET['m_id'])) {
    $the_med_id = $_GET['m_id'];
    $query = "SELECT * FROM medicines WHERE med_id = {$the_med_id}";
    $request_query = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($request_query)) {
        $med_name = $row['med_name'];
        $med_expiryDate = $row['med_expiryDate'];
        $med_brand = $row['med_brand'];
        $med_availableQuant = $row['med_availableQuant'];
        $med_requestedQuant = $row['med_requestedQuant'];
    }
}
?>

<?php
if (isset($_POST['submit'])) {
    $quant = $_POST['quant'];
    if ($quant > $med_availableQuant || $quant > 30) {
        echo "
        <script>
        setTimeout(()=>window.location.href='/users_medicines.php',1000);
        </script>
        <center><h5>Request failed. Over the Limit 30.</h5></center>
        
        ";
    } else {

        $query = "UPDATE medicines SET med_requestedQuant = med_requestedQuant + $quant WHERE med_id = $the_med_id";
        $the_request_query = mysqli_query($conn, $query);
        echo "
        <script>
        setTimeout(()=>window.location.href='/users_medicines.php',1000);
        </script>
        <center><h5>Request Created. </h5></center>
        
        ";
        $username = $_SESSION['user_name'];
        $query = "SELECT * FROM user_form WHERE username = '{$username}'";
        $select_user_query = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($select_user_query)) {
            $the_user_id = $row['user_Id'];
        }

        $query = " INSERT INTO order_list(order_med_Id,order_user_Id,quant_order,order_status,order_type) VALUES($the_med_id,$the_user_id,$quant,'Pending','Drop') ";
        $the_request_query = mysqli_query($conn, $query);
    }
};
?>

<div class="form-container">

    <form action="" method="post">
        <h3>Request Medicine</h3>
        <hr>

        <p>Medicine Name = <b><?php echo $med_name; ?></b></p>
        <p>Medicine ExpiryDate = <b><?php echo $med_expiryDate; ?></b></p>
        <p>Medicine Available Quantity = <b><?php echo $med_availableQuant; ?></b></p>
        <hr>
        <p> Enter Quantity:</p>
        <input type="number" name="quant" min="0" required placeholder="enter quantity">
        <hr>
        <input type="submit" name="submit" value="Request now">
        <a href="users_medicines.php"><input type="button" name="cancel" value="Cancel"></a>

    </form>

</div>

<?php include "footer.php"; ?>