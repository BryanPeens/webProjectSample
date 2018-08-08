<?php

if (isset($_GET['id'])) {
    $editUserId = $_GET['id'];
    $userByID = DataHandler::findUserById($editUserId);

    if (!empty($userByID)) {
        $editing = true;
    } else {
        $editing = false;
    }

    foreach ($userByID as $userData) {
        foreach ($userData as $key => $element) {
            if ($key == "firstName") {
                $name = $element;
            } elseif ($key == "middleName") {
                $midName = $element;
            } elseif ($key == "lastName") {
                $surname = $element;
            } elseif ($key == "age") {
                $age = $element;
            } elseif ($key == "country") {
                $country = $element;
            } elseif ($key == "email") {
                $email = $element;
            } elseif ($key == "phoneNumber") {
                $phone = $element;
            } elseif ($key == "password") {
                $firstPass = $element;
            } elseif ($key == "isAdmin") {
                $isAdmin = $element;
            }
        }
    }
}

if (isset($_POST['btnCreateUser'])) {

    $errors = array();

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
        $errors['country'] = "Please select a valid country <br/>";
    }

    $email = trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    if (empty($email)) {
        $errors['email'] = "Please provide a valid email <br/>";
    } else {
        //echo "Your Email is : $email <br/>";
    }

    $phone = trim(filter_var($_POST['phone']));
    if (empty($phone)) {
        $errors['phone'] = "Please provide a phone number<br/>";
    }
    if (preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phone)) {
        $errors['phone'] = "Please provide a valid phone number <br/>";
    }

    $firstPass = trim(filter_var($_POST['password']));
    if (empty($firstPass)) {
        $errors['password'] = "Password is required <br/>";
    }

    if (isset($_POST['isAdmin'])) {
        $isAdmin = '1';
    } else {
        $isAdmin = '0';
    }

    echo "<section style='text-align:center;'>";
    if (count($errors) != 0) {
        echo "<h3>Please correct the indicated fields </h3>";
        foreach ($errors as $error) {
            echo "<span style = 'color:red'>$error</span>";
        }
    } else {
        $result = DataHandler::createNewUser('default.png', $name, $midName, $surname, $age, $country, $email, $phone, $firstPass, $isAdmin);

        if ($result) {
            header('Location:' . 'UserManagementPage.php');
            die();
        }
    }
    echo "</section>";
}

if (isset($_POST['btnUpdateUser'])) {
    $editUserId = trim(filter_var($_POST['editUserId']));
    $name = trim(filter_var($_POST['firstname']));
    $midName = trim(filter_var($_POST['middlename']));
    $surname = trim(filter_var($_POST['lastname']));
    $age = trim(filter_var($_POST['age']));
    $country = trim(filter_var($_POST['country']));
    $email = trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $phone = trim(filter_var($_POST['phone']));
    $firstPass = trim(filter_var($_POST['password']));

    if (isset($_POST['isAdmin'])) {
        $isAdmin = '1';
    } else {
        $isAdmin = '0';
    }

    $result = DataHandler::UpdateUserAdmin($editUserId, $name, $midName, $surname, $age, $country, $email, $phone, $firstPass, $isAdmin);

    if ($result) {
        header('Location:' . 'UserManagementPage.php');
        die();
    }
}
?>
