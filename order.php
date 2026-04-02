<?php

$conn = mysqli_connect("localhost","root","","mywebsite");

$product = $_POST['name'];
$price = $_POST['price'];
$customer = $_POST['customer_name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$quantity = $_POST['quantity'];

$total = $price * $quantity;

$query = "INSERT INTO orders (product_name, price, customer_name, phone, address, quantity)
VALUES ('$product','$price','$customer','$phone','$address','$quantity')";

mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="order.css">
</head>
<body>

<div class="box">

<h2>Order Placed Successfully!</h2>

<p>Product: <?php echo $product; ?></p>
<p>Total: ₹<?php echo $total; ?></p>
<p>Name: <?php echo $customer; ?></p>

</div>

</body>
</html>