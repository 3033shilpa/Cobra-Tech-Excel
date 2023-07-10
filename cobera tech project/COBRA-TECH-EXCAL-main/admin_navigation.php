<?php
if (isset($_SESSION['admin_name'])) {
    $username = $_SESSION['admin_name'];
} else if (isset($_SESSION['user_name'])) {
    $username = $_SESSION['user_name'];
} else if (isset($_SESSION['delivery_name'])) {
    $username = $_SESSION['delivery_name'];
} else {
    $username = "";
}

?>
<?php
if (isset($_GET['p_id'])) {
    $p_id = $_GET['p_id'];
} else {
    $p_id = 0;
}
?>
<div class="album py-2 bg-light">
    <div class="container -mt-8">
        <nav class="navbar navbar-expand-lg navbar-dark  w-screen  bg-secondary  -mx-36  -mt-2 -mb-72">
            <div class=" container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!-- <li class="nav-item">
                        <img src="/images/logo.png" alt="img" class="logo" width="2" height="2">
                    </li> -->
                        <li class="nav-item">
                        <img style = "border-radius: 50%;" width = "150" height = "150" src = "Logo.png">
                        </li>
                        <?php
                        if ($p_id == 1) {

                            echo "<li class='nav-item'>
                        <a class='nav-link active' aria-current='page' href='/index.php?p_id=1'>Home</a>
                    </li>";
                        } else {
                            echo "<li class='nav-item'>
                    <a class='nav-link' aria-current='page' href='/index.php?p_id=1'>Home</a>
                </li>";
                        }
                        //     if ($p_id == 2) {
                        //         echo "<li class='nav-item'>
                        //        <a class='nav-link active' href='/account.php?p_id=2'>Account</a>
                        //    </li>";
                        //     } else {
                        //         echo "<li class='nav-item'>
                        //        <a class='nav-link ' href='/account.php?p_id=2'>Account</a>
                        //    </li>";
                        //     }
                        if ($p_id == 2) {
                            echo "<li class='nav-item'>
                    <a class='nav-link active' href='/admin_medicines.php?p_id=2'>Medicine </a>
                </li>";
                        } else {
                            echo "<li class='nav-item'>
                    <a class='nav-link ' href='/admin_medicines.php?p_id=2'>Medicine </a>
                </li>";
                        }
                        if ($p_id == 3) {
                            echo "<li class='nav-item'>
                    <a class='nav-link active' href='/donation_req.php?p_id=3'>Donations Request</a>
                </li>";
                        } else {
                            echo "<li class='nav-item'>
                    <a class='nav-link ' href='/donation_req.php?p_id=3'>Donations Request</a>
                </li>";
                        }
                        if ($p_id == 4) {
                            echo "<li class='nav-item'>
                    <a class='nav-link active' href='/admin_req_medicines.php?p_id=4'>Requested Medicine </a>
                </li>";
                        } else {
                            echo "<li class='nav-item'>
                    <a class='nav-link ' href='/admin_req_medicines.php?p_id=4'>Requested Medicine</a>
                </li>";
                        }
                        if ($p_id == 5) {
                            echo "<li class='nav-item'>
                    <a class='nav-link active' href='/admin_med_records.php?p_id=5'>Medicines Record</a>
                </li>";
                        } else {
                            echo "<li class='nav-item'>
                    <a class='nav-link ' href='/admin_med_records.php?p_id=5'>Medicines Record</a>
                </li>";
                        }
                        echo "<li class='nav-item'>
                    <a href='logout.php' class='nav-link '><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#signUpModal'>log out </button></a>
                </li>";
                        ?>

                    </ul>

                </div>
            </div>
    </div>
</div>
</nav>
</div>