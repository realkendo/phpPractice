<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <title>Document</title>
</head>

<body>

    <!--  using HTML to insert operations in html -->
    <h1>
      <?php
        echo (3 + 2)*6;
      ?>
    </h1>

    <!-- using PHP to work with string variables -->
    <h4>
      <?php
        $message = "my string";
        echo "This is  $message";
      ?>
    </h4>  
    
  <?php
    // // setting constants 
    define('Pi',3.142);
    echo 'This is a constant, Pi - ' . Pi. "<br>";

    // // arrays in php
    // echo "arrays in php";
    $myArray = ["John", 23, 3.2, True, 'B. Eng'];
    print_r($myArray); 

    // associative arrays
    $assArray = [
      "name" => "kendo",
      "website" => "https://k3nd0.com",
      "age" => 25,
      "CGPA" => 3.4,
      "isBroke" => FALSE 
    ];

    echo " <br>(1) My name is " .$assArray['name']. " visit my site at " .$assArray['website']. " i am " .$assArray['age']. "yrs old my CGPA is " .$assArray['CGPA']. " i got " .$assArray['isBroke']. " worries <br>";

    // loops
    // for loop
    echo "<br />";
    echo "<b>(2) FOR LOOP</b> <br />";
    for($i = 0; $i <= 10; $i++){
      if($i % 2 == 0){
        echo $i. " is an even number <br>";
      }else{
        echo $i. " is an odd number <br>";
      }
    }


    // while loop
    echo "<br> <b>(3) WHILE LOOP</b> <br>";
    $num = 0;
    while($num <= 10){
      echo "This is line $num <br />";
      $num++;
    }

    
    // foreach loop
    echo "<br> <b>(4) FOREACH LOOP </b> <br>";

    foreach($assArray as $key => $val){ // as $key => syntax can be removed if the value is the only interest 
      echo "$key is $val <br />";
    }

    // multidimensional arrays
    echo "<br> <b>(5) MULTIDIMENSIONAL ARRAYS</b>";

    $westPlayers = [
      "name" => "Curry",
      "team" => "GSW",
      "number" => 30,
      "position" => "Guard",
      "isAllStar" => TRUE,
      "age" => 35
    ];

    $eastPlayers = [
      "name" => "Tatum",
      "team" => "BOS",
      "number" => 0,
      "position" => "Forward",
      "isAllStar" => TRUE,
      "age" => 27
    ];

    $nbaPlayers = [ $eastPlayers, $westPlayers];

    foreach($nbaPlayers as $player){
      //conditional statements (if-else) 
      if ($player['age'] > 28 ){
        echo $player['name'] . " is getting old <br />";
      }else{
        echo $player['name'] . " is still young <br />";
      }
    }

    // switch cases
    echo " <br/> <b>(6) SWITCH STATEMENTS</b>";

    $uefa = "EU";

    switch($uefa){
      case 'EU':
        echo "$uefa is European Union";
        break;
      case 'NATO':
        echo "Welcome to $uefa";
        break;
      case "ECOWAS":
        echo "Welcome to $uefa";
        break;
      default:
        echo "No match for $uefa";
        break;
    }


    echo " <br/> <b>(7) FUNCTIONS</b>"

    

?>


<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
</body>
</html>