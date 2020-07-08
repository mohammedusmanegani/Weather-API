<?php
$city = $_POST['city'];
$country = "," . $_POST['country'];
$api_key = "9bb3595ea8a97029639704c7d9ce56a0"; //Please Use Your API KEY
$apiURL = "https://api.openweathermap.org/data/2.5/weather?q=" . $city . $country . "&appid=" . $api_key;
$data = file_get_contents($apiURL);
$data = json_decode($data);
$tempInFarenheit = $data->main->temp;
$tempInCelcius = ($tempInFarenheit - 32) / 1.8;
$tempInCelcius = number_format((float) $tempInCelcius, 2, '.', '');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather API</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="form-container">
        <form action="weather.php" method="POST">
            <select name="country" class="countries" id="countryId" required>
                <option value="">Select Country</option>
            </select>
            <select name="state" class="states" id="stateId" required>
                <option value="">Select State</option>
            </select>
            <select name="city" class="cities" id="cityId" required>
                <option value="">Select City</option>
            </select>
            <button type="submit">Check</button>
        </form>
    </div>

    <div class="weather-container">
        <img class="icon" src="<?php echo "https://openweathermap.org/img/w/" . $data->weather[0]->icon . ".png"; ?>">
        <p class="weather">Weather: <?php echo $data->weather[0]->main; ?></p>
        <p class="temp">Temperature in farenheit: <?php echo $data->main->temp; ?></p>
        <p class="tempInCelsius">Temperature in celcius: <?php echo $tempInCelcius; ?></p>
        <p class="weatherdescription">Weather Description: <?php echo $data->weather[0]->description; ?></p>
        <p class="cityName">City: <?php echo $data->name; ?></p>
    </div>


    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/countrystatecity.js"></script>
</body>

</html>