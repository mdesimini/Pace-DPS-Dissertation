<?php include '_include/head.php'; ?>

<h1>DPS Dissertation Admin</h1>

<br><br>

<div class="container">
    <img src="https://vulcan.seidenberg.pace.edu/~f15-cs691-dps/test/images/logo.png" alt="logo" style="width: 200px; display: block; margin: 0 auto; margin-bottom: 25px;">
<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail" style="text-align: center;">
      <img style="height: 150px; padding: 10px;" src="assets/dissertation.png" alt="dissertation">
      <div class="caption">
        <h3>Dissertations</h3>
        <p><a href="<?=$url_root?>/dissertation/create.php" class="btn btn-primary" role="button">Add</a> <a href="<?=$url_root?>/dissertation/index.php" class="btn btn-default" role="button">Manage</a></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail" style="text-align: center;">
      <img style="height: 150px; padding: 10px;" src="assets/advisor.png" alt="advisor">
      <div class="caption">
        <h3>Advisors</h3>
        <p><a href="<?=$url_root?>/person/create.php" class="btn btn-primary" role="button">Add</a> <a href="<?=$url_root?>/person/index.php" class="btn btn-default" role="button">Manage</a></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail" style="text-align: center;">
      <img style="height: 150px; padding: 10px;" src="assets/externalpub.jpg" alt="externalpub">
      <div class="caption">
        <h3>External Publications</h3>
        <p><a href="<?=$url_root?>/external_publication/create.php" class="btn btn-primary" role="button">Add</a> <a href="<?=$url_root?>/external_publication/index.php" class="btn btn-default" role="button">Manage</a></p>
      </div>
    </div>
  </div>    
</div>
</div>    


<?php include '_include/footer.php'; ?>