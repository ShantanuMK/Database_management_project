<?php
	session_start();
$conn=mysqli_connect("localhost","root","","vegetable");
$conn=mysqli_connect("localhost","root","","vegetable");

	if(isset($_POST['addc'])) {
		if (isset($_SESSION['bid'])) {
			
		$cbid=$_SESSION['bid'];
		$cbname=$_SESSION['bname'];
		$cpid=$_POST['cid'];
		$cpname=$_POST['cname'];
		$cpprice=$_POST['cprice'];
		$cquantity=$_POST['quantity'];
		$ctotal=$cquantity*$cpprice;

		echo $cbid;
		echo $cbname;
		echo $cpid;
		echo $cpname;
		echo $cpprice;
		echo $cquantity;
		echo $ctotal;

		$check_result="select * from cart where bname='$cbname' and pid=$cpid";
		$check_res1=mysqli_query($conn,$check_result);
		$check_row=mysqli_num_rows($check_res1);
		if ($check_row==1) {
			mysqli_query($conn,"update cart set pquantity=$cquantity, ptotal_price=$ctotal where bname='$cbname' and pid=$cpid");
		}
		else {
			$add_to_cart="INSERT INTO `cart`(`bid`, `bname`, `pid`, `pname`, `pprice`, `pquantity`, `ptotal_price`) VALUES ($cbid,'$cbname',$cpid,'$cpname',$cpprice,$cquantity,$ctotal)";
			mysqli_query($conn,$add_to_cart);


		}

		//$add_to_cart="INSERT INTO `cart`(`bid`, `bname`, `pid`, `pname`, `pprice`, `pquantity`, `ptotal_price`) VALUES ($cbid,'$cbname',$cpid,'$cpname',$cpprice,$cquantity,$ctotal)";

		//mysqli_query($conn,$add_to_cart);
	}
	else{
		//alert("Please Login First to Add Items To Cart");
		//window.onload=function () { alert("Please Login First to Add Items To Cart");
		echo '<script type="text/javascript">

          window.onload = function () { alert("Please Login First To Add To cart"); }

</script>'; 
	}

	}
if (isset($_SESSION['bid'])) {
	$name=$_SESSION['bname'];
	$sq1="SELECT p.pimage,p.pname,c.pid,c.pprice,c.pquantity,c.ptotal_price from products p ,cart c where c.pid=p.pid and c.bname = '$name' ";
	$r1=mysqli_query($conn,$sq1);
	$r2=mysqli_num_rows($r1);
	 

}
else {
	$r2=0;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vegefoods</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="goto-here">
		
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Vegefoods</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.php">Shop</a>
              	<?php 
                if (isset($_SESSION['bid'])) {
                echo '<a class="dropdown-item" href="buyer_login.php">Your Orders</a>';
                	
                }?>
                <a class="dropdown-item" href="cart.php">Cart</a>
                <a class="dropdown-item" href="checkout.php">Checkout</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Seller</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="seller_login1.php">Seller LogIn</a>
              	<a class="dropdown-item" href="seller_registration.php">Seller Registration</a>
              	<?php 
                if (isset($_SESSION['sid'])) {
                echo '<a class="dropdown-item" href="seller_stock.php">Update Stock</a>';
                echo '<a class="dropdown-item" href="seller_orders.php">Orders Recieved</a>';
                  
                }?>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Buyer</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="buyer_login1.php">Buyer LogIn</a>
                <a class="dropdown-item" href="buyer_registration.php">Buyer Registration</a>
              </div>
            </li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact Us</a></li>
	          <li class="nav-item"><a href="admin_login1.php" class="nav-link">Admin LogIn</a></li>
	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span><?php echo $r2 ?></a></li>
	          <?php 
	          if (isset($_SESSION['bid']) || isset($_SESSION['sid']) || isset($_SESSION['aid'])) {

	          	echo '<li class="nav-item"><a href="logout.php" class="nav-link">Log Out</a></li>';
	          	if (isset($_SESSION['bname'])) {
	          		echo '<li class="nav-item"><a href="" class="nav-link">'.$_SESSION['bname'].'</a></li>';
	          	}
	          	elseif (isset($_SESSION['sname'])) {
	          		echo '<li class="nav-item"><a href="" class="nav-link">'.$_SESSION['sname'].'</a></li>';
	          	}
	          }
	          ?>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	
            <h1 class="mb-0 bread">Eat Fresh, Live Fresh!!</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="#" class="active">All</a></li>
    					<li><a href="#">Vegetables</a></li>
    					<li><a href="#">Fruits</a></li>
    					<li><a href="#">Juice</a></li>
    					<li><a href="#">Dried</a></li>
    				</ul>
    			</div>
    		</div>
    		<div class="row">
            <?php
                $conn=mysqli_connect("localhost","root","","vegetable");
                $get_product="select * from products";
                $result=mysqli_query($conn,$get_product);
                $sum=0;
                while($row=mysqli_fetch_array($result))
                {
                  $p_id=$row['pid'];
                  $p_name=$row['pname'];
                  $p_image=$row['pimage'];
                  $p_price=$row['price'];
                  //$sum = $sum + $row['price'];
                  echo "
                  <div class='col-md-6 col-lg-3 ftco-animate'>
                  <form action='shop.php' method='post'>
            <div class='product'>
              <a href='#' class='img-prod'><img class='img-fluid' src='images/$p_image' alt='Colorlib Template'>
                <span class='status'>30%</span>
                <div class='overlay'></div>
              </a>
              <div class='text py-3 pb-4 px-3 text-center'>
                <h3><a href='#'>$p_name</a></h3>
                <div class='d-flex'>
                  <div class='pricing'>
                    <p class='price'><span class='mr-2 price-dc'>Rs. 120.00</span><span class='price-sale'>$p_price</span></p>
                  </div>
                </div>
                <div class='input-group mb-3'>
					<input type='text' name='quantity' class='quantity form-control input-number' placeholder='Enter Your Quantity'value='' min='1' max='100'>
				</div>
				<p><input type='hidden' name='cid' value=" . $row['pid']. ">
					<input type='hidden' name='cname' value=" . $row['pname']. ">
					<input type='hidden' name='cprice' value=" . $row['price']. ">
					<input type='submit' class='btn btn-primary py-3 px-4' name='addc' value='Add To Cart'></p>
                
              
                              
              </div>
            </div>
          </div>
          </form>
       ";

       			
                }
    


                //echo $sum;
              ?>
            </div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>

		
    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row">
          
        </div> 
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Vegefoods</h2>
              <p>Eat Fresh, Live Fresh.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Journal</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
                <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                  <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                  <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                  <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                  <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                </ul>
                <ul class="list-unstyled">
                  <li><a href="#" class="py-2 d-block">FAQs</a></li>
                  <li><a href="#" class="py-2 d-block">Contact</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">Pune, Maharashtra, India</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+91 99999 99999</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">vegge@email.com</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            
          </div>
        </div>
      </div>
    </footer>
    
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>


<?php

	
	

	?>
