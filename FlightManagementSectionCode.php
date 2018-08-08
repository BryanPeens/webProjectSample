<?php

$airlineNames = flattenArray(DataHandler::getAllAirlineNames(), 'name');

if (isset($_POST['btnCreateFlight'])) {

    $errors = array();

    $flightNumber = trim(filter_var($_POST['flightNumber']));
    if (empty($flightNumber)) {
        $errors['flightNumber'] = "Flight number is required <br />";
    }

    $departDate = trim(filter_var($_POST['departDate']));
    if (empty($departDate)) {
        $errors['departDate'] = "Departure date is required <br />";
    }

    $arivalDate = trim(filter_var($_POST['arivalDate']));
    if (empty($arivalDate)) {
        $errors['arivalDate'] = "Arival date is required <br />";
    }

    $fromAirport = trim(filter_var($_POST['destinationFrom']));
    if ($fromAirport == "Select From Airport") {
        $errors['age'] = "From destination is required <br/>";
    }

    $toAirport = trim(filter_var($_POST['destinationTo']));
    if ($toAirport == "Select To Airport") {
        $errors['destinationTo'] = "To destination is required <br/>";
    }

    $numberOfSeats = trim(filter_var($_POST['numberOfSeats']));
    if (empty($numberOfSeats)) {
        $errors['numberOfSeats'] = "Number of seats on flight is required <br />";
    }

    $price = trim(filter_var($_POST['price']));
    if (empty($price)) {
        $errors['price'] = "Price is required <br />";
    }
    
    $airlineName = trim(filter_var($_POST['airlineName']));
    if ($airlineName == "Select Airline") {
        $errors['airlineName'] = "Airline is required <br/>";
    }

    echo "<section style='text-align:center;'>";
    if (count($errors) != 0) {

        echo "<h3>Please correct the indicated fields </h3>";
        foreach ($errors as $error) {
            echo "<span style = 'color:red'>$error</span>";
        }
    } else {

        $airlineId = flattenArray(DataHandler::findAirlineId($airlineName), 'id');
        if (!empty($airlineId)) {
            $airline = $airlineId[0];
        } else {
            $airline = 1;
        }

        $result = DataHandler::createNewFlight($flightNumber, $departDate, $arivalDate, $fromAirport, $toAirport, $numberOfSeats, $price, $airline);

        if ($result) {
            header('Location:' . 'FlightManagementPage.php');
            die();
        }
    }
    echo "</section>";
}
?>    

