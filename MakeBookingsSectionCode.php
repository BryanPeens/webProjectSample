<?php

include_once './DataHandler.php';

if (isset($_GET['error'])) {
    echo "<section style='text-align:center;'>";
    echo "<h3>Please correct the indicated fields </h3>";
    echo "<span style='color:red'>Please select at least a flight</span>";
    echo "</section>";
}

$allFlights = DataHandler::getAllFlights();
$allCars = DataHandler::getAllCars();
$allHotels = DataHandler::getAllHotels();

if (isset($_POST['btnFlightSearchBooking'])) {

    if (isset($_COOKIE['selectedFlightID'])) {
        echo $_COOKIE['selectedFlightID'];
    }

    if (isset($_COOKIE['selectedCarID'])) {
        echo $_COOKIE['selectedCarID'];
    }

    if (isset($_COOKIE['selectedHotelID'])) {
        echo $_COOKIE['selectedHotelID'];
    }

    $allAirlines = DataHandler::getAllAirlines();

    $airlineField = trim(filter_var($_POST['Airline']));
    if (!empty($airlineField)) {
        $allAirlines = array_values(filterArrayStartsWith($allAirlines, "name", $airlineField));

        if (sizeof($allAirlines) > 0) {
            $airlineId = $allAirlines[0]['id'];
            $allFlights = filterArrayExact($allFlights, 'fkAirline', $airlineId);
        } else {
            $allFlights = array();
        }
    }

    $flightNumber = trim(filter_var($_POST['FlightNumber']));
    if (!empty($flightNumber)) {
        $allFlights = filterArrayContains($allFlights, 'number', $flightNumber);
    }

    $departDate = trim(filter_var($_POST['DepartDate']));
    if (!empty($departDate)) {
        $allFlights = filterArrayExact($allFlights, 'departureDate', $departDate);
    }

    $arivalDate = trim(filter_var($_POST['ArrivalDate']));
    if (!empty($arivalDate)) {
        $allFlights = filterArrayExact($allFlights, 'arivalDate', $arivalDate);
    }

    $fromAirport = trim(filter_var($_POST['destinationFrom']));
    if ($fromAirport != "Select Flight Destination") {
        if (!empty($fromAirport)) {
            $allFlights = filterArrayContains($allFlights, 'fromAirport', $fromAirport);
        }
    }

    $toAirport = trim(filter_var($_POST['destinationTo']));
    if ($toAirport != "Select Flight Destination") {
        if (!empty($toAirport)) {
            $allFlights = filterArrayContains($allFlights, 'toAirport', $toAirport);
        }
    }

    $priceLowerThan = trim(filter_var($_POST['flightPrice']));
    if (!empty($priceLowerThan)) {
        $allFlights = filterArrayLessThan($allFlights, 'price', $priceLowerThan);
    }
}

if (isset($_POST['btnMakeBooking'])) {
    $parameters = '?';
    $navigate = false;

    if (isset($_COOKIE['selectedFlightID'])) {
        $flightID = $_COOKIE['selectedFlightID'];
        $parameters = $parameters . 'flightID=' . $flightID . '';
        $navigate = true;
    }

    if (isset($_COOKIE['selectedCarID'])) {
        $carID = $_COOKIE['selectedCarID'];
        if ($navigate) {
            $parameters = $parameters . '&carID=' . $carID . '';
        }
    }

    if (isset($_COOKIE['selectedHotelID'])) {
        $hotelID = $_COOKIE['selectedHotelID'];
        if ($navigate) {
            $parameters = $parameters . '&hotelID=' . $hotelID . '';
        }
    }

    if ($navigate) {
        header('Location: ' . 'ReviewBookingsPage.php' . $parameters);
    } else {
        header('Location: ' . 'MakeBookingsPage.php?error=true');
    }
}
