<head>
    <title>FlyRight</title>

    <link rel="stylesheet" href="stylesheets/style.css"> 
    <link rel="stylesheet" href="stylesheets/fontawesome/css/fontawesome-all.css"> 

    <script src="javascript/jquery-3.3.1.min"></script>
    <script src="javascript/jquery.cookie.js"></script>
    <script>
        if (document.location.href.indexOf('MakeBooking') === -1 ) {
            $.removeCookie("selectedFlightID");
            $.removeCookie("selectedCarID");
            $.removeCookie("selectedHotelID");
        }
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>