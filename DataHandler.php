<?php

/**
 * Description of DataHandler
 *
 * @author Bryan
 */
class DataHandler {

    private $host, $user, $password, $link, $database;

    function __construct($host, $user, $password, $database) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }

    //Method that connects...
    function ConnectToDB() {
        $this->link = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if ($this->link) {
            //echo "Connected To Database... <br/><br/><br/>";
        }
    }

    private static function getConnection() {
        $dh = new DataHandler("localhost", "root", "", "fly_right_db");
        $dh->ConnectToDB();
        return $dh->link;
    }

    public static function createNewUser($image, $fname, $mname, $lname, $age, $country, $email, $phone, $pass, $isAdmin) {
        $dbLink = DataHandler::getConnection();
        $qry = "INSERT INTO `tblusers`(`userID`,`image`, `firstName`, `middleName`, `lastName`, `age`, `country`, `email`, `phoneNumber`, `password`, `isAdmin`)
                VALUES (NULL, '$image', '$fname', '$mname', '$lname', '$age', '$country', '$email', '$phone', '$pass', '$isAdmin')";

        if (mysqli_query($dbLink, $qry)) {
            echo '<br/>';
            echo "New User Created...";
            return true;
        }

        return false;
    }

    public static function UpdateUser($id, $image, $fname, $mname, $lname, $age, $country, $email, $phone, $pass, $isAdmin) {
        $dbLink = DataHandler::getConnection();

        $qry = "UPDATE `tblusers` SET `image`='$image',`firstName`='$fname',`middleName`='$mname',`lastName`='$lname',`age`='$age',`country`='$country',"
                . "`email`='$email',`phoneNumber`='$phone',`password`='$pass',`isAdmin`='$isAdmin' WHERE `userID`='$id';";

        if (mysqli_query($dbLink, $qry)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
     public static function UpdateUserAdmin($id, $fname, $mname, $lname, $age, $country, $email, $phone, $pass, $isAdmin) {
        $dbLink = DataHandler::getConnection();

        $qry = "UPDATE `tblusers` SET `firstName`='$fname',`middleName`='$mname',`lastName`='$lname',`age`='$age',`country`='$country',"
                . "`email`='$email',`phoneNumber`='$phone',`password`='$pass',`isAdmin`='$isAdmin' WHERE `userID`='$id';";

        if (mysqli_query($dbLink, $qry)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    

    public static function getAllUsers() {
        $dbLink = DataHandler::getConnection();
        $qry = "SELECT * FROM `tblusers`";

        $data = array();

        $display = mysqli_query($dbLink, $qry);
        while ($row = mysqli_fetch_array($display, 1)) {
            $data[] = $row;
        }
        return $data;
    }

    public static function getUser($id) {
        $dbLink = DataHandler::getConnection();
        $qry = "SELECT * FROM `tblusers` WHERE `userID`=$id";

        $data = array();

        $display = mysqli_query($dbLink, $qry);
        while ($row = mysqli_fetch_array($display, 1)) {
            $data[] = $row;
        }
        return $data;
    }

    function UserLogin($email, $password) {
        $qry = "SELECT `userID`, `firstName`, `middleName`, `lastName`, `age`, `country`, `email`, `phoneNumber`, `password`, `isAdmin`, `image` FROM `tblusers` WHERE `email`='$email' AND `password`='$password';";
        $display = mysqli_query($this->link, $qry);

        while ($row = mysqli_fetch_array($display, 1)) {
            $id = $row['userID'];
            $firstName = $row['firstName'];
            $midName = $row['middleName'];
            $lastName = $row['lastName'];
            $age = $row['age'];
            $country = $row['country'];
            $email = $row['email'];
            $phone = $row['phoneNumber'];
            $password = $row['password'];
            $isAdmin = $row['isAdmin'];
            $image = $row['image'];

            echo "$id | $firstName | $midName | $lastName | $age | $country | $email | $phone | $password | $isAdmin <br/>";

            $Obj = new User($id, $firstName, $midName, $lastName, $age, $country, $email, $phone, $password, $isAdmin, $image);

            $_SESSION['userObj'] = $Obj;

            return true;
        }

        return false;
    }

    function displayFlights($id) {
        $qry = "SELECT `id`, `FlightName`, `departDate`, `returnDate`, `arivalDestination`, `departureDestination`, `Price` FROM `tblflights` WHERE `tblflights`.`id`=$id";
        $displayFlights = mysqli_query($this->link, $qry);
        while ($row = mysqli_fetch_assoc($displayFlights)) {
            $id = $row['id'];
            $flightName = $row['FlightName'];
            $departDate = $row['departDate'];
            $returnDate = $row['returnDate'];
            $ariveDestination = $row['arivalDestination'];
            $departDestination = $row['departureDestination'];
            $cost = $row['Price'];

            echo "$id | $flightName | $departDate | $returnDate | $ariveDestination | $departDestination | $cost";
        }
    }

    public static function getAllAirlines() {
        $dbLink = DataHandler::getConnection();
        $qry = "SELECT * FROM `tblairlines`";
        $data = array();

        $display = mysqli_query($dbLink, $qry);
        while ($row = mysqli_fetch_array($display, 1)) {
            $data[] = $row;
        }
        return $data;
    }

    public static function getAllAirports() {
        $dbLink = DataHandler::getConnection();
        $qry = "SELECT fromAirport FROM tblflights UNION SELECT toAirport FROM tblflights;";
        $data = array();

        $display = mysqli_query($dbLink, $qry);
        while ($row = mysqli_fetch_array($display, 1)) {
            $data[] = $row;
        }

        return $data;
    }

    public static function createNewCar($make, $model, $mileage, $color, $year, $typeId) {
        $dbLink = DataHandler::getConnection();
        $qry = "INSERT INTO `tblcar`(`id`, `make`, `model`, `mileage`, `color`, `year`, `fkType`) 
                VALUES (NULL,'$make','$model','$mileage','$color','$year','$typeId')";

        if (mysqli_query($dbLink, $qry)) {
            echo '<br/>';
            echo "New Car Created...";
            return true;
        }

        return false;
    }

    public static function getAllCarTypes() {
        $dbLink = DataHandler::getConnection();
        $qry = "SELECT `name` FROM `tblcartypes`";
        $data = array();

        $display = mysqli_query($dbLink, $qry);
        while ($row = mysqli_fetch_array($display, 1)) {
            $data[] = $row;
        }
        return $data;
    }

    public static function getAllCars() {
        $dbLink = DataHandler::getConnection();
        $qry = "SELECT * FROM `tblcar`";
        $data = array();

        $display = mysqli_query($dbLink, $qry);
        while ($row = mysqli_fetch_array($display, 1)) {
            $data[] = $row;
        }

        return $data;
    }

    public static function findTypeId($name) {
        $dbLink = DataHandler::getConnection();
        $qry = "SELECT `id` FROM `tblcartypes` WHERE `name`='$name'";

        $data = array();

        $display = mysqli_query($dbLink, $qry);
        while ($row = mysqli_fetch_array($display, 1)) {
            $data[] = $row;
        }

        return $data;
    }

    public static function DeleteCar($id) {
        $dbLink = DataHandler::getConnection();

        $qry = "DELETE FROM `tblcar` WHERE `id`=$id";
        if (mysqli_query($dbLink, $qry)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function UpdateCar($make, $model, $mileage, $color, $year, $typeId, $id) {
        $dbLink = DataHandler::getConnection();
        $qry = "UPDATE `tblcar` SET `make`='$make',`model`='$model',`mileage`='$mileage',`color`='$color',`year`='$year',`fkType`='$typeId' WHERE `id`='$id';";

        if (mysqli_query($dbLink, $qry)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function createNewHotel($name, $province, $city, $address, $roomAvailable, $accomodates, $pricePerRoom, $specialPricePerRoom, $priceForBreakfast, $priceForRoomService) {
        $dbLink = DataHandler::getConnection();
        $qry = "INSERT INTO `tblhotels` (`id`, `name`, `province`, `city`, `address`, `roomsAvailable`, `accomodates`, `pricePerRoom`, `specialPricePerRoom`, `priceForBreakfast`, `priceForRoomService`)
                VALUES (NULL, '$name', '$province', '$city', '$address', '$roomAvailable', '$accomodates', '$pricePerRoom', '$specialPricePerRoom', '$priceForBreakfast', '$priceForRoomService');";

        if (mysqli_query($dbLink, $qry)) {
            echo '<br/>';
            echo "New Hotel Created...";
            return true;
        }

        return false;
    }

    public static function getAllHotels() {
        $dbLink = DataHandler::getConnection();

        $qry = "SELECT * FROM `tblhotels`";
        $data = array();

        $display = mysqli_query($dbLink, $qry);
        while ($row = mysqli_fetch_array($display, 1)) {
            $data[] = $row;
        }

        return $data;
    }

    public static function DeleteHotel($id) {
        $dbLink = DataHandler::getConnection();

        $qry = "DELETE FROM `tblhotels` WHERE `id`=$id";
        if (mysqli_query($dbLink, $qry)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function DeleteUser($id) {
        $dbLink = DataHandler::getConnection();

        $qry = "DELETE FROM `tblusers` WHERE `userID`=$id";
        if (mysqli_query($dbLink, $qry)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function DeleteBooking($id) {
        $dbLink = DataHandler::getConnection();

        $qry = "DELETE FROM `tblbookings` WHERE `id`=$id";
        if (mysqli_query($dbLink, $qry)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function DeleteFlight($id) {
        $dbLink = DataHandler::getConnection();

        $qry = "DELETE FROM `tblflights` WHERE `id`=$id";
        if (mysqli_query($dbLink, $qry)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function createNewFlight($flightNumber, $departDate, $arriveDate, $fromAirport, $toAirport, $seats, $price, $fkAirline) {
        $dbLink = DataHandler::getConnection();
        $qry = "INSERT INTO `tblflights` (`id`, `number`, `departureDate`, `arivalDate`, `fromAirport`, `toAirport`, `seats`, `price`, `fkAirline`)
                VALUES (NULL, '$flightNumber', '$departDate', '$arriveDate', '$fromAirport', '$toAirport', '$seats', '$price', '$fkAirline');";

        if (mysqli_query($dbLink, $qry)) {
            echo '<br/>';
            echo "New Car Created...";
            return true;
        }

        return false;
    }

    public static function getAllAirlineNames() {
        $dbLink = DataHandler::getConnection();
        $qry = "SELECT `name` FROM `tblairlines`";
        $data = array();

        $display = mysqli_query($dbLink, $qry);
        while ($row = mysqli_fetch_array($display, 1)) {
            $data[] = $row;
        }

        return $data;
    }

    public static function findAirlineId($name) {
        $dbLink = DataHandler::getConnection();
        $qry = "SELECT `id` FROM `tblairlines` WHERE `name`='$name'";

        $data = array();

        $display = mysqli_query($dbLink, $qry);
        while ($row = mysqli_fetch_array($display, 1)) {
            $data[] = $row;
        }

        return $data;
    }

    public static function findUserById($id) {
        $dbLink = DataHandler::getConnection();
        $qry = "SELECT * FROM `tblusers` WHERE `userID`='$id'";

        $data = array();

        $display = mysqli_query($dbLink, $qry);
        while ($row = mysqli_fetch_array($display, 1)) {
            $data[] = $row;
        }

        return $data;
    }

    public static function findFlightById($id) {
        $dbLink = DataHandler::getConnection();
        $qry = "SELECT * FROM `tblflights` WHERE `id`='$id'";

        $data = array();

        $display = mysqli_query($dbLink, $qry);
        while ($row = mysqli_fetch_array($display, 1)) {
            $data[] = $row;
        }

        return $data;
    }

    public static function findCarById($id) {
        $dbLink = DataHandler::getConnection();
        $qry = "SELECT * FROM `tblcar` WHERE `id`='$id'";

        $data = array();

        $display = mysqli_query($dbLink, $qry);
        while ($row = mysqli_fetch_array($display, 1)) {
            $data[] = $row;
        }

        return $data;
    }

    public static function findHotelById($id) {
        $dbLink = DataHandler::getConnection();
        $qry = "SELECT * FROM `tblhotels` WHERE `id`='$id'";

        $data = array();

        $display = mysqli_query($dbLink, $qry);
        while ($row = mysqli_fetch_array($display, 1)) {
            $data[] = $row;
        }

        return $data;
    }

    public static function findAirlineName($id) {
        $dbLink = DataHandler::getConnection();
        $qry = "SELECT `name` FROM `tblairlines` WHERE `id`='$id'";

        $data = array();

        $display = mysqli_query($dbLink, $qry);
        while ($row = mysqli_fetch_array($display, 1)) {
            $data[] = $row;
        }

        return $data;
    }

    public static function findCarTypeName($id) {
        $dbLink = DataHandler::getConnection();
        $qry = "SELECT `name` FROM `tblcartypes` WHERE `id`='$id'";

        $data = array();

        $display = mysqli_query($dbLink, $qry);
        while ($row = mysqli_fetch_array($display, 1)) {
            $data[] = $row;
        }

        return $data;
    }

    public static function getAllFlights() {
        $dbLink = DataHandler::getConnection();
        $qry = "SELECT * FROM `tblflights`";
        $data = array();

        $display = mysqli_query($dbLink, $qry);
        while ($row = mysqli_fetch_array($display, 1)) {
            $data[] = $row;
        }
        return $data;
    }

    public static function createNewBooking($fkUserID, $fkFlightID, $fkCarID, $fkHotelID, $bookingDate, $cancelationStatus) {
        $dbLink = DataHandler::getConnection();

        if (!$fkCarID) {
            $fkCarID = 'NULL';
        }

        if (!$fkHotelID) {
            $fkHotelID = 'NULL';
        }

        $qry = "INSERT INTO `tblbookings` (`id`, `fkUserId`, `fkFlightId`, `fkCarId`, `fkHotelId`, `bookingDate`, `cancelStatus`)
                VALUES (NULL, '$fkUserID', '$fkFlightID', $fkCarID, $fkHotelID, '$bookingDate', '$cancelationStatus');";

        var_dump($qry);

        if (mysqli_query($dbLink, $qry)) {
            echo '<br/>';
            echo "New Booking Created...";
            return true;
        }

        return false;
    }

    public static function getAllBookingsForUser($userid) {
        $dbLink = DataHandler::getConnection();
        $qry = "SELECT b.id,b.bookingDate, b.cancelStatus AS canceled, f.number AS flightNumber, f.departureDate, f.arivalDate, f.fromAirport, f.toAirport, f.price,
            a.name AS airlineName, c.make AS carMake, c.model AS carModel, t.name AS carType, h.name AS hotelName, h.province, h.city, h.address
            FROM tblbookings AS b 
            INNER JOIN tblflights AS f ON f.id = b.fkFlightId
            INNER JOIN tblairlines AS a ON a.id = f.fkAirline
            LEFT JOIN tblcar AS c ON c.id = b.fkCarId
            LEFT JOIN tblcartypes AS t ON t.id = c.fkType
            LEFT JOIN tblhotels AS h ON h.id = b.fkHotelId
            WHERE b.fkUserId='$userid';";

        $data = array();

        $display = mysqli_query($dbLink, $qry);
        while ($row = mysqli_fetch_array($display, 1)) {
            $data[] = $row;
        }
        return $data;
    }

    public static function getAllBookings() {
        $dbLink = DataHandler::getConnection();
        $qry = "SELECT b.id, u.firstName, u.lastName, u.phoneNumber, u.email, b.bookingDate, b.cancelStatus AS canceled, f.number AS flightNumber, f.departureDate, f.arivalDate, f.fromAirport, f.toAirport, f.price, a.name AS airlineName, c.make AS carMake, c.model AS carModel, t.name AS carType, h.name AS hotelName, h.province, h.city, h.address
                FROM tblbookings AS b 
                INNER JOIN tblusers AS u ON u.userID = b.fkUserId
                INNER JOIN tblflights AS f ON f.id = b.fkFlightId
                INNER JOIN tblairlines AS a ON a.id = f.fkAirline
                LEFT JOIN tblcar AS c ON c.id = b.fkCarId
                LEFT JOIN tblcartypes AS t ON t.id = c.fkType
                LEFT JOIN tblhotels AS h ON h.id = b.fkHotelId;";

        $data = array();

        $display = mysqli_query($dbLink, $qry);
        while ($row = mysqli_fetch_array($display, 1)) {
            $data[] = $row;
        }
        return $data;
    }

    public static function cancelBooking($id) {
        $dbLink = DataHandler::getConnection();
        $qry = "UPDATE `tblbookings` SET `cancelStatus`='1' WHERE `id`='$id';";

        if (mysqli_query($dbLink, $qry)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
