<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neckbands</title>
    
</head>

<body>

<?php include 'header.php'; ?>
<link rel="stylesheet" href="./neckband.css">

<section class="video-section">

<video autoplay muted loop class="promo-video">
<source src="neckband/vdo.mp4" type="video/mp4">
</video>

</section>

<section class="image-section">
<img src="neckband/img.png" class="banner-image">
</section>

<div class="neckband-products">

<?php
$conn = mysqli_connect("localhost","root","","mywebsite");

$query = "SELECT * FROM product WHERE category='neckband'";
$result = mysqli_query($conn, $query);

while($p = mysqli_fetch_assoc($result)){
?>

<div class="product-card">

    <img src="<?php echo $p['image']; ?>">

    <a href="<?php echo $p['link']; ?>" class="product-btn">
    <?php echo $p['name']; ?>
    </a>

    <div class="product-info">   

        <h3><?php echo $p['name']; ?></h3>
        <h4><?php echo $p['description']; ?></h4>
        <h3>₹<?php echo $p['price']; ?></h3>

    </div>

    <form method="POST" action="cart.php">
        <input type="hidden" name="name" value="<?php echo $p['name']; ?>">
        <input type="hidden" name="image" value="<?php echo $p['image']; ?>">
        <input type="hidden" name="price" value="<?php echo $p['price']; ?>">
        <button type="submit" name="add_to_cart">Add to Cart</button>
    </form>

</div>

<?php } ?>

</div>

<?php include 'footer.php'; ?>

</body>
</html>