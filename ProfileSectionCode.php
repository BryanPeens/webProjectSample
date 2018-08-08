<?php

if (isset($_SESSION['userObj']) && isset($_GET['id'])) {

    $id = $_GET['id'];
    $user = DataHandler::getUser($id)[0];

    if (isset($_POST['btnProfile'])) {

        $errors = array();

        $picturename = $_FILES['uploads']['name'];
        $type = $_FILES['uploads']['type'];
        $filename = $_FILES['uploads']['tmp_name'];
        $size = $_FILES['uploads']['size'];

        $name = trim(filter_var($_POST['firstname']));
        if (empty($name)) {
            $errors['firstname'] = "First name is required <br />";
        } else {
            if (ctype_alpha($name)) {
                //echo "Welcome $name <br/>";
            } else {
                $errors['Name'] = "Please ensure your First Name contains only alphabetic characters, with no spaces<br/>";
            }
        }

        $midName = trim(filter_var($_POST['middlename']));
        if (empty($midName)) {
            $errors['middlename'] = "Middle name is required <br/>";
        } else {
            if (ctype_alpha($midName)) {
                //echo "Your Middle name is $midName <br/>";
            } else {
                $errors['middlename'] = "Please ensure your Middle Name contains only alphabetic characters, with no spaces <br/>";
            }
        }

        $surname = trim(filter_var($_POST['lastname']));
        if (empty($surname)) {
            $errors['lastname'] = "Lastname is required <br/>";
        } else {
            if (ctype_alpha($name)) {
                //echo "Your Surname is $surname <br/>";
            } else {
                $errors['lastname'] = "Please ensure your Surname contains only alphabetic characters, with no spaces <br/>";
            }
        }

        $age = trim(filter_var($_POST['age']));
        if ($age == "Select User Age") {
            $errors['age'] = "Please select a valid age <br/>";
        }

        $country = trim(filter_var($_POST['country']));
        if ($country == "Select Country") {
            $errors['country'] = "Please select a valid Country <br/>";
        }

        $email = trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        if (empty($email)) {
            $errors['email'] = "Please provide a valid email <br/>";
        }

        $phone = trim(filter_var($_POST['phone']));
        if (empty($phone)) {
            $errors['phone'] = "Please provide a phone number<br/>";
        }
        if (preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phone)) {
            $errors['phone'] = "Please provide a valid phone number <br/>";
        }

        $firstPass = trim(filter_var($_POST['passwordOne']));
        if (empty($firstPass)) {
            $errors['passwordOne'] = "Password One is required <br/>";
        }

        $secondPass = filter_var($_POST['passwordTwo']);
        if (empty($secondPass)) {
            $errors['passwordTwo'] = "Password Two is required <br/>";
        }

        if ($firstPass != $secondPass) {
            $errors['mismatchKey'] = "Passwords do not match <br/>";
        }

        if ($picturename == "") {
            $picturename = $user['image'];
        } else {
            if ($size > 2.5 * 1024 * 1024) {
                $error['picSizeError'] = "The size limit is 2.5MB. Upload a smaller size file <br/>";
            } else {
                $imageCollection = array("image/jpg", "image/jpeg", "image/bmp", "image/png");
                $exists = false;
                foreach ($imageCollection as $imgType) {

                    if ($type == $imgType) {
                        $exists = true;
                        break;
                    } else {
                        $exists = false;
                    }
                }
                if (!$exists) {
                    $error['picTypeError'] = "Wrong file type! <br/>";
                } else {
                    $path = "media/flyStuff/$picturename";
                    if (count($errors) == 0) {
                        move_uploaded_file($filename, $path);
                    }
                }
            }
        }

        echo "<section style='text-align:center;'>";
        if (count($errors) != 0) {
            echo "<h3>Please correct the indicated fields </h3>";
            foreach ($errors as $error) {
                echo "<span style = 'color:red'>$error</span>";
            }
        } else {
            $result = DataHandler::UpdateUser($id, $picturename, $name, $midName, $surname, $age, $country, $email, $phone, $firstPass, $user['isAdmin']);
            if ($result) {                              
                
                $Obj = new User($id, $name, $midName, $surname, $age, $country, $email, $phone, $firstPass, $user['isAdmin'], $picturename);
                $_SESSION['userObj'] = $Obj;
                
                header('Location:' . 'ProfilePage.php?id=' . $id . '');
                die();
            }else {
//                echo "ERROR!!!!!!!!!!!!!!!";
            }
        }
        echo "</section>";
    }
}
?>