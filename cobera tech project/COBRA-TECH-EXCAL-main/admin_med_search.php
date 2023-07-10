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
if (isset($_GET['hint'])) {
    $hint = $_GET['hint'];
}
?>

<form action="" method="post">
    <center>
        <hr>
        <h4>Search Result</h4>
        <hr>
    </center>
    <!-- <div class="p-2">
        <div class="row height d-flex align-items-center">
            <div class="col-md-6">
                <div class="search"> -->
    <!-- <i class="fa fa-search"></i> -->
    <!-- <button name="search" class="btn btn-primary">back</button>
                </div>
            </div>
        </div>
    </div> -->

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th></th>
                <th>Medicine Name</th>
                <th>Expiry Date</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Available Quantity</th>
                <th>Quantity Requested</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $query = "SELECT * FROM medicines WHERE med_name LIKE '%$hint%' ORDER BY med_id DESC";
                $select_posts = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($select_posts)) {
                    $med_id = $row['med_id'];
                    $med_name = $row['med_name'];
                    $med_category = $row['med_category'];
                    $med_date = $row['med_expiryDate'];
                    $med_brand = $row['med_brand'];
                    $med_availableQuant = $row['med_availableQuant'];
                    $med_requestedQuant = $row['med_requestedQuant'];
                    $med_status = $row['med_status'];
                ?>

                <?php
                    echo "<td></td>";
                    echo "<td>{$med_name}</td>";
                    echo "<td>{$med_date}</td>";
                    echo "<td>{$med_category}</td>";
                    echo "<td>{$med_brand}</td>";
                    echo "<td>{$med_availableQuant}</td>";
                    echo "<td>{$med_requestedQuant}</td>";
                    echo "</tr>";
                } ?>
        </tbody>
    </table>

</form>
<?php include "footer.php" ?>