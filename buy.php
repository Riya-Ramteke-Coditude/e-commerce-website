<?php
$name = $_POST['name'];
$price = $_POST['price'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Form</title>

    <link rel="stylesheet" href="buy.css">
</head>

<body>

<h2>Enter Your Details</h2>

<form action="order.php" method="POST">

    <input type="hidden" name="name" value="<?php echo $name; ?>">
    <input type="hidden" name="price" value="<?php echo $price; ?>">

    Name:
    <input type="text" name="customer_name" required>

    Phone Number:
    <input type="text" name="phone" required>

    Address:
    <textarea name="address" required></textarea>

    Quantity:
    <input type="number" name="quantity" value="1" min="1" required>

    <button type="submit">Place Order</button>

</form>

</body>
</html>