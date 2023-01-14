<?php

$city = $_GET['city'];

$url = "https://api.openweathermap.org/data/2.5/forecast?q=$city&appid=8a77dbf98e1ddd98fb166357e0ebacd7&units=metric";
$c;
$apiData = file_get_contents($url);
$cli = json_decode($apiData);
 if($cli->list[0]->main->temp < 10){
     $sin = "./images/polarW.jpg";
 }
 else if($cli->list[0]->main->temp > 20){
     $sin = "./images/moderate.jpg";
 }
 else{
     $sin = "./images/TropicalW.jpg";
 }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forcast- 5 Days <style></style></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    <div class="container" style="background-image:url(<?php echo $sin ?>)">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 feature">
                <?php
                $j = 0;
                    for($i=0; $i< 40; $i=$i+8){
                        $j++;
                        echo "Day ".($j).": ". $cli->list[$i]->dt_txt;
                        echo "</br>";
                        echo "Temperature: ".$cli->list[$i]->main->temp. "&#8451;";
                        echo "</br>";
                        echo "Maximum Temperature: ".$cli->list[$i]->main->temp_max. "&#8451;";
                        echo "</br>";
                        echo "Minimum Temperature: ".$cli->list[$i]->main->temp_min. "&#8451;";
                        echo "</br>";
                        echo "Wind Speed: ".$cli->list[$i]->wind->speed;
                        echo "</br>";
                        echo "Wind Degree: ".$cli->list[$i]->wind->deg;
                        echo "</br>";
                        echo "Pressure: ".$cli->list[$i]->main->pressure;
                        echo "</br>";
                        echo "Humidity: ".$cli->list[$i]->main->humidity;
                        echo "<hr>";                      
                    }
                ?>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-6">
                <a class="btn btn-primary" href="index.html" role="button">Back</a>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>