<?php

$flights = DataHandler::getAllFlights();
$airports = flattenArray(DataHandler::getAllAirports(), "fromAirport");

if (isset($_POST['btnSearchFlights'])) {

    $allAirlines = DataHandler::getAllAirlines();

    $airlineField = trim(filter_var($_POST['Airline']));
    if (!empty($airlineField)) {
        $allAirlines = filterArrayStartsWith($allAirlines, "name", $airlineField);
        $allAirlines = array_values($allAirlines);

        if (sizeof($allAirlines) > 0) {
            $airlineId = $allAirlines[0]['id'];
            $flights = filterArrayExact($flights, 'fkAirline', $airlineId);
        } else {
            $flights = array();
        }
    }

    $flightNumber = trim(filter_var($_POST['FlightNumber']));
    if (!empty($flightNumber)) {
        $flights = filterArrayContains($flights, 'number', $flightNumber);
    }

    $departDate = trim(filter_var($_POST['DepartDate']));
    if (!empty($departDate)) {
        $flights = filterArrayExact($flights, 'departureDate', $departDate);
    }

    $arivalDate = trim(filter_var($_POST['ArrivalDate']));
    if (!empty($arivalDate)) {
        $flights = filterArrayExact($flights, 'arivalDate', $arivalDate);
    }

    $fromAirport = trim(filter_var($_POST['destinationFrom']));
    if ($fromAirport != "Select Flight Destination") {
        if (!empty($fromAirport)) {
            $flights = filterArrayContains($flights, 'fromAirport', $fromAirport);
        }
    }

    $toAirport = trim(filter_var($_POST['destinationTo']));
    if ($toAirport != "Select Flight Destination") {
        if (!empty($toAirport)) {
            $flights = filterArrayContains($flights, 'toAirport', $toAirport);
        }
    }

    $priceLowerThan = trim(filter_var($_POST['flightPrice']));
    if (!empty($priceLowerThan)) {
        $flights = filterArrayLessThan($flights, 'price', $priceLowerThan);
    }
}

