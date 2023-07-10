<?php @include 'config.php'; ?>
<?php @include 'header.php'; ?>
<?php session_start(); ?>
<?php
if (isset($_SESSION['admin_name']))
    include "admin_navigation.php";
else
    include "user_navigation.php";
?>

<?php
if (isset($_GET['assign'])) {
    $orderId = $_GET['assign'];
    $query = "UPDATE order_list SET order_status = 'Assigned'  WHERE order_id={$orderId}";
    $update_to_published_status = mysqli_query($conn, $query);
    $update_order_status = mysqli_query($conn, $query);
    header("Location: admin_req_medicines.php");
}
?>


<form action="" method="post">


    <table class="table table-bordered table-hover">
        <hr>
        <center>
            <h2><b>Medicines Requests</b></h2>
        </center>
        <hr>
        <thead>
            <tr>
                <th>Medicine Name</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Available Quantity</th>
                <th>Quantity Requested</th>
                <th>Action/Status</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $query = "SELECT * FROM medicines JOIN order_list ON med_id = order_med_Id WHERE order_status != 'done' && order_status != 'cancelled' AND order_type = 'Drop' ORDER BY med_id DESC";
                $select_posts = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($select_posts)) {
                    $order_id = $row['order_Id'];
                    $order_status = $row['order_status'];
                    $med_name = $row['med_name'];
                    $med_category = $row['med_category'];
                    $med_brand = $row['med_brand'];
                    $med_availableQuant = $row['med_availableQuant'];
                    $med_requestedQuant = $row['quant_order'];
                ?>



                <?php
                    echo "<td>{$med_name}</td>";
                    echo "<td>{$med_category}</td>";
                    echo "<td>{$med_brand}</td>";
                    echo "<td>{$med_availableQuant}</td>";
                    echo "<td>{$med_requestedQuant}</td>";
                    if ($order_status == 'Pending') {
                        echo "<td><a href='admin_req_medicines.php?assign={$order_id}'>Assign Delivery</a></td>";
                    } else {
                        echo "<td>{$order_status}<td>";
                    }
                    // if ($med_requestedQuant) {
                    //     echo "<td><a href='admin_req_medicines.php?approve={$med_id}'>Approve</a></td>";
                    //     echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to reject the request?');\" href='admin_req_medicines.php?unapprove={$med_id}'>Unapprove</a></td>";
                    //     echo "</tr>";
                    // } else {
                    //     echo "<td></td>";
                    //     echo "<td></td>";
                    echo "</tr>";
                } ?>
        </tbody>
    </table>

</form>
<?php include "footer.php" ?>