<?php
session_start();
include 'includes/order.inc.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['order-submit'])) {
    // Process the form (Save data in DB if needed)
    
    // Ensure no output before header()
    ob_start();
    
    // Redirect to invoice.html
    header("Location: invoice.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/checkout.css">
    <title>STEER CLEAR | Checkout</title>
</head>
<body style="background-color:#8C6C6C;">
    <div class="all">
        <div class="nav">
            <a href="cart.php"><i class="fas fa-angle-double-left"></i></a>
            <h1>S T E E R - C L E A R</h1>
        </div>
        <div class="container">
            <h2> C H E C K O U T </h2>
            <div class="checkout-info">
                <div id="checkout-flex" class="checkout-form">
                    <h3>Client Information</h3>
                    <form action="" method="post">  <!-- Form submits to itself -->
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>"><br>
                        <input type="text" name="address" placeholder="Address..." required><br>
                        <input type="text" name="city" placeholder="City..." required><br>
                        <input type="text" name="phone" placeholder="Phone..." required><br>
                        <input type="text" name="postal_code" placeholder="Postal code..." required><br>
                        <button type="submit" name="order-submit" class="order-submit-btn"> S U B M I T </button><br>
						<button onclick="location.href='cart.php'" class="order-submit-btn">B A C K</button>
						<button onclick="location.href='invoice.html'" class="order-submit-btn">I N V O I C E</button>
                    </form>
                </div>
                <div id="checkout-flex" class="checkout-details">
                    <h3 style="margin-bottom: 35px;">Checkout Information</h3>
                    <h4>Total: Rs <?php echo $total; ?></h4>
                    <h4>Total items: <?php echo $count; ?></h4>
                </div>
            </div>
        </div>
    </div>
    
    <footer>
        <div class="social" style="font-size: 25px;">
            <h2>FOLLOW US</h2>
            <a href="#"> <i class="fab fa-facebook"></i> </a>
            <a href="#"> <i class="fab fa-instagram"></i> </a>
            <a href="#"> <i class="fab fa-twitter"></i> </a>
            <a href="#"> <i class="fab fa-youtube"></i> </a>
        </div>
        <div class="credit">
            <h1 style="font-size: 20px;">STEER CLEAR | Developed by STEER CLEAR team</h1>
        </div>
    </footer>
</body>
</html>
