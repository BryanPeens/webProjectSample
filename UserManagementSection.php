<?php
include_once './DataHandler.php';
$returned = DataHandler::getAllUsers();
?>

<table class="table">
    <thead class="thead">
        <tr>
            <th style="width: 1%; overflow: hidden; word-wrap: break-word;">Profile Image</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Country</th>
            <th style="width: 1%; overflow: hidden; word-wrap: break-word;">Email</th>
            <th>Phone Number</th>
            <th>Password</th>
            <th>Admin</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody class="tbody">
        <?php
        foreach ($returned as $return) {
            echo "<tr>";
            foreach ($return as $key => $element) {
                if ($key === "userID") {
                    $id = $element;
                } elseif ($key === "image") {
                    echo "<td style='width: 1%; overflow: hidden; word-wrap: break-word;'>";
                    echo "$element";
                    echo "</td>";
                } elseif ($key === "email") {
                    echo "<td style='width: 1%; overflow: hidden; word-wrap: break-word;'>";
                    echo "$element";
                    echo "</td>";
                } else {
                    echo "<td>";
                    echo "$element";
                    echo "</td>";
                }
            }
            echo "<td><div><a href='UserManagementPage.php?id=$id'><i class='fas fa-pencil-alt blueIcon'></i></a></div></td>";
            echo "<td><div><a href='deletePage.php?id=$id&object=user'><i class='fas fa-trash-alt redIcons'></i></a></div></td>";
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

        <?php
        if (isset($editing)) {
            echo "<input type='hidden' name='editUserId' value=$editUserId>";
        }
        ?>
        
        <div class="field">   
            <label for="fname">User First Name</label><br/>
            <input type="text" id="fname" name="firstname" placeholder="Your name" value="<?php
            if (isset($editing)) {
                echo $name;
            } elseif (isset($_POST['btnCreateUser'])) {
                echo $_POST['firstname'];
            }
            ?>">
        </div>

        <div class="field">   
            <label for="mname">User Middle Name</label><br/>
            <input type="text" id="mname" name="middlename" placeholder="Your middle name" value="<?php
            if (isset($editing)) {
                echo $midName;
            } elseif (isset($_POST['btnCreateUser'])) {
                echo $_POST['middlename'];
            }
            ?>">
        </div>

        <div class="field">   
            <label for="lname">User Last Name</label><br/>
            <input type="text" id="lname" name="lastname" placeholder="Your last name" value="<?php
            if (isset($editing)) {
                echo $surname;
            } elseif (isset($_POST['btnCreateUser'])) {
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
                    if (isset($editing)) {
                        echo "<option selected>$age</option>";
                    } elseif (isset($_POST['btnCreateUser']) && $_POST['age'] == $age) {
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
                    if (isset($editing)) {
                        echo "<option selected>$country</option>";
                    } elseif (isset($_POST['btnCreateUser']) && $_POST['country'] == $country) {
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
            <input type="text" id="email" name="email" placeholder="Your email" value="<?php
            if (isset($editing)) {
                echo $email;
            } elseif (isset($_POST['btnCreateUser'])) {
                echo $_POST['email'];
            }
            ?>">  
        </div>

        <div class="field">   
            <label for="phone">Phone Number</label><br/>
            <input type="text" id="phone" name="phone" placeholder="Your phone number" value="<?php
            if (isset($editing)) {
                echo $phone;
            } elseif (isset($_POST['btnCreateUser'])) {
                echo $_POST['phone'];
            }
            ?>">        
        </div>

        <div class="field">   
            <label>Password</label><br/>
            <input type="password" name="password" value="<?php
            if (isset($editing)) {
                echo $firstPass;
            } elseif (isset($_POST['btnCreateUser'])) {
                echo $_POST['password'];
            }
            ?>"/>
        </div>

        <div class="field">   
            <label>Is Administrator</label><br/>
            <?php
            if (isset($editing)) {
                $admin = $isAdmin;
            } elseif (isset($_POST['btnCreateUser']) && isset($_POST['isAdmin'])) {
                $admin = $_POST['isAdmin'];
            } else {
                $admin = '0';
            }
            ?>
            <input style="width: auto;" type="checkbox" name="isAdmin" <?php if($admin == '1') { echo 'checked=checked'; } ?> value="<?php echo $admin; ?>" />
        </div>

        <?php
        if (isset($_GET['id'])) {
            ?>
            <div class="fieldFull center">   
                <input type="submit" name="btnUpdateUser" value="Update">
            </div>
            <?php
        } else {
            ?>
            <div class="fieldFull center">   
                <input type="submit" name="btnCreateUser" value="Create">
            </div>
            <?php
        }
        ?>


    </form>
</div>