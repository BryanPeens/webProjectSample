<span style="position: relative; display: inline-block; width: 100%;">
    <figure id="HomeImg">
        <img style='z-index:300;' src="media/flyStuff/canvaFlightIcon.png">                  
    </figure>

    <?php if (isset($_SESSION['userObj'])) { ?>
        <a id="profileImg" href="ProfilePage.php?id=<?php echo $_SESSION['userObj']->id ?>">
            <?php
            $imageName = $_SESSION['userObj']->image;
            echo "<img id='image' src='media/flyStuff/$imageName' alt='Your profile image' /><br/>";

            $userFName = $_SESSION['userObj']->FName;
            $userLName = $_SESSION['userObj']->Lname;
            $username = $userFName . " " . $userLName;

            echo "<div>$username</div>";
            ?>
        </a>
    <?php } ?>

</span>