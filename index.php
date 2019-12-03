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
    <title>Document</title>
  </head>
  <body>
    <label for="site-search">How is the weather in:</label>
    <input type="search" id="location-search" name="city" placeholder="Location">
    <button>Search</button>


      <?php
      $api_url = "https://api.openweathermap.org/data/2.5/weather?q=ghent&units=metric&appid=2118afe2ed56240f86bbd108daffe6b8";
  
      // Read JSON file and fetch data
      $json_data = file_get_contents($api_url);
      echo $json_data;

      // Decodes a JSON string into PHP array
      $city_data = json_decode($json_data, true);
      echo $city_data;
      print_r($city_data);

      ?>

    <div class="credits__container">
      <p class="credits__text">@BeCode by Tabitha, 2019</p>
    </div>
  </body>
</html>