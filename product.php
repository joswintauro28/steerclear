<?php
    session_start();
    include 'includes/product.inc.php';
    if(!isset($_SESSION['username'])){
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css"  />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/product.css">
		<title>STEER CLEAR | product</title>
	</head>
	<body  style="background:rgb(76, 0, 117);" >
		<div class="container">
			<div class="nav">
				<a href="javascript:history.back();"><i class="fas fa-angle-double-left"></i></a><h1>S T E E R - C L E A R</h1>
			</div>
			<?php
				if(isset($_SESSION['message'])){
	                echo '<div class="message"><p>' . $_SESSION['message'] . '</p></div>';
	                unset($_SESSION['message']);
				}
			?>
            <?php
                if(isset($_GET['product_id'])){
                    echo '<div class="product">
        				<div class="info">
        					<div class="img">
        						<img src="assets/Product_images/'.$row['image'].'" height="400" width="420" style="display: block;">
        					</div>
        				</div>
        				<div class="image">
        					<div class="pro-info">
        						<h2>Car </h2>
        						<h3>'.$row['manufacturer'].' '.$row['model'].'</h3>
        						<h5>Rs'.$row['price'].'</h5>
        						<br>
        						<h3>Condition:</h3>
        						<p>'.$row['condition'].'</p>
        						<form action="product.php?product_id='.$row['id'].'" method="post">
        						   <button class="add-to-cart" type="submit" name="add-to-cart-product"> Add to Cart</button><br>
								   
								   	 
								    <a href="mailto:steerclear@gmail.com" class="call">C O N T A C T - S E L L E R</a>
								
        						</form>
        					</div>
        				</div>
        			</div>
        		</div>';
                }
                else{
                    echo '<div class="product">
        				<div class="info">
        					<div class="img">
        						<img src="assets/Car_images/'.$row['image'].'" height="300" width="420" style="display: block;">
        						<i class="fas fa-tachometer-alt"> <p>'.$row['speed'].'km/h</p> </i>
        						<i class="fas fa-gas-pump"> <p>'.$row['mileage'].'km</p> </i>
        						<i class="fas fa-car-battery"> <p>'.$row['battery'].'</p> </i>
        						<i class="fas fa-oil-can"> <p>'.$row['fuel'].'</p> </i>
        						<i class="fas fa-heartbeat"> <p>'.$row['total_run'].'km</p> </i>
        						<i class="fas fa-arrows-alt"> <p>'.$row['gear'].'</p> </i>
        					</div>
        				</div>
        				<div class="image">
        					<div class="pro-info">
        						<h2>Car </h2>
        						<h3>'.$row['manufacturer'].' '.$row['model'].'</h3>
        						<h5>Rs'.$row['price'].'</h5>
        						<br>
        						<h3>Condition:</h3>
        						<p>'.$row['condition'].'</p>
        						<form action="product.php?id='.$row['id'].'" method="post">
        						   <button class="add-to-cart" type="submit" name="add-to-cart">A D D - T O - C A R T</button><br>
								  
									
								   <a href="mailto:steerclear@gmail.com" class="call">C O N T A C T - S E L L E R</a>
								    
        						</form>
        					</div>
        				</div>
        			</div>
        		</div>';
                }
            ?>
<div style="background: #000000; width:210px;padding: 20px; text-align: center; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0,0,0,0.2);">

<button onclick="location.href='infop.html'" class="add-to-cart" type="submit" > V I E W - D E T A I L S</button><br>
			</div>
		<footer>
			<div class="social">
			  <h2>FLLOW US</h2>
			  <a href="#"> <i class="fab fa-facebook"> <span></span> </i> </a>
			  <a href="#"> <i class="fab fa-instagram"> <span></span> </i> </a>
			  <a href="#"> <i class="fab fa-twitter"> <span></span> </i> </a>
			  <a href="#"> <i class="fab fa-youtube"> <span></span> </i> </a>
		  </div>
		  <div class="credit">
		  	<h1>STEER CLEAR | Developed by STEER CLEAR TEAM</h1>
		  </div>
		</footer>
	</body>
</html>
