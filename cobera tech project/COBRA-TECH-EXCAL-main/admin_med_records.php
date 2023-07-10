<?php @include 'config.php'; ?>
<?php include "header.php"; ?>
<?php session_start(); ?>

<?php include "admin_navigation.php" ?>
<form action="" method="post">

    <table class="table table-bordered table-hover">
        <hr>
        <center>
            <h2><b>Medicine Records</b></h2>
        </center>
        <hr>
        <div class="container">

            <thead>
                <tr>
                    <th>Medicine Name</th>
                    <th>Expiry Date</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Location</th>
                    <th>Quantity</th>
                    <th>Type</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php

                    $query = "SELECT * FROM medicines m JOIN order_list o ON m.med_Id = o.order_med_Id
             WHERE order_status ='done' OR order_status ='cancelled' ORDER BY order_id DESC";



                    $select_posts = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($select_posts)) {
                        $med_id = $row['med_id'];
                        $user_id = $row['order_user_Id'];
                        $order_id = $row['order_Id'];
                        $med_name = $row['med_name'];
                        $med_category = $row['med_category'];
                        $med_date = $row['med_expiryDate'];
                        $med_brand = $row['med_brand'];
                        $order_quant = $row['quant_order'];
                        $order_type = $row['order_type'];
                        $order_status = $row['order_status'];


                        $the_query = "SELECT user_address FROM user_form WHERE user_id= $user_id";
                        $the_run = mysqli_query($conn, $the_query);
                        $row = mysqli_fetch_array($the_run);
                        $location = $row['user_address'];
                    ?>

                    <?php
                        echo "<td>{$med_name}</td>";
                        echo "<td>{$med_date}</td>";
                        echo "<td>{$med_category}</td>";
                        echo "<td>{$med_brand}</td>";
                        echo "<td>{$location}</td>";
                        echo "<td>{$order_quant}</td>";
                        if ($order_type == 'PickUp')
                            echo "<td>Donation</td>";
                        if ($order_type == 'Drop')
                            echo "<td>Delivery</td>";
                        echo "<td>{$order_status}</td>";
                        echo "</tr>";
                    } ?>
            </tbody>
    </table>
    </div>
</form>

<?php include "footer.php" ?>