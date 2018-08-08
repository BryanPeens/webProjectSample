<div> 
    <div class="container"> 
        <div class="containerOrange" style="width: auto;">
            <div style="font-size: 23px">Bookings</div> 
        </div><br/>  
        <?php
        foreach ($allUserBookings as $booking) {

            echo "<h3>Booking</h3>";

            foreach ($booking as $key => $element) {

                if ($key == "id") {
                    $bookid = $element;
                } elseif ($key == "canceled") {
                    if (empty($element)) {

                        echo "<span style='color:green;'>";
                        echo "$key => No </span><br/>";
                    } else {


                        echo "<span style='color:red;'>";
                        echo "$key => Yes </span><br/>";
                    }
                } elseif (empty($element)) {
                    
                } else {

                    echo "$key => $element<br/>";
                }
            }
            echo "<br/>";


            echo "<a style='background-color:red;' href='DeletePage.php?id=$bookid&object=booking' class='button'>Delete Booking</a><br/>";
            echo "<div class='padded'></div>";
            
        }
        ?>
    </div>
</div><br/>