<?php

include_once 'HeaderLogic.php';

$bookingid = $_GET['bookingid'];

$result = DataHandler::cancelBooking($bookingid);

if ($result) {
    
    header('Location: '.'MyBookingsPage.php');
    die();
}



?>
