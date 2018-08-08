<?php
include_once './DataHandler.php';
$returned = DataHandler::getAllFlights();
?>

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
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody class="tbody">
        <?php
        foreach ($returned as $return) {
            echo "<tr>";
            foreach ($return as $key => $element) {
                if ($key === "fkAirline") {
                    $airlineID = $element;
                    $airName = flattenArray(DataHandler::findAirlineName($airlineID), 'name');

                    echo "<td>";
                    echo "$airName[0]";
                    echo "</td>";
                }
                elseif ($key === "id") {
                    $id = $element;
                } else {
                    echo "<td>";
                    echo "$element";
                    echo "</td>";
                }
            }
            echo "<td><div><a href='#'><i class='fas fa-pencil-alt blueIcon'></i></a></div></td>";
            echo "<td><div><a href='deletePage.php?id=$id&object=flight'><i class='fas fa-trash-alt redIcons'></i></a></div></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<br/>
<div class="center createLink" >
    <i class="fas fa-plus mediumFontSize greenIcon"></i>
</div>
<br/>
<div class="container">
    <form method="POST">

        <div class="field">
            <label for="flightNumber">Flight Number</label><br/>
            <input type="text" id="flightNumber" name="flightNumber" value="<?php
            if (isset($_POST['btnCreateFlight'])) {
                echo $_POST['flightNumber'];
            }
            ?>">
        </div>

        <div class="field">
            <label for="departDate">Departure Date</label><br/>
            <input type="date" id="departDate" name="departDate" value="<?php
            if (isset($_POST['btnCreateFlight'])) {
                echo $_POST['departDate'];
            }
            ?>">
        </div>

        <div class="field">
            <label for="arivalDate">Arrival Date</label><br/>
            <input type="date" id="arivalDate" name="arivalDate" value="<?php
            if (isset($_POST['btnCreateFlight'])) {
                echo $_POST['arivalDate'];
            }
            ?>">
        </div>

        <div class="field">
            <label>From Airport</label><br/>
            <select name="destinationFrom">
                <option>Select From Airport</option>
                <?php
                $destinationFrom = array('Johannesburg', 'Port Elizabeth', 'Cape Town', 'Namibia', 'China', 'France', 'Bolivia', 'Zimbabwe');
                foreach ($destinationFrom as $newDestination) {
                    if (isset($_POST['btnCreateFlight']) && $_POST['destinationFrom'] == $newDestination) {
                        echo "<option selected>$newDestination</option>";
                    } else {
                        echo "<option>$newDestination</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="field">
            <label>To Airport</label><br/>
            <select name="destinationTo">
                <option>Select To Airport</option>
                <?php
                $destinationTo = array('Johannesburg', 'Port Elizabeth', 'Cape Town', 'Namibia', 'China', 'France', 'Bolivia', 'Zimbabwe');
                foreach ($destinationTo as $newDestination) {
                    if (isset($_POST['btnCreateFlight']) && $_POST['destinationTo'] == $newDestination) {
                        echo "<option selected>$newDestination</option>";
                    } else {
                        echo "<option>$newDestination</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="field">
            <label>Number Of Seats</label><br/>
            <input type="number" name="numberOfSeats" placeholder="120" value="<?php
            if (isset($_POST['btnCreateFlight'])) {
                echo $_POST['numberOfSeats'];
            }
            ?>">
        </div>

        <div class="field">
            <label>Price (ZAR)</label><br/>
            <input type="number" name="price" placeholder="1500" value="<?php
            if (isset($_POST['btnCreateFlight'])) {
                echo $_POST['price'];
            }
            ?>">
        </div>

        <div class="field">
            <label>Airline</label><br/>
            <select name="airlineName">
                <option>Select Airline</option>
                <?php
                foreach ($airlineNames as $name) {
                    if (isset($_POST['btnCreateFlight']) && $_POST['airlineName'] == $name) {
                        echo "<option selected>$name</option>";
                    } else {
                        echo "<option>$name</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="fieldFull center">
            <input type="submit" name="btnCreateFlight" value="Create">
        </div>

    </form>
</div>