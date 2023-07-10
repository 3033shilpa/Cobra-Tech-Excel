<?php @include 'config.php'; ?>
<?php @include 'header.php'; ?>
<?php session_start(); ?>
<?php
include "user_navigation.php";
if (isset($_POST['search'])) {
    $med_name = $_POST['med'];
    header("Location: med_search.php?m_name=$med_name");
}
if (isset($_SESSION['user_name'])) {

    $username = $_SESSION['user_name'];
}
?>
<?php
if (isset($_POST['add'])) {
    $med_name = $_POST['m_name'];
    $query = "SELECT * FROM recommended WHERE med_name = '$med_name'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $new_demand = $row['demand'] + 1;
        $query = "UPDATE recommended SET demand = $new_demand WHERE med_name = '$med_name'";
        $result = mysqli_query($conn, $query);
    } else {
        $query = "INSERT INTO recommended(med_name,demand) VALUES('$med_name',1)";
        $result = mysqli_query($conn, $query);
    }
}
?>



<div class="search-bar">
    <form action="user_search.php" method="post">

        <div>
            <select name="medicine_category">
                <option value='All Categories'>All Categories</option>
                <option value='Antibiotics'>Antibiotics</option>
                <option value='Antiseptic'>Antiseptic</option>
                <option value='Antipyretics'>Antipyretics</option>
                <option value='Mood stabilizers'>Mood stabilizers</option>
                <option value='Stimulant'>Stimulant</option>
                <option value='Analgesic'>Analgesic</option>
            </select>
        </div>


        <div>
            <input id="inputField" type="text" placeholder="Search Medicine" name="med_name" required>
            <button name="search" class="btn btn-primary">
                Search</button>
        </div>

    </form>
    <form action="" method="post">
        <div>
            <p><b>Add Recommended Medicines:</b></p>
            <input id="inputField" type="text" placeholder="Add Recommended Medicine" name="m_name" required>
            <button name="add" class="btn btn-primary">
                Add</button>
        </div>
    </form>

</div>




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
            $query = "SELECT * FROM medicines WHERE med_status != 'Pending' ORDER BY med_id DESC";
            $select_posts = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($select_posts)) {
                $med_id = $row['med_id'];
                $med_name = $row['med_name'];
                $med_category = $row['med_category'];
                $med_date = $row['med_expiryDate'];
                $med_brand = $row['med_brand'];
                $med_quantity = $row['med_availableQuant'];
            ?>
                <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="<?php echo $med_id; ?>"></td>

            <?php
                echo "<td>{$med_name}</td>";
                echo "<td>{$med_date}</td>";
                echo "<td>{$med_category}</td>";
                echo "<td>{$med_brand}</td>";
                echo "<td>{$med_quantity}</td>";
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
            } ?>
    </tbody>
</table>



<?php include "footer.php" ?>