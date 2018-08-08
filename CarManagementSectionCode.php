<?php

$carTypes = flattenArray(DataHandler::getAllCarTypes(), 'name');

if (isset($_POST['btnCreateCar'])) {

    $errors = array();

    $make = trim(filter_var($_POST['make']));
    if (empty($make)) {
        $errors['make'] = "Vehicle make is required <br />";
    }

    $model = trim(filter_var($_POST['model']));
    if (empty($model)) {
        $errors['model'] = "Vehicle model is required <br />";
    }

    $mileage = trim(filter_var($_POST['mileage']));
    if (empty($mileage)) {
        $errors['mileage'] = "Vehicle mileage is required <br />";
    }

    $color = trim(filter_var($_POST['color']));
    if (empty($color)) {
        $errors['color'] = "Vehicle color is required <br />";
    }

    $year = trim(filter_var($_POST['year']));
    if (empty($year)) {
        $errors['year'] = "Vehicle manufactured year is required <br />";
    }

    $typeId = trim(filter_var($_POST['type']));
    if (empty($typeId)) {
        $errors['typeId'] = "Vehicle manufactured year is required <br />";
    }

    echo "<section style='text-align:center;'>";
    
    
    if (count($errors) != 0) {

        echo "<h3>Please correct the indicated fields </h3>";
        foreach ($errors as $error) {
            echo "<span style = 'color:red'>$error</span>";
        }
    } else {

        $fkType = flattenArray(DataHandler::findTypeId($typeId),'id');        
        if (!empty($fkType)) {
             $typeId = $fkType[0];
        }
        else
        {
             $typeId = 1;
        }
        
        $result = DataHandler::createNewCar($make, $model, $mileage, $color, $year, $typeId);

        if ($result) {
            header('Location:' . 'CarManagementPage.php');
            die();
        }
    }
    echo "</section>";
}