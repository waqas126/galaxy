<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Assigment</title>
</head>

<body>
<h1>Q4 </h1>
<form method="post" action="">
<table border="1" width="30%">
  <tr>
    <td align="center" colspan="2"><p><b>Pizza Shop 2.0</b></p></td>
  </tr>
  <tr>
    <td>Name</td>
    <td><input type="text" name="name" required/></td>
  </tr>
  <tr>
    <td>Pizza Shopping</td>
    <td><input type="radio" name="pizza_type" value="Supreme" required />
      Supreme <br/>
      <input type="radio" name="pizza_type" value="Vegetrian" required/>
      Vegetrian <br/>
      <input type="radio" name="pizza_type" value="Hawaiian" required />
      Hawaiian <br/></td>
  </tr>
  <tr>
    <td>Pizza Sauce</td>
    <td><select name="sauce" required>
        <option value="Tomato">Tomato</option>
        <option value="Tomato 1">Tomato 1</option>
        <option value="Tomato 2">Tomato 2</option>
      </select></td>
  </tr>
  <tr>
    <td>Optional Extra</td>
    <td><input type="checkbox" name="extra_cheese" value="Extra Cheese" />
      Extra Cheese
      <input type="checkbox" name="gfb" value="Glunten Free Base" />
      Glunten Free Base </td>
  </tr>
  <tr>
    <td colspan="2">Delivery Instructions<br/>
      <textarea rows="5" cols="60" name="instructions" required> </textarea></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="submit" value="Sibmit my Order" /></td>
  </tr>
</table>
</form>
</body>
</html>

<?php 
if(isset($_POST["submit"])){
	
	$name = $_POST["name"];
	$type = $_POST["pizza_type"];
	$sauce = $_POST["sauce"];
	$extra_cheese = "";
	if(isset($_POST["extra_cheese"])){
	$extra_cheese = $_POST["extra_cheese"];
	} else {
		$extra_cheese= "";
	}
	if(isset($_POST["gfb"])){
	$gfb = $_POST["gfb"];
	} else {
		
		$gfb= "";
	}
	
	$instructions = $_POST["instructions"];
	
	$con = new mysqli("localhost","root","","assigment");
	$query = "INSERT INTO `order`(`name`, `pizza`, `sauce`, `extra_cheese`, `gfb`, `instructions`) VALUES ('$name','$type','$sauce','$extra_cheese','$gfb','$instructions')";
	$run = $con->query($query);
	
	if($run){
		echo "Order Successfully Submitted";
	} else {
		echo "Unable to Place ORder";
	}
	}

?>
