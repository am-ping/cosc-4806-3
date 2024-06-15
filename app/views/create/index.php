<?php require_once 'app/views/templates/headerPublic.php'?>
<main role="main" class="container mx-auto" style="width: 300px;">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Sign up</h1>
            </div>
        </div>
    </div>

<div class="row mx-auto" style="width: 300px;">
    <div class="col-sm-auto mx-auto border border-primary rounded p-4" style="width: 300px;">
        <form action="/create/verify" method="post" >
            <fieldset>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input required type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input required type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="confirm_pwd">Confirm Password</label>
                    <input required type="password" class="form-control" name="confirm_pwd">
                </div>
                <br>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Create Account</button>
            </fieldset>
        </form>
        <p class="text-center">Already have an account? <a href='/login'>Login</a></p>
        <?php
        if (isset($_SESSION["acct_created"])) {
          echo '<p class="text-center text-success">' . $_SESSION["acct_created"] . '</p>';
          unset($_SESSION["acct_created"]);
        } else if (isset($_SESSION["failed_signup"])) {
          echo '<p class="text-center text-danger">' . $_SESSION["failed_signup"] . '</p>';
          unset($_SESSION["failed_signup"]);
        } else if (isset($_SESSION["pwds_unmatch"])) {
          echo '<p class="text-center text-danger">' . $_SESSION["pwds_unmatch"] . '</p>';
          unset($_SESSION["pwds_unmatch"]);
        } else if (isset($_SESSION["pwd_strength"])) {
          echo '<p class="text-center text-danger">' . $_SESSION["pwd_strength"] . '</p>';
          unset($_SESSION["pwd_strength"]);
        }
        ?>
      </div>
</div>

<?php require_once 'app/views/templates/footer.php' ?>