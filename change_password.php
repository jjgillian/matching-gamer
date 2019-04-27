<?php
require_once('partials/header.php');

// route guard
$s = $_SESSION;
if (!isset($s['uid']) || !isset($s['username']) || !isset($s['email'])) {
	// check for [uid, username, email]
	header("location: login.php?auth_required");
	exit();
}

function displayMessages()
{
	if (isset($_GET['required'])) {
		echo "<div class='alert alert-danger text-center'>Password and confirm password are required.</div>";
	}
	if (isset($_GET['passwords_must_match'])) {
		echo "<div class='alert alert-danger text-center'>Password and confirm password must match.</div>";
	}
	if (isset($_GET['db_failed'])) {
		echo "<div class='alert alert-danger text-center'>Setting your new password failed due to a problem on our end. Please try again or contact support.</div>";
	}
}
?>

<div class="row">
	<div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
		<div class="card lightCard">
			<div class="card-header text-center">Enter Your New Password</div>
			<div class="card-body">
				<form action="controllers/set_password.php" method="POST">
					<input type="hidden" name="email" value="<?php echo $email; ?>">
					<!-- Password -->
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" placeholder="Password" name="password">
					</div>
					<!-- Password 2 -->
					<div class="form-group">
						<label for="password2">Confirm password</label>
						<input type="password" class="form-control" id="password2" placeholder="Confirm password" name="password2">
					</div>
					<!-- Err Messages -->
					<?php displayMessages(); ?>
					<!-- Submit -->
					<div class="text-center">
						<button type="submit" class="btn darkBtn" name="change-password">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php require_once('partials/footer.php'); ?>