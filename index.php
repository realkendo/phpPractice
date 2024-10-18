<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

    <!-- //  using HTML to insert operations in html  -->
    <h1>
      <?php
        echo 4 + 5;
      ?>
    </h1>

    <!-- // using PHP to work with strings -->
    <h4>
      <?php
        $message = "my string";
        echo "This is  $message";
      ?>
    </h4>  
    
    <?php
      // setting constants 
      define('Pi',3.142);
      echo 'This is a constant, Pi' . Pi;
    ?>

</body>
</html>