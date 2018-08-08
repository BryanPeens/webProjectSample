<div class="container">
    <div>
        <div style="font-size: 23px">You are welcome to contact one of our service agents or send us a message below:</div> 
        <div class="center" style="margin-left: 20%; width: 500px">
        <p>South Africa: 086 100 1234</p>
        <p>International: +27 (11) 086 6100 or +27 (21) 815 4100</p>
        <p>Enquiries: enquiries@flyright.com</p>
        </div>
    </div>

    <form  method="POST" action="">
        <div class="field">
            <label for="firstname">First Name</label><br/>
            <input type="text" id="fname" name="firstname" placeholder="Your name">
        </div>

        <div class="field">
            <label for="lastname">Last Name</label><br/>
            <input type="text" id="lname" name="lastname" placeholder="Your last name">        
        </div>

        <div class="field">
            <label>Destination (Current Location)</label>
            <select name="place">
                <option>Select Location</option>
                <?php
                $destinations = array('Johannesburg', 'Port Elizabeth', 'Cape Town', 'Namibia', 'China', 'France', 'Bolivia', 'Zimbabwe');
                for ($des = 1; $des < 15; $des++) {
                    foreach ($destinations as $newDestination) {
                        echo "<option>$newDestination</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="field">
            <label for="email">Email</label><br/>
            <input type="text" id="email" name="email" placeholder="Your email..">
        </div>

        <div class="fieldFull">
            <label for="subject">Comments</label><br/>
            <textarea id="subject" name="subject" placeholder="Please briefly explain how we can be of assistance..." style="height:200px"></textarea>
        </div>    

        <div class="fieldFull center">
            <input type="submit" value="Submit" name="btnContactUs">
        </div>
    </form>

</div>