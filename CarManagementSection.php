<?php
include_once './DataHandler.php';
$returned = DataHandler::getAllCars();
?>
<table class="table">
    <thead class="thead">
        <tr>
            <th>Make</th>
            <th>Model</th>
            <th>Mileage</th>
            <th>Color</th>
            <th>Year</th>
            <th>Type</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody class="tbody">
        <?php
        foreach ($returned as $return) {
            echo "<tr>";
            foreach ($return as $key => $element) {
                if ($key === "fkType") {
                    $typeID = $element;
                    $typeName = flattenArray(DataHandler::findCarTypeName($typeID), 'name');

                    echo "<td>";
                    echo "$typeName[0]";
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
            echo "<td><div><a href='deletePage.php?id=$id&object=car'><i class='fas fa-trash-alt redIcons'></a></i></div></td>";
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



<div class="container">
    <form method="POST">    
        <div class="field">
            <label for="make">Make</label><br/>
            <input type="text" id="make" name="make" value="<?php
            if (isset($_POST['btnCreateCar'])) {
                echo $_POST['make'];
            }
            ?>">
        </div>

        <div class="field">
            <label for="model">Model</label><br/>
            <input type="text" id="model" name="model" value="<?php
            if (isset($_POST['btnCreateCar'])) {
                echo $_POST['model'];
            }
            ?>">
        </div>

        <div class="field">
            <label for="mileage">Mileage</label><br/>
            <input type="text" id="mileage" name="mileage" value="<?php
            if (isset($_POST['btnCreateCar'])) {
                echo $_POST['mileage'];
            }
            ?>">
        </div>

        <div class="field">
            <label for="color">Color</label><br/>
            <input type="text" id="color" name="color" value="<?php
            if (isset($_POST['btnCreateCar'])) {
                echo $_POST['color'];
            }
            ?>">
        </div>

        <div class="field">
            <label for="year">Manufactured Year</label><br/>
            <input type="text" id="year" name="year" value="<?php
            if (isset($_POST['btnCreateCar'])) {
                echo $_POST['year'];
            }
            ?>">
        </div>

        <div class="field">
            <label for="type">Type</label><br/>
            <select name="type">
                <option>Select Vehicle Type</option>
                <?php
                foreach ($carTypes as $type) {
                    if (isset($_POST['btnCreateCar']) && $_POST['type'] == $type) {
                        echo "<option selected>$type</option>";
                    } else {
                        echo "<option>$type</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="fieldFull center">
            <input type="submit" name="btnCreateCar" value="Create">
        </div>
    </form>
</div>
