<?php include "header.php"; ?>
<?php include "main_navigation.php"; ?>

<!-- <div class="container">
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Contact</h1>
                        <form role="form" action="" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your mail">
                            </div>

                            <div class="form-group">
                                <label for="subject" class="sr-only">Email</label>
                                <input type="subject" name="subject" id="subject" class="form-control" placeholder="Enter your Subject">
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="body" id="body"></textarea>
                            </div>
                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> -->

<div class="form-container">

    <form action="" method="post">
        <h3>Contact us</h3>
        <input type="email" name="email" required placeholder="enter your email">
        <input type="text" name="subject" required placeholder="enter your Subject">
        <textarea name="body" cols="66"></textarea>
        <input type="submit" name="submit" value="submit" class="form-btn">
    </form>

</div>

<?php include "footer.php"; ?>