<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormValidations
 *
 * @author Bryan
 */
class FormValidations {
    function validateCreateUserForm() { //////////////////////////////////////////////////////////////////////////////////////////////////// Admin side create user form validation
        if (isset($_GET['btnCreateUser'])) {
                //$dhObject->createNewUser($fname, $mname, $lname, $age, $country, $email, $phone, $pass);
                $name = trim(filter_var($_GET['firstname']));
                if (empty($name)) {
                    echo "Name is required... <br/>";
                }
                else
                {
                    if (ctype_alpha($name)) {
                        echo "Name : ".$name."<br/>";
                    }
                    else
                    {
                        echo 'Name may only contain alphabetic characters... <br/>';
                    }
                }
                $mname = trim(filter_var($_GET['middlename']));
                if (empty($mname)) {
                    echo "Middle Name is required... <br/>";
                }
                else
                {
                    if (ctype_alpha($name)) {
                        echo "Middle Name : ".$mname."<br/>";
                    }
                    else
                    {
                        echo 'Middle Name may only contain alphabetic characters... <br/>';
                    }
                }
                $lname = trim(filter_var($_GET['lastname']));
                if (empty($lname)) {
                    echo "Last Name is required... <br/>";
                }
                else
                {
                    if (ctype_alpha($lname)) {
                        echo "Last Name : ".$lname."<br/>";
                    }
                    else
                    {
                        echo 'Last Name may only contain alphabetic characters... <br/>';
                    }
                }
                $userage = filter_var($_GET['Age']);
                if($userage == "-Select Age-")
                {
                    echo "Please enter a valid age...<br/>";
                }
                else
                {
                    echo "Age : ".$userage."<br/>";
                }
                
                $usercountry = trim(filter_var($_GET['country']));
                if ($usercountry == "-Select Country-") {
                    echo "Please select valid country...<br/>";
                }
                else
                {
                    echo "Country : ".$usercountry."<br/>";
                }
                    
                $userEmail = trim(filter_var($_GET['email']));
                if (empty($userEmail)) {
                    echo "Please enter a valid email...<br/>";
                }
                else
                {
                    echo "Email : ".$userEmail."<br/>";
                }
                
                $userPhoneNumber = filter_var($_GET['phone']);
                if (empty($userPhoneNumber)) {
                    echo "Phone Number is required...<br/";
                }
                else
                {
                    if (ctype_digit($userPhoneNumber)) {
                        echo "Phone Number : ".$userPhoneNumber."<br/>";
                    }
                    else
                    {
                        echo "Phone number may only contain numerical characters...<br/>";
                    }
                }
                
                $userPassOne = trim(filter_var($_GET['passwordOne']));
                if (empty($userPassOne)) {
                    echo "Password is required...<br/>";
                }
                else
                {
                    echo "Password : ".$userPassOne."<br/><br/><br/>";
                }
                         
                $userObj = new User($name, $mname, $lname, $userage, $usercountry, $userEmail, $userPhoneNumber, $userPassOne, NULL);
                
                $dhObject = new DataHandler("localhost", "root", "", "fly_right_db");
                $dhObject->ConnectToDB();
                $dhObject->createNewUser($name, $mname, $lname, $userage, $usercountry, $userEmail, $userPhoneNumber, $userPassOne);
                
                $userObj->displayProfileInfo();
                
            }
    }
    
    function validateCreateFlightForm() {
                            
        if (isset($_GET['btnCreateFlight'])) {

            $flightName = trim(filter_var($_GET['flightName']));
            if (empty($flightName)) {
                echo "Please enter a valid flight name...<br/>";
            }
            else
            {
                if (ctype_alnum($flightName)) {
                    echo "Flight Name : ".$flightName."<br/>";
                }
                else
                {
                    echo "Flight Name may contain alphabetic and numeric characters...<br/>";
                }
            }
            $departDate = filter_var($_GET['departDate']);
            if (date($departDate)) {
                echo "Departure Date : ".$departDate."<br/>";
            }
            else
            {
                echo "Departure date is required...<br/>";
            }
            $returnDate = filter_var($_GET['returnDate']);
            if (date($returnDate)) {
                echo "Rerturn Date : ".$returnDate."<br/>";
            }
            else
            {
                echo "Return date is required...<br/>";
            }

            $departDestination = trim(filter_var($_GET['destinationTo']));
            if($departDestination == "Select Flight Destination")
            {
                echo "Select a valid departing destination...<br/>";
            }
            else{
                echo "Departing destination : ".$departDestination."<br/>";
            }
            $ariveDestination = trim(filter_var($_GET['destinationFrom']));
            if($ariveDestination == "Select Flight Destination")
            {
                echo "Select a valid arival destination...<br/>";
            }
            else{
                echo "Arival destination : ".$ariveDestination."<br/>";
            }

            $flightPrice = trim(filter_var($_GET['frlightPrice']));
            if (empty($flightPrice)) {
                echo "Flight Price is required...<br/><br/><br/>";
            }
            else
            {
                echo "Flight Price : R ".$flightPrice."<br/>";
            }
            
            $flightObj = new FlightClass($flightName, $departDate, $returnDate, $ariveDestination, $departDestination, $flightPrice);
            $dhObject = new DataHandler("localhost", "root", "", "fly_right_db");
            $dhObject->ConnectToDB();
            $dhObject->createNewFlight($flightName, $departDate, $returnDate, $ariveDestination, $departDestination, $flightPrice);

            $flightObj->displayFlightInfo();
            
            
            var_dump($flightObj);
        }
    }
}
