<?php

include_once 'HeaderLogic.php';

$object = $_GET['object'];
$id = $_GET['id'];

if ($object == 'car') {
    $result = DataHandler::DeleteCar($id);
    if (!$result) {
        echo "Error deleting car";
    }
    header('Location: ' . 'CarManagementPage.php');
    
} elseif ($object == 'hotel') {
    $result = DataHandler::DeleteHotel($id);
    if (!$result) {
        echo "Error deleting hotel";
    }
    header('Location: ' . 'HotelManagementPage.php');
    
} elseif ($object == 'flight') {
 $result = DataHandler::DeleteFlight($id);
    if (!$result) {
        echo "Error deleting flight";
    }
    header('Location: ' . 'FlightManagementPage.php');

} elseif ($object == 'user') {
 $result = DataHandler::DeleteUser($id);
    if (!$result) {
        echo "Error deleting user";
    }
    header('Location: ' . 'UserManagementPage.php');

} elseif ($object == 'booking') {
 $result = DataHandler::DeleteBooking($id);
    if (!$result) {
        echo "Error deleting booking";
    }
    header('Location: ' . 'BookingsManagementPage.php');
}
?>

