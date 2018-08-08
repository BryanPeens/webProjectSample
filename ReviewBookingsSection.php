<!-- FLIGHTS -->
<div> 
    <div class="container"> 
        <div class="containerOrange" style="width: auto;">
            <div style="font-size: 23px">Flights</div> 
        </div><br/>  
        <?php
        if (isset($selectedFlight)) {
            foreach ($selectedFlight as $flight) {
                foreach ($flight as $key => $chosenFlight) {
                    echo "$key => $chosenFlight<br/>";
                }
            }
        }
        ?>
    </div>
</div><br/>

<!-- CARS --> 
<?php if ($carid) { ?> 
    <div> 
        <div class="container"> 
            <div class="containerOrange" style="width: auto;">
                <div style="font-size: 23px">Cars</div> 
            </div><br/>  
            <?php
            if (isset($selectedCar)) {
                foreach ($selectedCar as $car) {

                    foreach ($car as $key => $chosenCar) {
                        echo "$key => $chosenCar<br/>";
                    }
                }
            }
            ?>
        </div>
    </div><br/>
<?php } ?>

<!-- HOTELS --> 
<?php if ($hotelid) { ?> 
    <div> 
        <div class="container"> 
            <div class="containerOrange" style="width: auto;">
                <div style="font-size: 23px">Hotels</div> 
            </div><br/>  
            <?php
            if (isset($selectedHotel)) {
                foreach ($selectedHotel as $hotel) {

                    foreach ($hotel as $key => $chosenHotel) {
                        echo "$key => $chosenHotel<br/>";
                    }
                }
            }
            ?>
        </div>
    </div><br/>
<?php } ?>

<form method="POST">
    <div class="fieldFull center">
        <input type="hidden" name="FID" value="<?php
        if ($flightid) {
            echo "$flightid";
        }
        ?>">
        <input type="hidden" name="CID" value="<?php
        if ($carid) {
            echo "$carid";
        }
        ?>">
        <input type="hidden" name="HID" value="<?php
        if ($hotelid) {
            echo "$hotelid";
        }
        ?>">
        <input type="submit" id="btnConfirmBooking" name="btnConfirmBooking" value="Confirm">
        <a class="button" href="MakeBookingsPage.php">Cancel</a>
    </div>  
</form>