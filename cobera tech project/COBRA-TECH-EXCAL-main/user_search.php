<?php @include 'config.php'; ?>
<?php @include 'header.php'; ?>
<?php session_start(); ?>


<?php
include "user_navigation.php";
if (isset($_SESSION['user_name'])) {

    $username = $_SESSION['user_name'];
}
?>



<center>
    <h2>This is search Results</h2>
</center>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th><input type="checkbox" id="selectAllBoxes"></th>
            <th>Medicine Name</th>
            <th>Expiry Date</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Available Quantity</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            if (isset($_POST['search'])) {
                $med_cat = $_POST['medicine_category'];
                $med_name = $_POST['med_name'];

                if ($med_cat == 'All Categories') {
                    $query = "select * from medicines where med_name like '%{$med_name}%'";
                } else {
                    $query = "select * from medicines where med_category = '$med_cat' and med_name like '%{$med_name}%'";
                }
                $run = mysqli_query($conn, $query);
                if (!$run) {
                    die("Query Failed !!");
                }


                while ($row = mysqli_fetch_assoc($run)) {
                    $med_id = $row['med_id'];
                    $med_name = $row['med_name'];
                    $med_category = $row['med_category'];
                    $med_date = $row['med_expiryDate'];
                    $med_brand = $row['med_brand'];
                    $med_availableQuant = $row['med_availableQuant'];
            ?>
                    <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="<?php echo $med_id; ?>"></td>

            <?php
                    echo "<td>{$med_name}</td>";
                    echo "<td>{$med_date}</td>";
                    echo "<td>{$med_category}</td>";
                    echo "<td>{$med_brand}</td>";
                    echo "<td>{$med_availableQuant}</td>";
                    echo "<td>Available</td>";

                    $the_user_name = $username;
                    $query = "SELECT * FROM user_form WHERE username = '$the_user_name'";
                    $run_query = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($run_query);
                    $the_user_Id = $row['user_Id'];


                    $query = "SELECT * FROM order_list WHERE order_med_Id = $med_id AND order_user_Id = $the_user_Id";
                    $run_query = mysqli_query($conn, $query);
                    $the_query = "SELECT * FROM medicines m JOIN order_list o ON m.med_Id = o.order_med_Id AND o.order_user_Id = {$the_user_Id}";
                    $the_run_query = mysqli_query($conn, $the_query);
                    while ($the_row = mysqli_fetch_array($the_run_query))
                        $order_id = $the_row['order_Id'];

                    if (mysqli_num_rows($run_query) <= 0)
                        echo "<td><a href='requested_form.php?m_id={$med_id}'>Request</a></td>";
                    else {
                        $row = mysqli_fetch_array($run_query);
                        if ($row['order_status'] == 'Pending')
                            echo "<td><a href='users_req_med.php?cancel={$order_id}'>Cancel Request</a></td>";
                        else
                            echo "<td><a href='requested_form.php?m_id={$med_id}'>Request</a></td>";
                    }
                    echo "</tr>";
                }
            } ?>
    </tbody>
</table>



<?php include "footer.php" ?>