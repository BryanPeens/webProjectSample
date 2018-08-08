<?php 

include_once './User.php';
include_once './DataHandler.php';
include_once './HelperFunctions.php';

session_start();

include_once './ContactUsSectionCode.php';
include_once './ProfileSectionCode.php';
include_once './RegisterSectionCode.php';
include_once './LoginSectionCode.php';
include_once './IndexSectionCode.php';
include_once './CarManagementSectionCode.php';
include_once './HotelManagementSectionCode.php';
include_once './FlightManagementSectionCode.php';
include_once './UserManagementSectionCode.php';
include_once './MakeBookingsSectionCode.php';
include_once './ReviewBookingsSectionCode.php';
include_once './MyBookingsSectionCode.php';
include_once './BookingsManagementSectionCode.php';


$requestUri = $_SERVER['REQUEST_URI'];

/* Check for logout */
if(strpos($requestUri, 'Logout.php') !== false) {
    session_destroy();
    header('Location: ' . 'index.php');
    die();
}