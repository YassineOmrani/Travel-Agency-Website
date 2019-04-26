<div id="main">
<div class="top2_wrapper">
  <div class="container">
    <div class="top2 clearfix">
      <header>
        <div class="logo_wrapper">
          <a href="logindex.php" class="logo">
            <img src="images/logo.png" alt="" class="img-responsive">
          </a>
        </div>
      </header>
      <div class="navbar navbar_ navbar-default">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="navbar-collapse navbar-collapse_ collapse">
          <ul class="nav navbar-nav sf-menu clearfix">
            <li><a href="logindex.php">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">Contacts</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="myReservations.php"><strong><?php echo "Hello ".$_SESSION['fullname'] ?></strong></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>