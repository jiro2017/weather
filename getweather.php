<?php
    $error = false; //initially set the error message to false.
if(isset($_POST['city']) && !empty($_POST['city'])) {
    $lat_and_long = file_get_contents("http://api.openweathermap.org/geo/1.0/direct?q=$_POST[city]&limit=4&appid=1e4c1753170ff44df4a5b7b10c37a7e5");
    $lat_and_long = json_decode($lat_and_long, true); // convert the json recieved to PHP array
    $lat = $lat_and_long[0]['lat'];
    $lon = $lat_and_long[0]['lon'];

    if(isset($lat_and_long['cod']) && $lat_and_long['cod']>=400) { //if there was an error getting latitude and longitude of the city
        $error = true; //then set the error flag to true
        $error_message = $lat_and_long['message'];
    } else { //otherwise go ahead get the weather condition of the city
        $weather_info = file_get_contents("https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&units=metric&appid=1e4c1753170ff44df4a5b7b10c37a7e5");
        $weather_info = json_decode($weather_info, true); //convert the json recieved to PHP array
        var_dump($weather_info);
        if(isset($weather_info['cod']) && $weather_info['cod']>=400) {
            $error = true;
            $error_message = $weather_info['message'];
        }
        
    }
}
require_once("./components/header.php");
?>
<?php
if(isset($error_message)) { //if there is an error message then show it.
?>
<body>
    <form class="getweather" action="getweather.php" method="post">
        <p class="error show"><?php echo $weather_info['message']; ?></p>
        <h1 class="heading">Please Enter your city to see weather forecasts</h1>
        <input type="text" name="city" id="city_input" placeholder="Please enter the name of the city and country.">
        <p class="error">error</p>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
<?php
} else if($error == false && isset($weather_info)) { //if there is no error and the weather information is avaliable, then display it.
?>
<body>
    <form class="getweather" action="getweather.php" method="post">
        <h1 class="heading">Weather Information</h1>
        <p class="cityname"><b>City:</b> <?php echo $_POST['city'];?></p>
        <p class="current_temperature"><b>Current Temperature:</b> <?php echo $weather_info['main']['temp'];?></p>
        <p class="description"><b>Description:</b> <?php echo $weather_info['weather'][0]['description'];?></p>
    </form>
</body>
</html>
<?php } else {?>
    <body>
    <form class="getweather" action="getweather.php" method="post">
        <h1 class="heading">Please Enter your city to see weather forecasts</h1>
        <input type="text" name="city" id="city_input" placeholder="Please enter the name of the city and country.">
        <p class="error">error</p>
        <input type="submit" value="Submit">
    </form>
</body>
<?php } ?>