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
	$g = $_GET;
	if (isset($g['password_incorrect'])) {
		echo "<div class='text-danger text-center'><small>Incorrect password.</small></div>";
	}
}

$email = $s['user']['email'];
?>

<div class="row">
	<div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
		<div class="card lightCard">
			<div class="card-header text-center">Delete Account</div>
			<div class="card-body">
				<p>Are you sure you want to delete your account? This can't be undone.</p>
				<p><small>Enter your password to delete your account.</small></p>
				<form action="controllers/delete_account.php" method="POST">
					<input type="hidden" name="email" value="<?php echo $email; ?>">
					<!-- Password -->
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" placeholder="Password" name="password">
						<!-- Err Messages -->
						<?php displayMessages(); ?>
					</div>
					<!-- Submit -->
					<div class="text-center">
						<button type="submit" class="btn darkBtn" name="delete-account">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php require_once('partials/footer.php'); ?>