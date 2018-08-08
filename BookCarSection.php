<div class="container">
    <form method="POST">
        
        <div class="field">
            <label for="pickupDate">Pick Up Date</label><br/>
            <input type="date" id="pickupDateDate" name="pickupDate" >
        </div>

        <div class="field">
            <label>Pickup Time</label><br/>
            <input type="time" name="pickupTime" placeholder=" 13:00" /> 
        </div>

        <div class="field">
            <label>Drop of Date</label><br/>
            <input type="date" name="dropOfPoit" id="dropOfDate"/> 
        </div>


        <div class="field">
            <label>Drop of Time</label><br/>
            <input type="time" name="dropOfTime" placeholder=" 13:00" /> 
        </div>

        <div class="field">
            <label>Pickup up Point</label><br/>
            <select name="pickupPoint"
                    <option>Select Destination</option>
                        <?php
                        $destinationTo = array('Johannesburg', 'Port Elizabeth', 'Cape Town', 'Namibia', 'China', 'France', 'Bolivia', 'Zimbabwe');

                        foreach ($destinationTo as $newDestination) {
                            echo "<option>$newDestination</option>";
                        }
                        ?>
            </select>
        </div>

        <div class="field">
            <label>Drop of Point</label><br/>
            <select name="dropOfPoint"
                    <option>Select Destination</option>
                        <?php
                        $destinationTo = array('Johannesburg', 'Port Elizabeth', 'Cape Town', 'Namibia', 'China', 'France', 'Bolivia', 'Zimbabwe');

                        foreach ($destinationTo as $newDestination) {
                            echo "<option>$newDestination</option>";
                        }
                        ?>
            </select>
        </div>
        
        <div class="fieldFull center">
            <input type="submit" name="btnSearch" value="Search">
        </div>

    </form>
</div>

