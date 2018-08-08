<?php

if (isset($_POST['btnContactUs'])) {

    $errors = array();

    $name = trim(filter_var($_POST['firstname']));

    if (empty($name)) {
        $errors['firstname'] = "First name is required <br />";
    } else {
        if (ctype_alpha($name)) {
            echo "Welcome $name ";
        } else {
            $errors['Name'] = "Please ensure your First Name contains only alphabetic characters, with no spaces<br/>";
        }
    }


    $surname = trim(filter_var($_POST['lastname']));

    if (empty($surname)) {
        $errors['lastname'] = "Last name is required <br />";
    } else {
        if (ctype_alpha($surname)) {
            echo "$surname <br/>";
        } else {
            $errors['lastname'] = "Please ensure your First Name contains only alphabetic characters, with no spaces<br/>";
        }
    }

    $destination = trim(filter_var($_POST['place']));
    if ($destination == "-Select Location-") {
        $errors['place'] = "Please select a valid Country <br/>";
    } else {
        echo "Your destination is : $destination<br/>";
    }
    $email = trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    if (empty($email)) {
        $errors['email'] = "Please provide a valid email <br/>";
    } else {
        echo "Your Email is : $email <br/>";
    }
    $comment = trim(filter_var($_POST['subject']));
    if (empty($comment)) {
        $errors['subject'] = "Please provide a valid subject <br/>";
    } else {
        echo "Your message : $comment <br/>";
    }

    echo "<section style='text-align:center;'>";
    if (count($errors) != 0) {
        echo "<h3>Please correct the indicated fields </h3>";
        foreach ($errors as $error) {
            echo "<span style = 'color:red'>$error</span>";
        }
    } else {
        echo "<br/>";
        echo "<h3>Welcome to FlyRight $name.</h3>";
    }
    echo "</section>";
}
?>