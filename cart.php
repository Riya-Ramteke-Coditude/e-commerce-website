<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>

    <link rel="stylesheet" href="cart.css">
</head>

<body>

<?php
session_start();

// DB connection
$conn = mysqli_connect("localhost","root","","mywebsite");

if(!$conn){
    die("Connection failed");
}

// Add to cart
if(isset($_POST['add_to_cart'])){

    $name = $_POST['name'];
    $image = $_POST['image'];
    $price = $_POST['price'];

    $query = "INSERT INTO cart (name, image, price)
              VALUES ('$name', '$image', '$price')";

    mysqli_query($conn, $query);

    header("Location: cart.php");
    exit();
}
?>

<h2 style="text-align:center;">Your Cart</h2>

<!-- ✅ container OUTSIDE loop -->
<div class="cart-container">

<?php
$query = "SELECT * FROM cart";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){

    while($item = mysqli_fetch_assoc($result)){
?>

    <div class="cart-item">
        <img src="<?php echo $item['image']; ?>">
        <h3><?php echo $item['name']; ?></h3>
        <p>₹<?php echo $item['price']; ?></p>
    </div>

<?php
    }

} else {
    echo "<p>Cart is empty</p>";
}
?>

</div>

</body>
</html>