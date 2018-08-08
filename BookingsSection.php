<div class="container">
    <a href="BookingInstructionsPage.php" class="center tile" >
        <i class="fas fa-info-circle mediumFontSize"></i>
        <br/>
        <br/>
        <div>Booking Instructions</div>
    </a>
    <a href="MakeBookingsPage.php" class="center tile" >
        <i class="fas fa-book mediumFontSize" ></i>
        <br/>
        <br/>
        <div>Book now</div>
    </a>
   
    <?php if (isset($_SESSION['userObj'])) { ?>
        <a href="MyBookingsPage.php" class="center tile" >
            <i class="fas fa-address-card mediumFontSize" ></i>
            <br/>
            <br/>
            <div>My bookings</div>
        </a>
    <?php } ?>

</div>