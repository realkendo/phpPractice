<!--SGV for get request  -->
<form method="GET">

    <label for="name">Name: </label>
    <input type="text" name="name">
    <br />

    <label for="age">Age: </label>
    <input type="number" name="age">
    <br />

    <button type="submit"> Submit </button>

  </form>

<?php

  if(isset($_GET['name'])){
    echo $_GET['name'] . " is " . $_GET['age'] . " years old";
  };
    
?>

<div>
  <br>
</div>


<!--SGV for post request  -->
<form method="POST">

<label for="name">Name: </label>
<input type="text" name="name">
<br />

<label for="age">Age: </label>
<input type="number" name="age">
<br />

<button type="submit"> Submit </button>

</form>

<?php

if(isset($_POST['name'])){
echo $_POST['name'] . " is " . $_POST['age'] . " years old";
};

?>
