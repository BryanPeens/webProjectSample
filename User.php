<?php
/**
 * Description of User
 *
 * @author Bryan
 */
class User {
    //put your code here
    public $id;
    public $FName;
    public $Mname;
    public $Lname;
    public $age;
    public $country;
    public $email;
    public $phoneNumber;
    public $passOne;
    public $passTwo;
    public $isAdmin;
    public $image;
    
    function getImage() {
        return $this->image;
    }

    function setImage($image) {
        $this->image = $image;
    }
    
    function getId() {
        return $this->id;
    }

    function getFName() {
        return $this->FName;
    }

    function getMname() {
        return $this->Mname;
    }

    function getLname() {
        return $this->Lname;
    }

    function getAge() {
        return $this->age;
    }

    function getCountry() {
        return $this->country;
    }

    function getEmail() {
        return $this->email;
    }

    function getPhoneNumber() {
        return $this->phoneNumber;
    }

    function getPassOne() {
        return $this->passOne;
    }

    function getPassTwo() {
        return $this->passTwo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFName($FName) {
        $this->FName = $FName;
    }

    function setMname($Mname) {
        $this->Mname = $Mname;
    }

    function setLname($Lname) {
        $this->Lname = $Lname;
    }

    function setAge($age) {
        $this->age = $age;
    }

    function setCountry($country) {
        $this->country = $country;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPhoneNumber($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }

    function setPassOne($passOne) {
        $this->passOne = $passOne;
    }

    function setPassTwo($passTwo) {
        $this->passTwo = $passTwo;
    }
    
    
    function getIsAdmin() {
        return $this->isAdmin;
    }

    function setIsAdmin($isAdmin) {
        $this->isAdmin = $isAdmin;
    }
    

    
    function __construct($id, $FName, $Mname, $Lname, $age, $country, $email, $phoneNumber, $passOne, $isAdmin, $image) {
        $this->id = $id;
        $this->FName = $FName;
        $this->Mname = $Mname;
        $this->Lname = $Lname;
        $this->age = $age;
        $this->country = $country;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->passOne = $passOne;
        $this->isAdmin = $isAdmin;
        $this->image = $image;
    }
    
    public function displayProfileInfo() {
        echo "ID : ".$this->id."<br/>";
        echo "First Name : ".$this->FName."<br/>";
        echo "Middle Name : ".$this->Mname."<br/>";
        echo "Last Name : ".$this->Lname."<br/>";
        echo "Your Age : ".$this->age."<br/>";
        echo "Your Country : ".$this->country."<br/>";
        echo "Your Email : ".$this->email."<br/>";
        echo "Your Phone Number : ".$this->phoneNumber."<br/>";
        echo "First Password : ".$this->passOne."<br/>";
        echo "Admin Status : ".$this->isAdmin ."<br/>";
        echo "<br/>";
    }
}
