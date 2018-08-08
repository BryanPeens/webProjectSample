<div class="container">
    <form method="POST" enctype="multipart/form-data">

        <div class="fieldFull">
            <label>Profile picture</label><br/>         
            <input type='file' name="uploads" onchange="readURL(this);" />          
        </div>

        <div class="fieldFull center">
            <img width="200" height="200"  id="profileImage" src="media/flyStuff/default.png" alt="Your profile image" /><br/>
        </div>

        <div class="field">
            <label for="fname">First Name</label><br/>
            <input type="text" id="fname" name="firstname" placeholder="Your name" value="<?php
            if (isset($_POST['btnRegister'])) {
                echo $_POST['firstname'];
            }
            ?>">  
        </div>

        <div class="field">           
            <label for="mname">Middle Name</label><br/>
            <input  type="text" id="mname" name="middlename" placeholder="Your middle name" value="<?php
            if (isset($_POST['btnRegister'])) {
                echo $_POST['middlename'];
            }
            ?>">
        </div>

        <div class="field">
            <label for="lname">Last Name</label><br/>
            <input type="text" id="lname" name="lastname" placeholder="Your last name" value="<?php
            if (isset($_POST['btnRegister'])) {
                echo $_POST['lastname'];
            }
            ?>">              
        </div>

        <div class="field">   
            <label>Age</label><br/>
            <select name="age">
                <option>Select User Age</option>
                <?php
                for ($age = 10; $age < 101; $age++) {
                    if (isset($_POST['btnRegister']) && $_POST['age'] == $age) {
                        echo "<option selected>$age</option>";
                    } else {
                        echo "<option>$age</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="field">   
            <label>Country</label><br/>
            <select name="country">
                <option>Select Country</option>
                <?php
                $countries = array('South Africa', 'Australia', 'France', 'Canada', 'Nigeria', 'China', 'Bolivia', 'Mexico');

                foreach ($countries as $country) {
                    if (isset($_POST['btnRegister']) && $_POST['country'] == $country) {
                        echo "<option selected>$country</option>";
                    } else {
                        echo "<option>$country</option>";
                    }
                }
                ?>    
            </select>    
        </div>

        <div class="field">
            <label for="email">Email</label><br/>
            <input type="text" id="email" name="email" placeholder="Your email.." value="<?php
            if (isset($_POST['btnRegister'])) {
                echo $_POST['email'];
            }
            ?>">               
        </div>

        <div class="field">
            <label for="phone">Phone Number</label><br/>
            <input type="text" id="phone" name="phone" placeholder="Your phone number is.." value="<?php
            if (isset($_POST['btnRegister'])) {
                echo $_POST['phone'];
            }
            ?>">               
        </div>

        <div class="field">
            <label>Password</label><br/>
            <input type="password" name="passwordOne" value="" />            
        </div>

        <div class="field">
            <label>Repeat Password</label><br/>
            <input type="password" name="passwordTwo" value="" />            
        </div>

        <div class="fieldFull center">
            <input type="submit" name="btnRegister" value="Register">
        </div>
    </form>   
</div>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {

                $('#profileImage')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>