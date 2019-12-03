<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" type="text/css" href="CSS/main.css" />
    <link
      rel="stylesheet"
      href="//fonts.googleapis.com/css?family=Raleway:400,700,900"
    />
    <title>Weather App</title>
  </head>

  <body>
    <form method="post" action="index.php">
    How is the weather in: 
    <input type="text" name="cityName">
    <input type="submit" value="Search" name="submit"> <!-- assign a name for the button -->
    </form>

    <?php
    // Define the variable cityName from html so it can be used in php
    $city = $_POST ["cityName"];
    $api_url = "https://api.openweathermap.org/data/2.5/forecast?q=$city&units=metric&appid=2118afe2ed56240f86bbd108daffe6b8";
    
    // result after clicking the button
    if(isset($_POST['submit'])) {
        // Read JSON file and fetch the current weather data in the cities
        $json_data = file_get_contents($api_url);
        //echo $json_data;
        // Decodes a JSON string into PHP array (parse)
        $city_data = json_decode($json_data);
        $city_list = count($city_data->list);

        // for loop to get the forecast 5 times
        for ($i = 0 ; $i < $city_list; $i++) {
            $city_time = explode(" ", $city_data->list[$i]->dt_txt) ;
            if ($city_time[1] == '15:00:00') {
            echo '<div class="container">';
            echo '<div>';
                // shows the city and the country
                echo '<h1>', $city_data->city->name, ' (', $city_data->city->country, ')</h1>';

                // shows the date
                echo '<h1>', $city_data->list[$i]->dt_txt , '</h1>';

                // general information about the weather
                echo '<h2>Temperature</h2>';
                echo '<p><strong>Current:</strong> ', $city_data->list[$i]->main->temp, '&deg; C</p>';
                echo '<p><strong>Minimum:</strong> ', $city_data->list[$i]->main->temp_min, '&deg; C</p>';
                echo '<p><strong>Maximum:</strong> ', $city_data->list[$i]->main->temp_max, '&deg; C</p>';

                // something about the air
                echo '<h2>Air</h2>';
                echo '<p><strong>Humidity:</strong> ', $city_data->list[$i]->main->humidity, '%</p>';
                echo '<p><strong>Pressure:</strong> ', $city_data->list[$i]->main->pressure, ' hPa</p>';

                // some info about the wind
                echo '<h2>Wind</h2>';
                echo '<p><strong>Speed:</strong> ', $city_data->list[$i]->wind->speed, ' m/s</p>';
                echo '<p><strong>Orientation:</strong> ', $city_data->list[$i]->wind->deg, '&deg;</p>';

                // how is the weather according to the API (an array)
                echo '<h2>The weather</h2>';
                echo '<p><strong>Weather description:</strong> ', $city_data->list[$i]->weather[0]->description, '</p>';
            echo '</div>';
            echo '</div>';
        }
    }
    }
    ?>

    <div class="credits__container">
      <p class="credits__text">@BeCode by Tabitha, 2019</p>
    </div>

  </body>
</html>