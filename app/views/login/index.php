<?php require_once 'app/views/templates/headerPublic.php'?>
<main role="main" class="container mx-auto" style="width: 300px;">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Login</h1>
            </div>
        </div>
    </div>

<div class="row mx-auto" style="width: 300px;">
  <div class="col-sm-auto mx-auto border border-primary rounded p-4" style="width: 300px;">
		<form action="/login/verify" method="post" >
			<fieldset>
				<div class="form-group">
					<label for="username">Username</label>
					<input required type="text" class="form-control" name="username">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input required type="password" class="form-control" name="password" >
				</div>
	      <br>
			  <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
			</fieldset>
		</form>
		<?php if (isset($_GET['error']) && $_GET['error'] == 'locked_out'): ?>
			<p class="text-center text-danger">You are locked out. Please try again after 60 seconds.</p>
		<?php elseif (isset($_GET['error']) && $_GET['error'] == 'failed'): ?>
			<p class="text-center text-danger">Login failed. Please try again.</p>
		<?php endif; ?>
		<p class="text-center">Don't have an account? <a href='/create'>Sign up</a></p>
		<?php
		if (isset($_SESSION["failed_login"])) {
			echo '<p class="text-center text-danger">';
			echo $_SESSION["failed_login"];
			echo '</p>';
		}
		?>
	</div>
</div>

<?php require_once 'app/views/templates/footer.php' ?>
