<ul class="list-group">
    <li class="list-group-item"><a href="dashboard.php" style="color: #3f51b5; font-weight: 600;">Profile</a></li>
    <?php if($_SESSION["level"]==1){ ?>
    <li class="list-group-item"><a href="addcar.php" style="color: #3f51b5; font-weight: 600;">Add Car</a></li>
    <?php } ?>
    <li class="list-group-item"><a href="allcars.php" style="color: #3f51b5; font-weight: 600;">All Cars</a></li>
    <?php if($_SESSION["level"]==1){ ?>
    <li class="list-group-item"><a href="adduser.php" style="color: #3f51b5; font-weight: 600;">Add User</a></li>
    <?php } ?>
    <li class="list-group-item"><a href="allusers.php" style="color: #3f51b5; font-weight: 600;">All Users</a></li>
    <?php if($_SESSION["level"]==1){ ?>
    <li class="list-group-item"><a href="carstatus.php" style="color: #3f51b5; font-weight: 600;">Car Status</a></li>
    <li class="list-group-item"><a href="allrentedcars.php" style="color: #3f51b5; font-weight: 600;">All Rented Cars</a></li>
    <?php } ?>
    <li class="list-group-item"><a href="rentedcars.php" style="color: #3f51b5; font-weight: 600;">My Rented Cars</a></li>
    <?php if($_SESSION["level"]==1){ ?>
    <li class="list-group-item"><a href="awaitingcomfirmation.php" style="color: #3f51b5; font-weight: 600;">Awaiting Confirmation</a></li>
    <li class="list-group-item"><a href="allcontacts.php" style="color: #3f51b5; font-weight: 600;">All Contacts</a></li>
    <?php } ?>
    <li class="list-group-item"><a href="review.php" style="color: #3f51b5; font-weight: 600;">Review</a></li>
   
</ul>

<iframe src="https://my.atlistmaps.com/map/e8a9e975-b382-4bf9-9a30-e5a6545a6e38?share=true" allow="geolocation" width="100%" height="400px" frameborder="0" scrolling="no" allowfullscreen></iframe>