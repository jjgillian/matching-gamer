<?php
require_once('partials/header.php');

if (!isset($_SESSION['uid']) || !isset($_SESSION['email']) || !isset($_SESSION['username'])) {
  // If any of [uid, email, username] are not set, redirect to login
  header("location: login.php?auth_required");
  exit();
}
?>

<div class="row">
  <div class="col-lg-8 col-md-10 col-sm-12 mx-auto matchupNow">
    <div class="card lightCard">
      <div class="card-body text-center">
        <p class="cardHeader">Match-up Now</p>
        <div class="row text-center mb-4">
          <div class="col-xs-12 col-sm-6 dashLinkDiv"><a href="#" class="btn darkBtn">Choose by game</a></div>
          <div class="col-xs-12 col-sm-6"><a href="#" class="btn darkBtn">Choose by matchup type</a></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-8 col-md-10 col-sm-12 mx-auto updatesNews">
    <div class="card lightCard">
      <div class="card-body text-center">
        <p class="cardHeader">Updates/News</p>
      </div>
    </div>
  </div>
</div>

<?php require_once('partials/footer.php'); ?>