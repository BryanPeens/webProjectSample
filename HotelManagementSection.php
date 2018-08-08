<?php
include_once './DataHandler.php';
$returned = DataHandler::getAllHotels();
?>
<table class="table">
    <thead class="thead">
        <tr>
            <th>Hotel Name</th>
            <th>Province</th>
            <th>City</th>
            <th>Address</th>
            <th>Available Rooms</th>
            <th>Accommodates</th>
            <th>Room Price</th>
            <th>Special Room Price</th>
            <th>Breakfast Price</th>
            <th>Room Service Price</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody class="tbody">
        <?php
        foreach ($returned as $return) {
            echo "<tr>";
            foreach ($return as $key => $element) {
                if ($key === "pricePerRoom" || $key === "specialPricePerRoom" || $key === "priceForBreakfast" || $key === "priceForRoomService") {
                    echo "<td>";
                    echo "R $element";
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
            echo "<td><div><a href='deletePage.php?id=$id&object=hotel'><i class='fas fa-trash-alt redIcons'></a></i></div></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<br/>
<div class="center createLink">
    <i class="fas fa-plus mediumFontSize greenIcon"></i>
</div>
<br/>
<br/>
<div class="container">
    <form method="POST">    
        <div class="field">
            <label for="hotelName">Hotel Name</label><br/>
            <input type="text" id="hotelName" name="hotelName" value="<?php
            if (isset($_POST['btnCreateHotel'])) {
                echo $_POST['hotelName'];
            }
            ?>">
        </div>

        <div class="field">
            <label for="province">Province</label><br/>
            <input type="text" id="province" name="province" value="<?php
            if (isset($_POST['btnCreateHotel'])) {
                echo $_POST['province'];
            }
            ?>">
        </div>

        <div class="field">
            <label for="city">City</label><br/>
            <input type="text" id="city" name="city" value="<?php
            if (isset($_POST['btnCreateHotel'])) {
                echo $_POST['city'];
            }
            ?>">
        </div>

        <div class="field">
            <label for="address">Address</label><br/>
            <input type="text" id="address" name="address" value="<?php
            if (isset($_POST['btnCreateHotel'])) {
                echo $_POST['address'];
            }
            ?>">
        </div>

        <div class="field">
            <label for="availableRooms">Available Rooms</label><br/>
            <input type="text" id="availableRooms" name="availableRooms" value="<?php
            if (isset($_POST['btnCreateHotel'])) {
                echo $_POST['availableRooms'];
            }
            ?>">
        </div>

        <div class="field">
            <label for="accommodates">Accommodates</label><br/>
            <input type="text" id="accommodates" name="accommodates" value="<?php
            if (isset($_POST['btnCreateHotel'])) {
                echo $_POST['accommodates'];
            }
            ?>">
        </div>

        <div class="field">
            <label for="pricePerRoom">Price Per Room</label><br/>
            <input type="text" id="pricePerRoom" name="pricePerRoom" value="<?php
            if (isset($_POST['btnCreateHotel'])) {
                echo $_POST['pricePerRoom'];
            }
            ?>">
        </div>

        <div class="field">
            <label for="specialPricePerRoom">Special Price Per Room</label><br/>
            <input type="text" id="specialPricePerRoom" name="specialPricePerRoom" value="<?php
            if (isset($_POST['btnCreateHotel'])) {
                echo $_POST['specialPricePerRoom'];
            }
            ?>">
        </div>

        <div class="field">
            <label for="priceForBreakfast">Price For Breakfast</label><br/>
            <input type="text" id="priceForBreakfast" name="priceForBreakfast" value="<?php
            if (isset($_POST['btnCreateHotel'])) {
                echo $_POST['priceForBreakfast'];
            }
            ?>">
        </div>

        <div class="field">
            <label for="priceForRoomservice">Price For Room Service</label><br/>
            <input type="text" id="priceForRoomservice" name="priceForRoomservice" value="<?php
            if (isset($_POST['btnCreateHotel'])) {
                echo $_POST['priceForRoomservice'];
            }
            ?>">
        </div>

        <div class="fieldFull center">
            <input type="submit" name="btnCreateHotel" value="Create">
        </div>
    </form>
</div>
