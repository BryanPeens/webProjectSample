<ol class="middleDisplay">

    <li>        
        <section class="content_body">        
            <div class="sliderContent">
                <article>
                    <a href="#">   
                        <img src="media/flyStuff/reef-featured.jpg">
                    </a>
                </article>
                <article>
                    <a href="#">   
                        <img src="media/flyStuff/Hike-Canada.jpg">
                    </a>
                </article>
                <article>
                    <a href="#">   
                        <img src="media/flyStuff/Northern-Lights-Canada.jpg">
                    </a>    
                </article>
                <article>
                    <a href="#">    
                        <img src="media/flyStuff/Thailand.jpg">
                    </a>
                </article>    
                <article>
                    <a href="#">   
                        <img src="media/flyStuff/reef-featured.jpg">
                    </a>
                </article>
            </div>

            <div class="sliderContent">
                <article>
                    <a href="#">     
                        <img src="media/flyStuff/Railay-Featured.jpg">
                    </a>
                </article>
                <article>
                    <a href="#">     
                        <img src="media/flyStuff/Last-bar-fire-show.jpg">
                    </a>
                </article>
                <article>
                    <a href="#">      
                        <img src="media/flyStuff/EifelTower.jpg">>
                    </a>
                </article>
                <article>
                    <a href="#">      
                        <img src="media/flyStuff/corona.jpg">
                    </a>
                </article>
                <article>
                    <a href="#">   
                        <img src="media/flyStuff/reef-featured.jpg">
                    </a>
                </article>                
            </div>

            <div class="sliderContent">
                <article>
                    <a href="#">     
                        <img src="media/flyStuff/BurjKalifa.jpg">
                    </a>
                </article>
                <article>
                    <a href="#">     
                        <img src="media/flyStuff/lion.jpg">
                    </a>
                </article>
                <article>
                    <a href="#">      
                        <img src="media/flyStuff/cape_point.jpg">
                    </a>
                </article>
                <article>
                    <a href="#">      
                        <img src="media/flyStuff/TheLouvre.jpg">
                    </a>
                </article>
                <article>
                    <a href="#">   
                        <img src="media/flyStuff/reef-featured.jpg">
                    </a>
                </article>                
            </div>
        </section>        
        <div class="sliderButtons">   
            <button onclick="plusDivs(-1)">&#10094;</button>
            <button onclick="plusDivs(1)">&#10095;</button>
        </div> 
    </li>

    <li id="makeBlock">
        <?php
        $host = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

        if ($host == 'localhost/Bryan_Peens/Project/index.php') {
            include './indexSection.php';
        } elseif ($host == 'localhost/Bryan_Peens/Project/BookingsPage.php') {
            include './BookingsSection.php';
        } elseif ($host == 'localhost/Bryan_Peens/Project/ContactUsPage.php') {
            include 'contactUsSection.php';
        } elseif ($host == 'localhost/Bryan_Peens/Project/AboutUsPage.php') {
            include 'AboutUsSection.php';
        } elseif ($host == 'localhost/Bryan_Peens/Project/LoginPage.php') {
            include 'LoginSection.php';
        } elseif ($host == 'localhost/Bryan_Peens/Project/RegisterPage.php') {
            include 'RegisterSection.php';
        } elseif ($host == 'localhost/Bryan_Peens/Project/AdminPage.php') {
            include './AdminSection.php';
        } elseif ($host == 'localhost/Bryan_Peens/Project/FlightManagementPage.php') {
            include './FlightManagementSection.php';
            
        } 
        elseif (strpos(strtolower($host), strtolower('localhost/Bryan_Peens/Project/UserManagementPage.php')) !== FALSE) {
            
            include './UserManagementSection.php';
        } 
        elseif ($host == 'localhost/Bryan_Peens/Project/AboutUsPage.php') {
            include './AboutUsSection.php';
        } elseif ($host == 'localhost/Bryan_Peens/Project/BookCarPage.php') {
            include './BookCarSection.php';
        } elseif ($host == 'localhost/Bryan_Peens/Project/CarManagementPage.php') {
            include './CarManagementSection.php';
        } elseif ($host == 'localhost/Bryan_Peens/Project/HotelManagementPage.php') {
            include './HotelManagementSection.php';
        } elseif ($host == 'localhost/Bryan_Peens/Project/BookingInstructionsPage.php') {
            include './BookingInstructionsSection.php';
        } elseif (strpos(strtolower($host), strtolower('localhost/Bryan_Peens/Project/MakeBookingsPage.php')) !== FALSE) {
            include './MakeBookingsSection.php';
        } elseif (strpos(strtolower($host), strtolower('localhost/Bryan_Peens/Project/ProfilePage.php')) !== FALSE) {
            include './ProfileSection.php';
        } elseif (strpos(strtolower($host), strtolower('localhost/Bryan_Peens/Project/ReviewBookingsPage.php')) !== FALSE) {
            include './ReviewBookingsSection.php';
        } elseif ($host == 'localhost/Bryan_Peens/Project/MyBookingsPage.php') {
            include './MyBookingsSection.php';           
        } elseif ($host == 'localhost/Bryan_Peens/Project/BookingsManagementPage.php') {
            include 'BookingsManagementSection.php';           
        }
        ?>
    </li>

    <br>
</ol>

<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("sliderContent");
        if (n > x.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = x.length
        }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex - 1].style.display = "block";
    }
</script>