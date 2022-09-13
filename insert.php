<?php
$servername = "sql105.epizy.com";
$username = "epiz_32443834";
$password = "Et2TIaERtys1xI";
$dbname = "epiz_32443834_product_list";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sku =  $_REQUEST['sku'];
$name = $_REQUEST['name'];
$price = $_REQUEST['price'];
$type =  $_REQUEST['type'];
$dvd = $_REQUEST['dvd'];
$furniture = $_REQUEST['furniture'];
$book = $_REQUEST['book'];
$size = $_REQUEST['size'];
$weight = $_REQUEST['weight'];
$height = $_REQUEST['length'];
$width = $_REQUEST['width'];
$length = $_REQUEST['length'];

$sql = "INSERT INTO product_list (sku, name, price, type, dvd, furniture, book, size, weight, height, width,length)
  VALUES ('$sku', '$name', '$price', '$type',' $dvd', '$furniture', '$book','$size', '$weight',' $height',' $width','$length')";
// $sql = "INSERT INTO product_list VALUES ($sku, $name, $price, $type, $dvd, $furniture, $book, $size, $weight, $height, $width,$length)";

if ($conn->query($sql) === TRUE) {
  header("Location: addproduct.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>