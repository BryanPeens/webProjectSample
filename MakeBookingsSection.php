
<!-- FLIGHTS -->
<div> 
    <div class="container"> 
        <div class="containerOrange" style="width: auto;">
            <div style="font-size: 23px">Flights</div> 
        </div><br/>  

        <form method="POST">
            <div class="field">
                <label for="departDate">Depart Date</label>
                <input type="date" id="DepartDate" name="DepartDate" value="<?php
                if (isset($_POST['btnFlightSearchBooking'])) {
                    echo $_POST['DepartDate'];
                }
                ?>">
            </div>

            <div class="field">
                <label for="departDate">Arrival Date</label>
                <input type="date" id="ArrivalDate" name="ArrivalDate" value="<?php
                if (isset($_POST['btnFlightSearchBooking'])) {
                    echo $_POST['ArrivalDate'];
                }
                ?>">
            </div>

            <div class="field">
                <label>Destination (Traveling From)</label>
                <select name="destinationFrom">
                    <option>Select Flight Destination</option>
                    <?php
                    foreach ($airports as $a) {
                        if (isset($_POST['btnFlightSearchBooking']) && $_POST['destinationFrom'] == $a) {
                            echo "<option selected>$a</option>";
                        } else {
                            echo "<option>$a</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="field">
                <label>Destination (Traveling To)</label>
                <select name="destinationTo">
                    <option>Select Flight Destination</option>
                    <?php
                    foreach ($airports as $a) {
                        if (isset($_POST['btnFlightSearchBooking']) && $_POST['destinationTo'] == $a) {
                            echo "<option selected>$a</option>";
                        } else {
                            echo "<option>$a</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="field">
                <label for="fname">Airline</label>
                <input type="text" id="Airline" name="Airline" placeholder="Airline" value="<?php
                if (isset($_POST['btnFlightSearchBooking'])) {
                    echo $_POST['Airline'];
                }
                ?>">
            </div>

            <div class="field">
                <label for="fname">Flight Number</label>
                <input type="text" id="FlightNumber" name="FlightNumber" placeholder="Flight number" value="<?php
                if (isset($_POST['btnFlightSearchBooking'])) {
                    echo $_POST['FlightNumber'];
                }
                ?>">
            </div>

            <div class="field">
                <label>Price Lower Than</label>
                <input type="text" name="flightPrice" placeholder="23000.30" value="<?php
                if (isset($_POST['flightPrice'])) {
                    echo $_POST['flightPrice'];
                }
                ?>">
            </div>

            <div class="fieldFull center">
                <input type="submit" id="btnFlightSearchBooking" name="btnFlightSearchBooking" value="Search">
                <a href="index.php"><button>Clear</button></a>
            </div>          
        </form><br/>
        <table class="table" style="width: 100%">
            <thead class="thead">
                <tr>
                    <th>Flight Number</th>
                    <th>Departure Date</th>
                    <th>Arrival Date</th>
                    <th>From Airport</th>
                    <th>To Airport</th>
                    <th>Seats</th>
                    <th>Price</th>
                    <th>Airline</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="tbody">
                <?php
                foreach ($allFlights as $flight) {
                    echo "<tr>";
                    foreach ($flight as $key => $element) {
                        if ($key === "fkAirline") {
                            $airlineID = $element;
                            $airName = flattenArray(DataHandler::findAirlineName($airlineID), 'name');

                            echo "<td>";
                            echo "$airName[0]";
                            echo "</td>";
                        } elseif ($key === "id") {
                            $id = $element;
                        } else {
                            echo "<td>";
                            echo "$element";
                            echo "</td>";
                        }
                    }
                    if (isset($_COOKIE['selectedFlightID']) && $_COOKIE['selectedFlightID'] == $id) {
                        $color = 'greenIcon';
                    } else {
                        $color = 'greyIcon';
                    }
                    echo "<td><div class='selectFlight' data-id='$id'><i class='fas fa-check-circle selectFlightIcon $color'></i></div></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<br/>

<!-- CARS -->    
<div>
    <div class="container"> 
        <div class="containerOrange" style="width: auto;">
            <div style="font-size: 23px">Cars</div> 
        </div><br/>
        <table class="table" style="width: 100%">
            <thead class="thead">
                <tr>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Mileage</th>
                    <th>Color</th>
                    <th>Year</th>
                    <th>Type</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="tbody">
                <?php
                foreach ($allCars as $car) {
                    echo "<tr>";
                    foreach ($car as $key => $element) {
                        if ($key === "fkType") {
                            $typeID = $element;
                            $typeName = flattenArray(DataHandler::findCarTypeName($typeID), 'name');

                            echo "<td>";
                            echo "$typeName[0]";
                            echo "</td>";
                        } elseif ($key === "id") {
                            $id = $element;
                        } else {
                            echo "<td>";
                            echo "$element";
                            echo "</td>";
                        }
                    }
                    if (isset($_COOKIE['selectedCarID']) && $_COOKIE['selectedCarID'] == $id) {
                        $color = 'greenIcon';
                    } else {
                        $color = 'greyIcon';
                    }
                    echo "<td><div class='selectCar' data-id='$id'><i class='fas fa-check-circle selectCarIcon $color'></i></div></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table><br/>
    </div>
</div>
<br/>

<!-- HOTELS -->
<div> 
    <div class="container"> 
        <div class="containerOrange" style="width: auto;">
            <div style="font-size: 23px">Hotels</div> 
        </div><br/>
        <table class="table" style="width: 100%">
            <thead class="thead">
                <tr>
                    <th>Hotel Name</th>
                    <th>Province</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Available Rooms</th>
                    <th>Acmdts</th>
                    <th>Room Price</th>
                    <th>Special Room Price</th>
                    <th>Breakfast Price</th>
                    <th>Room Service Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="tbody">
                <?php
                foreach ($allHotels as $hotel) {
                    echo "<tr>";
                    foreach ($hotel as $key => $element) {
                        if ($key === "pricePerRoom" || $key === "specialPricePerRoom" || $key === "priceForBreakfast" || $key === "priceForRoomService") {
                            echo "<td>";
                            echo "R $element";
                            echo "</td>";
                        } elseif ($key === "id") {
                            $id = $element;
                        } else {
                            echo "<td>";
                            echo "$element";
                            echo "</td>";
                        }
                    }
                    if (isset($_COOKIE['selectedHotelID']) && $_COOKIE['selectedHotelID'] == $id) {
                        $color = 'greenIcon';
                    } else {
                        $color = 'greyIcon';
                    }
                    echo "<td><div class='selectHotel' data-id='$id'><i class='fas fa-check-circle selectHotelIcon $color'></i></div></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table><br/>
    </div>
</div>

<form method="POST">
    <div class="fieldFull center">
        <input type="submit" id="btnMakeBooking" name="btnMakeBooking" value="Book">
        <a class="button" href="MakeBookingsPage.php">Reset</a>
    </div>  
</form>

<script type="text/javascript">

    $(document).ready(function () {
        $('div.selectFlight').click(function () {
            $.removeCookie("selectedFlightID");
            var ID = this.getAttribute('data-id');
            $.cookie("selectedFlightID", ID);
//            var cookieValue = $.cookie("selectedFlightID");
//            alert(cookieValue);  
            $('.selectFlightIcon').removeClass('greenIcon').addClass('greyIcon');
            $(this).find('i').removeClass("greyIcon").addClass('greenIcon');
        });

        $('div.selectCar').click(function () {
            $.removeCookie("selectedCarID");
            var ID = this.getAttribute('data-id');
            $.cookie("selectedCarID", ID);
//            var cookieValue = $.cookie("selectedCarID");
//            alert(cookieValue);  
            $('.selectCarIcon').removeClass('greenIcon').addClass('greyIcon');
            $(this).find('i').removeClass("greyIcon").addClass('greenIcon');
        });


        $('div.selectHotel').click(function () {
            $.removeCookie("selectedHotelID");
            var ID = this.getAttribute('data-id');
            $.cookie("selectedHotelID", ID);
//            var cookieValue = $.cookie("selectedHotelID");
//            alert(cookieValue);  
            $('.selectHotelIcon').removeClass('greenIcon').addClass('greyIcon');
            $(this).find('i').removeClass("greyIcon").addClass('greenIcon');
        });
    });

</script>


