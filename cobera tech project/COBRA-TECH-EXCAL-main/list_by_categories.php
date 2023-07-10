<?php @include 'config.php'; ?>
<?php @include 'header.php'; ?>
<?php @include 'admin_navigation.php'; ?>
<?php




?>


<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th></th>
            <th>Medicine Name</th>
            <th>Expiry Date</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Available Quantity</th>
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


                    echo "<td></td>";
                    echo "<td>{$med_name}</td>";
                    echo "<td>{$med_date}</td>";
                    echo "<td>{$med_category}</td>";
                    echo "<td>{$med_brand}</td>";
                    echo "<td>{$med_availableQuant}</td>";
                    echo "</tr>";
                }
            }

            ?>
    </tbody>
</table>
<?php @include 'footer.php'; ?>