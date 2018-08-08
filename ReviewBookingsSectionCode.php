<?php

if (isset($_GET['flightID'])) {
    $flightid = $_GET['flightID'];
} else {
    $flightid = false;
}

if (isset($_GET['carID'])) {
    $carid = $_GET['carID'];
} else {
    $carid = false;
}

if (isset($_GET['hotelID'])) {
    $hotelid = $_GET['hotelID'];
} else {
    $hotelid = false;
}

if ($flightid) {
    $selectedFlight = DataHandler::findFlightById($flightid);
}
if ($carid) {
    $selectedCar = DataHandler::findCarById($carid);
}
if ($hotelid) {
    $selectedHotel = DataHandler::findHotelById($hotelid);
}

if (isset($_POST['btnConfirmBooking'])) {

    $UID = $_SESSION['userObj']->id;
    $FID = trim(filter_var($_POST['FID']));
    $CID = trim(filter_var($_POST['CID']));
    
    if(empty($CID)){
      $CID = false;  
    }
    
    $HID = trim(filter_var($_POST['HID']));
    
    if(empty($HID)){
      $HID = false;  
    }
    
    $date = date("Y/m/d");
    $status = '0';

    $booking = DataHandler::createNewBooking($UID, $FID, $CID, $HID, $date, $status);

    if ($booking) {
        header('Location: ' . 'MyBookingsPage.php');
        die();
    }
}
?>