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
                        <?php
                         if ($p_id == 1) {

                            echo "<li class='nav-item '>
                            <img style = 'border-radius: 50%;' width = '150' height = '150' src = 'Logo.png'>
                    </li>";
                        } else {
                            echo "<li style='text-decoration-color: black;' class='nav-item '>
                            <img style = 'border-radius: 50%;' width = '150' height = '150' src = 'Logo.png'>
                    </li>";
                        }
                        if ($p_id == 2) {

                            echo "<li style='text-decoration-color: black;' class='nav-item '>
                        <a class='nav-link active' aria-current='page' href='/homepage.php?p_id=1'>Home</a>
                    </li>";
                        } else {
                            echo "<li class='nav-item'>
                    <a class='nav-link' aria-current='page' href='/homepage.php?p_id=1'>HOME</a>
                </li>";
                        }
                        if ($p_id == 3) {
                            echo "<li class='nav-item'>
                   <a class='nav-link active' href='/aboutus.php?p_id=2'>ABOUT US</a>
               </li>";
                        } else {
                            echo "<li class='nav-item'>
                   <a class='nav-link ' href='/aboutus.php?p_id=2'>ABOUT US</a>
               </li>";
                        }
                        if ($p_id == 4) {
                            echo "<li class='nav-item'>
                    <a class='nav-link active' href='/whatwedo.php?p_id=3'>WHAT WE DO </a>
                </li>";
                        } else {
                            echo "<li class='nav-item'>
                    <a class='nav-link ' href='/whatwedo.php?p_id=3'>WHAT WE DO </a>
                </li>";
                        }

                        if ($p_id == 5) {
                            echo "<li class='nav-item'>
                    <a class='nav-link active' href='/contactus.php?p_id=4'>CONTACT US </a>
                </li>";
                        } else {
                            echo "<li class='nav-item'>
                    <a class='nav-link ' href='/contactus.php?p_id=4'>CONTACT US</a>
                </li>";
                        }
                        ?>
                        <li class='nav-item'>
                            <a class='nav-link ' href="login_form.php"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signUpModal">log in </button></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>