<div> 
    <div class="container"> 
        <div class="containerOrange" style="width: auto;">
            <div style="font-size: 23px">Bookings</div> 
        </div><br/>  
        <?php
        foreach ($allBookings as $booking) {

            echo "<h3>Booking</h3>";

            foreach ($booking as $key => $element) {

                if ($key == "id") {
                    $bookid = $element;
                } elseif ($key == "canceled") {
                    if (empty($element)) {
                        
                        $isCanceled = false;
                        
                        echo "<span style='color:green;'>";
                        echo "$key => No </span><br/>";
                    } else {
                        
                        $isCanceled = true;
                        
                        echo "<span style='color:red;'>";
                        echo "$key => Yes </span><br/>";
                    }
                } elseif (empty($element)) {
                    
                } else {

                    echo "$key => $element<br/>";
                }
            }
            echo "<br/>";

            if (!$isCanceled) {
                
                echo "<a href='CancelPage.php?bookingid=$bookid' class='button'>Cancel Booking</a><br/>";
            }
            echo "<div class='padded'></div>";
        }
        ?>
    </div>
</div><br/>
