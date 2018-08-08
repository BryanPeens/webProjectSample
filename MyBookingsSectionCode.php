<?php

if (isset($_SESSION['userObj'])) {
    $loggedInUserID = $_SESSION['userObj']->id;
    $allBookings = DataHandler::getAllBookingsForUser($loggedInUserID);
} else {
    $allBookings = array();
}








