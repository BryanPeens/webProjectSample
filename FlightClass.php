<?php
/**
 * Description of FlightClass
 *
 * @author Bryan
 */
class FlightClass {
    //put your code here
    public $flightId;
    public $flightName;
    public $departDate;
    public $returnDate;
    public $arivalDestination;
    public $departDestination;
    public $cost;
    
    function getFlightId() {
        return $this->flightId;
    }

    function getFlightName() {
        return $this->flightName;
    }

    function getDepartDate() {
        return $this->departDate;
    }

    function getReturnDate() {
        return $this->returnDate;
    }

    function getArivalDestination() {
        return $this->arivalDestination;
    }

    function getDepartDestination() {
        return $this->departDestination;
    }

    function getCost() {
        return $this->cost;
    }

    function setFlightId($flightId) {
        $this->flightId = $flightId;
    }

    function setFlightName($flightName) {
        $this->flightName = $flightName;
    }

    function setDepartDate($departDate) {
        $this->departDate = $departDate;
    }

    function setReturnDate($returnDate) {
        $this->returnDate = $returnDate;
    }

    function setArivalDestination($arivalDestination) {
        $this->arivalDestination = $arivalDestination;
    }

    function setDepartDestination($departDestination) {
        $this->departDestination = $departDestination;
    }

    function setCost($cost) {
        $this->cost = $cost;
    }
    
    function __construct($flightName, $departDate, $returnDate, $arivalDestination, $departDestination, $cost) {
        $this->flightName = $flightName;
        $this->departDate = $departDate;
        $this->returnDate = $returnDate;
        $this->arivalDestination = $arivalDestination;
        $this->departDestination = $departDestination;
        $this->cost = $cost;
    }

    public function displayFlightInfo() {
        echo "Flight Name : ".$this->flightName."<br/>";
        echo "Departure Date : ".$this->departDate."<br/>";
        echo "Return Date : ".$this->returnDate."<br/>";
        echo "Arival Destination : ".$this->arivalDestination."<br/>";
        echo "Departure Destination : ".$this->departDestination."<br/>";
        echo "Cost : ".$this->cost."<br/>";
    }

    
}
