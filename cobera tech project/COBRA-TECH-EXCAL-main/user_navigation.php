<?php

$username = $_SESSION['user_name'];
?>
<div class="album py-2 bg-light -mb-36">
    <div class="container -mt-8">
        <nav class="navbar navbar-expand-lg navbar-dark  w-screen  bg-secondary  -mx-36  -mt-2 -mb-72">
            <div class=" container-fluid">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <img style = "border-radius: 50%;" width = "150" height = "150" src = "Logo.png">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/homepage.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/account.php">Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/addMedicine.php">Donate Medicine </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/users_medicines.php">Request Medicine </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/users_req_med.php">My Cart </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link ' href="logout.php"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signUpModal">log out </button></a>
                        </li>
                    </ul>
                </div>
            </div>
    </div>
    </nav>
</div>
</div>