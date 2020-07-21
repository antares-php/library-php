<?php

include('antares-php.php');
$antares = new antares_php();
$antares->set_key('10f9b36c4320a16e:57cdfceb69b0bfdc');

$datetime = $_POST["datetime"];
//$yourdata = '{"Sensor1":"coba1","Sensor2":"coba2"}';
//$antares->send($yourdata,'nyoba', 'aww');  

//$antares->appCreate('NyobaDeui');
//$antares->deviceCreate('nyoba','aww');
//$antares->appDelete('ntap');
//$antares->deviceDelete('nyoba','aww');
//$yourdata = $antares->get('nyoba', 'aww');
//$yourall = $antares->get_all('nyoba', 'aww');
//$dscAllDataID = $antares->dscAllDataID('nyoba','aww');
//$dscAllDevice = $antares->dscAllDevice('aww');
//$dscAllApp = $antares->dscAllApp('johanantoniussalim@gmail.com');
//$dscAllSubDevice = $antares->dscAllSubDevice('nyoba','aww');
//$dscAllSubApp = $antares->dscAllSubApp('aww');
//$dscAllDataIDTime = $antares->dscAllDataIDTime($datetime,'newSensor3','mns');

if(array_key_exists('limit', $_POST)) { 
  $limit = $_POST["limit"];
  $yourlimit = $antares->get_limit($limit,'nyoba','aww');
}
else if (array_key_exists('limit2', $_POST)) { 
  $limit2 = $_POST["limit2"];
  $dscAllDataIDLimit = $antares->dscAllDataIDLimit($limit2,'nyoba','aww');
}

else if (array_key_exists('datetime', $POST)) {
  $datetime = $_POST["datetime"];
  $dscAllDataIDTime = $antares->dscAlldataIDTime($datetime,'newSensor3','mns');
  var_dump($dscAllDataIDTime);
  die();
}
?>

<!DOCTYPE html> 
<html lang="en"> 
  <head> 
    <title>Antares GET/POST</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
    .container {
      padding-top:100px;
    }
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      padding: 8px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }
    h1 {
      text-align: center;
    }
    input { 
      text-align: center; 
    }
    </style>
  </head> 
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>Discover All Application Antares</h1>
          <table>
            <tr>
              <th>Application</th>
            </tr>
            <?php
              foreach ($dscAllApp as $key => $value) {
            ?>
            <tr>
                <td>
                  <?php
                    echo $value
                  ?>
                </td>
            </tr>
            <?php
              }
            ?>
            </td>
          </table>
        </div>
        <div class="col-md-6">
          <h1>Discover All Device Antares</h1>
          <table>
            <tr>
              <th>Application</th>
              <th>Device</th>
            </tr>
            <?php
              foreach ($dscAllDevice as $key => $value) {
            ?>
            <tr>
                <td>
                  <?php
                    $test = explode ('/',$value);
                    echo $test[3]
                  ?>
                </td>
                <td>
                  <?php
                    $test = explode ('/',$value);
                    echo $test[4]
                  ?>
                </td>
            </tr>
            <?php
              }
            ?>
            </td>
          </table>
        </div>
        <div class="col-md-6">
          <h1>Discover All ID Data on devices</h1>
          <table>
            <tr>
              <th>Data ID</th>
            </tr>
            <?php
              foreach ($dscAllDataID as $key => $value) {
            ?>
            <tr>
                <td>
                  <?php
                    echo $value
                  ?>
                </td>
            </tr>
            <?php
              }
            ?>
            </td>
          </table>
        </div>
        <div class="col-md-6">
          <h1>Discover All Subscribers on application</h1>
          <table>
            <tr>
              <th>Subsrcibers</th>
            </tr>
            <?php
              foreach ($dscAllSubApp as $key => $value) {
            ?>
            <tr>
                <td>
                  <?php
                    echo $value
                  ?>
                </td>
            </tr>
            <?php
              }
            ?>
            </td>
          </table>
        </div>
        <div class="col-md-6">
          <h1>Discover All Subscribers on devices</h1>
          <table>
            <tr>
              <th>Subsrcibers</th>
            </tr>
            <?php
              foreach ($dscAllSubDevice as $key => $value) {
            ?>
            <tr>
                <td>
                  <?php
                    echo $value
                  ?>
                </td>
            </tr>
            <?php
              }
            ?>
            </td>
          </table>
        </div>
        <div class="col-md-6">
          <h1>Discover All ID Data on devices with Limit</h1>
          <table>
            <form method="post">
              <tr>
                <th>LIMIT : </th>
                <th>
                  <input type="text" id="limit2" name="limit2" value=0><br>
                </th>
                <th> 
                  <input type="submit" name="button1" class="button" value="GET Limit" />  
                </th>
              </tr>
            </form> 
          </table>
              <table>
            <tr>  
              <th>Data ID</th>
            </tr>
            <?php
              foreach ($dscAllDataIDLimit as $key => $value) {
            ?>
            <tr>
              <td>
                <?php
                  echo $value 
                ?>
              </td>
            </tr>
            <?php
              }
            ?>
          </table>
        </div>
        
        <div class="col-md-6">
          <h1>GET ALL Data Antares</h1>
          <table>
            <tr>
              <th>Label</th>
              <th>Value</th>
            </tr>
            <?php
              foreach ($yourall as $key => $value) {
            ?>
            <tr>
                <td>
                  <?php
                    echo $value["Sensor1"]
                  ?>
                </td>
                <td>
                  <?php
                    echo $value["Sensor2"] 
                  ?>
                </td>
            </tr>
            <?php
              }
            ?>
            </td>
          </table>
        </div>

        <div class="col-md-6">
          <h1>GET Data Antares with limit</h1>
          <table>
            <form method="post">
              <tr>
                <th>LIMIT : </th>
                <th>
                  <input type="text" id="limit" name="limit" value=0><br>
                </th>
                <th> 
                  <input type="submit" name="button1" class="button" value="GET Limit" />  
                </th>
              </tr>
            </form> 
          </table>
          <br><br>
          <h1>RESULT</h1>
          <table>
            <tr>  
              <th>Label</th>
              <th>Value</th>
            </tr>
            <?php
              foreach ($yourlimit as $key => $value) {
            ?>
            <tr>
              <td>
                <?php
                  echo $value["Sensor1"]  
                ?>
              </td>
              <td>
                <?php
                  echo $value["Sensor2"]
                ?>
              </td>
            </tr>
            <?php
              }
            ?>
          </table>
        </div>
        <div class="col-md-6">
          <h1>GET Data Antares in Particular Time</h1>
          <table>
            <form method="post">
              <tr>
                <th>Date Time : </th>
                <th>
                  <input type="datetime-local" id="datetime" name="datetime" value="Year-Month-DayTHour:Minute"><br>
                </th>
                <th> 
                  <input type="submit" name="button1" class="button" value="Set Particular Time" />  
                </th>
              </tr>
            </form> 
          </table>
          <br><br>
          <h1>RESULT</h1>
          <table>
            <tr>  
              <th>Label</th>
            </tr>
            <?php
              foreach ($dscAllDataIDTime as $key => $value) {
            ?>
            <tr>
              <td>
                <?php
                  echo $value  
                ?>
              </td>
            </tr>
            <?php
              }
            ?>
          </table>
        </div>

      </div>
    </div>  
  </body> 
</html>