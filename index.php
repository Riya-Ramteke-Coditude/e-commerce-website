<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Navbar</title>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<?php
if(isset($_GET['msg'])){
    if($_GET['msg'] == "success"){
        echo "<p style='color:green; text-align:center;'>Subscribed Successfully!</p>";
    } 
    else if($_GET['msg'] == "error"){
        echo "<p style='color:red; text-align:center;'>Something went wrong!</p>";
    }
    else if($_GET['msg'] == "exists"){
        echo "<p style='color:orange; text-align:center;'>Email already subscribed!</p>";
    }
}
?>

<?php include 'header.php'; ?>

<section class="video-section">
<video autoplay muted loop class="promo-video">
<source src="img/vdo.mp4" type="video/mp4">
</video>
</section>

<section class="image-section">
<img src="img/image2.jpg" class="banner-image">
</section>

<section class="image-section">
<img src="img/image3.jpg" class="banner-image">
</section>

<section class="image-section">
<img src="img/image4.jpg" class="banner-image">
</section>

<section class="categories-section">

<h2 class="category-title">EXPLORE CATEGORIES</h2>

<div class="categories">

<div class="category-card">
<img src="img/chargers.png">
<a href="/GoatWebsite/chargers.php" class="category-btn">Chargers</a>
</div>

<div class="category-card">
<img src="img/cables.png">
<a href="/GoatWebsite/cables.php" class="category-btn">Cables</a>
</div>

<div class="category-card">
<img src="img/powerbank.png">
<a href="/GoatWebsite/powerbanks.php" class="category-btn">PowerBanks</a></div>

<div class="category-card">
<img src="img/earsphone.png">
<a href="neckband.php" class="category-btn">Neckband</a>
</div>

<div class="category-card">
<img src="img/eraspods.png">
<a href="tws.php" class="category-btn">TWS</a>
</div>

<div class="category-card">
<img src="img/WiredHeadphone.jpg">
<a href="wiredearphones.php" class="category-btn">Wired Earphones</a>
</div>

</div>
</section>

<section class="launch-section">

<div class="launch-header">
<h2>NEW LAUNCHES</h2>
<a href="all-products.php" class="view-all"><u>VIEW ALL</u></a>
</div>

<div class="launch-products">

<?php
// Database connection
$conn = mysqli_connect("localhost","root","","mywebsite");

if(!$conn){
    die("Database connection failed");
}

// Fetch products
$query = "SELECT * FROM product WHERE category='launch'";
$result = mysqli_query($conn, $query);

// Check data
if(mysqli_num_rows($result) > 0){

    while($p = mysqli_fetch_assoc($result)){ ?>

    <div class="product-card">

        <img src="<?php echo $p['image']; ?>">

        <a href="<?php echo $p['link']; ?>" class="product-btn">
            <?php echo $p['name']; ?>
        </a>

        <h4><?php echo $p['description']; ?></h4>

<form method="POST" action="cart.php">
    <input type="hidden" name="name" value="<?php echo $p['name']; ?>">
    <input type="hidden" name="image" value="<?php echo $p['image']; ?>">
    <input type="hidden" name="price" value="<?php echo $p['price']; ?>">
    
    <button type="submit" name="add_to_cart">Add to Cart</button>
</form>

    </div>

<?php 
    }

} else {
    echo "<p style='text-align:center;'>No products available</p>";
}
?>

</div>
</section>

<section class="subscribe-section">

<div class="subscribe-text">
<h2>SUBSCRIBE US NOW</h2>
<p>Get latest news, updates and deals directly mailed to your inbox.</p>
</div>

<div class="subscribe-form">
<form action="subscribe.php" method="POST">
<input type="email" name="email" placeholder="Your email address here" required>
<button type="submit">SUBSCRIBE</button>
</form>
</div>

</section>

<?php include 'footer.php'; ?>

</body>
</html>