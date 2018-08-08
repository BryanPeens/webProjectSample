<?php

if (isset($_POST['btnCreateHotel'])) {

    $errors = array();

    $hotelName = trim(filter_var($_POST['hotelName']));
    if (empty($hotelName)) {
        $errors['hoteName'] = "Hotel name is required <br />";
    }

    $province = trim(filter_var($_POST['province']));
    if (empty($province)) {
        $errors['province'] = "Province is required <br />";
    }

    $city = trim(filter_var($_POST['city']));
    if (empty($city)) {
        $errors['city'] = "City is required <br />";
    }

    $address = trim(filter_var($_POST['address']));
    if (empty($address)) {
        $errors['address'] = "Address is required <br />";
    }

    $availableRooms = trim(filter_var($_POST['availableRooms']));
    if (empty($availableRooms)) {
        $errors['availableRooms'] = "Availale rooms is required <br />";
    }

    $accommodates = trim(filter_var($_POST['accommodates']));
    if (empty($accommodates)) {
        $errors['accommodates'] = "Amount of people room accommodates is required  <br />";
    }

    $pricePerRoom = trim(filter_var($_POST['pricePerRoom']));
    if (empty($pricePerRoom)) {
        $errors['pricePerRoom'] = "Room price is required <br />";
    }

    $specialPricePerRoom = trim(filter_var($_POST['specialPricePerRoom']));
    if (empty($specialPricePerRoom)) {
        $errors['specialPricePerRoom'] = "Special room price is required <br />";
    }

    $priceForBreakfast = trim(filter_var($_POST['priceForBreakfast']));
    if (empty($priceForBreakfast)) {
        $errors['priceForBreakfast'] = "Breakfast price is required <br />";
    }

    $priceForRoomservice = trim(filter_var($_POST['priceForRoomservice']));
    if (empty($priceForRoomservice)) {
        $errors['priceForRoomservice'] = "Room service price is required <br />";
    }


    echo "<section style='text-align:center;'>";


    if (count($errors) != 0) {

        echo "<h3>Please correct the indicated fields </h3>";
        foreach ($errors as $error) {
            echo "<span style = 'color:red'>$error</span>";
        }
    } else {

        $result = DataHandler::createNewHotel($hotelName, $province, $city, $address, $availableRooms, $accommodates,
                $pricePerRoom, $specialPricePerRoom, $priceForBreakfast, $priceForRoomservice);

        if ($result) {
            header('Location:' . 'HotelManagementPage.php');
            die();
        }
    }
    echo "</section>";
}   