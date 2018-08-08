<div class="container">
    <form method="POST">
        <div class="field">
            <label for="departDate">Depart Date</label>
            <input type="date" id="DepartDate" name="DepartDate" value="<?php
            if (isset($_POST['btnSearchFlights'])) {
                echo $_POST['DepartDate'];
            }
            ?>">
        </div>

        <div class="field">
            <label for="departDate">Arrival Date</label>
            <input type="date" id="ArrivalDate" name="ArrivalDate" value="<?php
            if (isset($_POST['btnSearchFlights'])) {
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
                    if (isset($_POST['btnSearchFlights']) && $_POST['destinationFrom'] == $a) {
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
                    if (isset($_POST['btnSearchFlights']) && $_POST['destinationTo'] == $a) {
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
            if (isset($_POST['btnSearchFlights'])) {
                echo $_POST['Airline'];
            }
            ?>">
        </div>

        <div class="field">
            <label for="fname">Flight Number</label>
            <input type="text" id="FlightNumber" name="FlightNumber" placeholder="Flight number" value="<?php
            if (isset($_POST['btnSearchFlights'])) {
                echo $_POST['FlightNumber'];
            }
            ?>">
        </div>

        <div class="field">
            <label>Price Lower Than</label>
            <input type="text" name="flightPrice" placeholder="23000.30" value="<?php if(isset($_POST['flightPrice'])){ echo $_POST['flightPrice'];}  ?>">
        </div>

        <div class="fieldFull center">
            <input type="submit" id="btnSearchFlights" name="btnSearchFlights" value="Search">
            <a href="index.php"><button>Clear</button></a>
        </div>          
    </form>
</div>

<br/>

<table class="table">
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
        </tr>
    </thead>
    <?php
    echo "<tbody class='tbody'>";
    if (isset($flights)) {
        foreach ($flights as $return) {

            echo "<tr>";
            foreach ($return as $key => $element) {
                if ($key === "id") {
                    
                } else {
                    echo "<td>";
                    echo "$element";
                    echo "</td>";
                }
            }
            echo "</tr>";
        }
    }
    echo "</tbody>";
    ?>
</table>

<?php
if (empty($flights)) {
    echo "<div class='center padded'>No Flights Are Available</div>";
}
?>




