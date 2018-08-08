<div class="container">  
    <form method="POST" enctype="multipart/form-data">
        <?php
        $id = $user['userID'];
        $image = $user['image'];
        $fname = $user['firstName'];
        $mname = $user['middleName'];
        $lname = $user['lastName'];
        $age = $user['age'];
        $country = $user['country'];
        $email = $user['email'];
        $phone = $user['phoneNumber'];
        $password = $user['password'];
        ?>

        <div class="fieldFull">
            <label>Profile picture</label><br/>         
            <input type='file' name="uploads" onchange="readURL(this);" />          
        </div>

        <div class="fieldFull center">
            <img width="200" height="200" id="profileImage" src="media/flyStuff/<?php echo $image; ?>" alt="Your profile image" /><br/>
        </div>

        <div class="field">
            <label for="fname">First Name</label><br/>
            <input type="text" id="fname" name="firstname" placeholder="Your name" value="<?php
            if (isset($_POST['btnProfile'])) {
                echo $_POST['firstname'];
            } else {
                echo $fname;
            }
            ?>">  
        </div>

        <div class="field">           
            <label for="mname">Middle Name</label><br/>
            <input  type="text" id="mname" name="middlename" placeholder="Your middle name" value="<?php
            if (isset($_POST['btnProfile'])) {
                echo $_POST['middlename'];
            } else {
                echo $mname;
            }
            ?>">
        </div>

        <div class="field">
            <label for="lname">Last Name</label><br/>
            <input type="text" id="lname" name="lastname" placeholder="Your last name" value="<?php
            if (isset($_POST['btnProfile'])) {
                echo $_POST['lastname'];
            } else {
                echo $lname;
            }
            ?>">              
        </div>

        <div class="field">   
            <label>Age</label><br/>
            <select name="age">
                <option><?php echo $age; ?></option>
                <?php
                for ($age = 10; $age < 101; $age++) {
                    if (isset($_POST['btnProfile']) && $_POST['age'] == $age) {
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
                <option><?php echo $country; ?></option>
                <?php
                $countries = array('South Africa', 'Australia', 'France', 'Canada', 'Nigeria', 'China', 'Bolivia', 'Mexico');

                foreach ($countries as $c) {
                    if (isset($_POST['btnProfile']) && $_POST['country'] == $c) {
                        echo "<option selected>$c</option>";
                    } else {
                        echo "<option>$c</option>";
                    }
                }
                ?>    
            </select>    
        </div>

        <div class="field">
            <label for="email">Email</label><br/>
            <input type="text" id="email" name="email" placeholder="Your email.." value="<?php
            if (isset($_POST['btnProfile'])) {
                echo $_POST['email'];
            } else {
                echo $email;
            }
            ?>">               
        </div>

        <div class="field">
            <label for="phone">Phone Number</label><br/>
            <input type="text" id="phone" name="phone" placeholder="Your phone number is.." value="<?php
            if (isset($_POST['btnProfile'])) {
                echo $_POST['phone'];
            } else {
                echo $phone;
            }
            ?>">               
        </div>
        
        <div class="field">
            <label>Password</label><br/>
            <input type="text" name="passwordOne" value="<?php
            if (isset($_POST['btnProfile'])) {
                echo $_POST['passwordOne'];
            } else {
                echo $password;
            }
            ?>" />            
        </div>

        <div class="field">
            <label>Repeat Password</label><br/>
            <input type="text" name="passwordTwo" value="<?php
            if (isset($_POST['btnProfile'])) {
                echo $_POST['passwordTwo'];
            } else {
                echo $password;
            }
            ?>" />            
        </div>

        <div class="fieldFull center">
            <input type="submit" name="btnProfile" value="Save">
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