        
<div class="topnav" id="myTopnav">
    <a href="index.php" class="active">Home</a>
    <a href="BookingsPage.php">Bookings</a>
    <a href="ContactUsPage.php">Contact Us</a>
    <a href="AboutUsPage.php">About Us</a>
    
    <?php
    //var_dump($_SESSION);
    if(isset($_SESSION['userObj'])){        
        if($_SESSION['userObj']->isAdmin) {
            echo '<a href="AdminPage.php">Administration</a>';
        }
        
        //echo '<a href="BookingInstructionsPage.php">Booking instructions</a>';
        echo '<a href="Logout.php">Logout</a>';
    }
    else {
        echo '<a href="RegisterPage.php">Register</a>';
        echo '<a href="LoginPage.php">Login</a>';
    }
    ?>
    
</div>    


