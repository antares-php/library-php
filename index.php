<?php

include('antares-php.php');
$antares = new antares_php();
$antares->set_key('520906366fdba82e:d4fca3e60014c303');

//$yourdata = '{"Sensor1":"coba1","Sensor2":"coba2"}';
//$antares->send($yourdata,'nyoba', 'aww');  

//$antares->appCreate('NyobaDeui');
//$antares->deviceCreate('asw','aww');
//$antares->appDelete('ntap');
//$antares->deviceDelete('asw','aww');
//$yourdata = $antares->get('nyoba', 'aww');
$yourall = $antares->get_all('nyoba', 'aww');
$dscAllDevice = $antares->dscAllDevice('aww');
$dscAllApp = $antares->dscAllApp('johanantoniussalim@gmail.com');

if(array_key_exists('limit', $_POST)) { 
  $limit = $_POST["limit"];
  $yourlimit = $antares->get_limit($limit,'nyoba','aww');
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

      </div>
    </div>  
  </body> 
</html>