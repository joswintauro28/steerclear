<?php
    session_start();
    include 'includes/cart.inc.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css"  />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/cart.css">
		<title>STEER CLEAR | product</title>
	</head>
	<body style="background-color:#C29CF0;">
		<div class="all">
			<div class="nav">
				<a href="index.php"><i class="fas fa-angle-double-left"></i></a><h1>STEER CLEAR</h1>
			</div>
			<div class="container">
				<div class="results">
					<h3>My cart <span class="cost"></i> <?php echo $total; ?> </span> <a href="checkout.php?user_id=<?php echo $user_id; ?>" class="checkout"> CHECKOUT </a></h3>
					<div class="product">
                        <?php
                        if($cartss->num_rows == 0){
                            echo '<img class="empty-cart" src="assets/Display_images/empty_cart.png">';
                            echo '<h1 class="empty-h1"> EMPTY CART </h1>';
                        }
                        while($row = $cartss->fetch_assoc()){
                            if($row['product_id'] != -1){
                                echo '<div class="item">
                                    <img src="assets/Car_images/'.$row['product_image'].'">
                                    <div class="item-info">
                                        <h2>'.$row['product_name'].'</h2>
                                        <p>'.$row['product_model'].'</p>
                                        <p>Rs'.$row['product_price'].'</p>
                                        <p style="font-size: 15px; margin-top:20px; color: BLACK;">survived not only five centuries, but also the leap into electronic typesetting,
                                        remaining essentially unchanged. It was popularised in the 1960s with the release
                                        of Letraset sheets</p>
                                        <form class="" action="product.php?id='.$row['product_id'].'" method="post">
                   					 	    <button type="submit" class="order-btn"> Review</button>
                   					    </form>
                                        <form action="cart.php?cnl_id='.$row['id'].'" method="post">
                                            <button class="cnl-btn" type="submit" name="cnl-submit">Cancel</button>
                                        </form>
                                    </div>
                                </div>';
                            }
                            else{
                                echo '<div class="item">
                                    <img src="assets/Product_images/'.$row['product_image'].'">
                                    <div class="item-info">
                                        <h2>'.$row['product_name'].'</h2>
                                        <p>'.$row['product_model'].'</p>
                                        <p>Rs'.$row['product_price'].'</p>
                                        <p style="font-size: 15px; margin-top:20px; color: black;">survived not only five centuries, but also the leap into electronic typesetting,
                                        remaining essentially unchanged. It was popularised in the 1960s with the release
                                        of Letraset sheets</p>
                                        <form class="" action="product.php?product_id='.$row['product_id_2'].'" method="post">
                   					 	    <button type="submit" class="order-btn"> Review</button>
                   					    </form>
                                        <form action="cart.php?cnl_id='.$row['id'].'" method="post">
                                            <button class="cnl-btn" type="submit" name="cnl-submit">cancel</button>
                                        </form>
                                    </div>
                                </div>';
                            }
                        }
                        ?>
					</div>
				</div>
			</div>
		</div>
		<footer >
			<div class="social" style="font-size: 25px;">
			  <h2>FOLLOW US</h2>
			  <a href="#"> <i class="fab fa-facebook" style="font-size: 25px;"> <span></span> </i> </a>
			  <a href="#"> <i class="fab fa-instagram" style="font-size: 25px;"> <span></span> </i> </a>
			  <a href="#"> <i class="fab fa-twitter" style="font-size: 25px;"> <span></span> </i> </a>
			  <a href="#"> <i class="fab fa-youtube" style="font-size: 25px;"> <span></span> </i> </a>
		  </div>
		  <div class="credit">
		  	<h1 style="font-size: 20px;">STEER CLEAR | Developed by STEER CLEAR team</h1>
		  </div>
		</footer>
	</body>
</html>
