<?php

if (isset($_POST['btnLogin'])) {
    $errors = array();

    $email = trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = trim(filter_var($_POST['password']));

    if (empty($email || empty($password))) {
        $errors['Both'] = "Both fields are required.<br/>";
    } else {

        if (empty($email)) {
            $errors['email'] = "Your Email is required to login <br/>";
        } else {
//            echo "Your email is : " . $email . " <br/>";
        }


        if (empty($password)) {
            $errors['email'] = "Please enter your password <br/>";
        } else {
//            echo "Your Password is : " . $password . " <br/>";
        }
    }
    echo "<section style='text-align:center;'>";
    if (count($errors) != 0) {

        echo "<h3>Please correct the indicated fields </h3>";
        foreach ($errors as $error) {
            echo "<span style = 'color:red'>$error</span>";
        }
    } else {

        require_once './DataHandler.php';
        $handler = new DataHandler("localhost", "root", "", "fly_right_db");
        $handler->ConnectToDB();

        $result = $handler->UserLogin($email, $password);

        if ($result) {
            header('Location: ' . 'index.php');
            die();
        } else {
            echo "<section style='text-align:center;'>";
            echo "<h3>Please correct the indicated fields </h3>";
            echo "<span style='color:red'>Email and password does not match</span>";
            echo "</section>";
        }
    }
    echo "</section>";
}
?>