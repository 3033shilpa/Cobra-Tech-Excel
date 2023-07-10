<?php @include 'config.php'; ?>
<?php @include 'header.php'; ?>
<?php session_start(); ?>
<?php
if (isset($_SESSION['admin_name']))
    include "admin_navigation.php";
else
    include "user_navigation.php";
?>
<form action="list_by_categories.php" method="post">


    <div class="search-bar">

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
    </div>

    <center>
        <hr>
        <h4>Medicines Records List</h4>
        <hr>
    </center>


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
                $query = "SELECT * FROM medicines ORDER BY med_id DESC";
                $select_posts = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($select_posts)) {
                    $med_id = $row['med_id'];
                    $med_name = $row['med_name'];
                    $med_category = $row['med_category'];
                    $med_date = $row['med_expiryDate'];
                    $med_brand = $row['med_brand'];
                    $med_availableQuant = $row['med_availableQuant'];
                ?>
                <?php
                    echo "<td></td>";
                    echo "<td>{$med_name}</td>";
                    echo "<td>{$med_date}</td>";
                    echo "<td>{$med_category}</td>";
                    echo "<td>{$med_brand}</td>";
                    echo "<td>{$med_availableQuant}</td>";
                    echo "</tr>";
                } ?>
        </tbody>
    </table>

</form>
<?php include "footer.php" ?>