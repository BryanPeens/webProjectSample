<?php include_once 'HeaderLogic.php'; ?>

<?php
//$handlerObj = new DataHandler("localhost", "root", "", "fly_right_db");
//$handlerObj->ConnectToDB();
//$returned = $handlerObj->getAllAirlines();
//$returned = $handlerObj->getAllFlights();
//$returned = $handlerObj->getAllAirports();
//$returned = DataHandler::getAllAirports();
//$returned = DataHandler::getAllFlights();
//fromAirport
//$returned = filterArrayContains($returned, 'fromAirport', 'tambo');
//var_dump($returned);
//$returned = flattenArray($returned, 'fromAirport');
//var_dump($returned);
?>

<!DOCTYPE html>
<!--
http://localhost/Bryan_Peens/Project/index.php
-->

<html>
    <?php include 'SectionHeader.php'; ?>

    <body>
        <section class="topBar">
            <?php include 'MainImageSection.php'; ?>
        </section>

        <section class="main_Wrap">
            <?php include 'SectionTop.php'; ?>
            <br/>                      
            <?php include 'SectionMiddle.php'; ?>   
            <br/>
            <br/>
            <?php include 'mapSection.php'; ?>
            <br/>
            <br/>
            <?php include 'SectionFooter.php'; ?>
            <br/>      
    </body> 
</html>