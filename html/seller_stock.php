<?php
  session_start();
  $conn=mysqli_connect("localhost","root","","vegetable");
  //$conn=mysqli_connect("localhost","root","","vegetable");
if (isset($_SESSION['bid'])) {
	$name=$_SESSION['bname'];
	$sq1="SELECT p.pimage,p.pname,c.pid,c.pprice,c.pquantity,c.ptotal_price from products p ,cart c where c.pid=p.pid and c.bname = '$name' ";
	$r1=mysqli_query($conn,$sq1);
	$r2=mysqli_num_rows($r1);
	 

}
else {
	$r2=0;
}

if (isset($_POST['update'])) {
        $ppid=$_POST['pppid'];
        $ppname=$_POST['ppp'];
        $ssid=$_SESSION['sid'];
        $ssname=$_SESSION['sname'];
        $stock1=$_POST['quantity'];
        echo $ppname;
        echo $ppid;
        echo $ssid;
        echo $ssname;
        echo $stock1;
        //$insert_query="INSERT INTO 'product_stock'('sid','sname','pid','pname','stock') VALUES ('$ssid','$ssname','$ppid','$ppname','$stock1')";
        //$quant=$_POST['b_num'];
        $sql1="SELECT * FROM product_stock where sid = {$_SESSION['sid']} AND pid = '$ppid'";
        $res=mysqli_query($conn,$sql1);
        $row1=mysqli_num_rows($res);
        if ($row1==1) {
          echo $row1;
         $update1 = "update product_stock set stock='$stock1' where sid = {$_SESSION['sid']} and pid= '$ppid' ";
         $run_update=mysqli_query($conn,$update1);
         echo 'Record updated';
         
        }
        else {
          //$insert="INSERT INTO `product_stock`(`sid`, `sname`, `pid`, `pname`, `stock`) VALUES ([$_SESSION['sid']],[$_SESSION['sname']],[$p_id],[$p_name],[$stock])";
        $insert_query="insert into product_stock (sid,sname,pid,pname,stock) values ($ssid,'$ssname',$ppid,'$ppname',$stock1)";
          //$run_insert=mysqli_query($conn,$insert_query);
          if(mysqli_query($conn,$insert_query))
          {
            echo "record inserted success";
          }
          else
          {
            echo "error";
          }
        }
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
		<div class="py-1 bg-primary">
    	
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

	  
	  <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            
            <h1 class="mb-0 bread">Eat Fresh, Live Fresh!!</h1>
          </div>
        </div>
      </div>
    </div>

    <p><span><h3>Welcome <?php echo  $_SESSION['sname']; ?></h3></span></p>
    <p><span><h3>Welcome <?php echo  $_SESSION['sid']; ?></h3></span></p>

    <section class="ftco-section ftco-cart">
      <div class="container">
        <div class="row">
          <div class="col-md-25 ftco-animate">
            <div class="cart-list">
              <table class="table">
                
                <thead class="thead-primary">
                  <tr class="text-center">
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Stock</th>
                    <th>Update</th>
                  </tr>
                </thead>
                <tbody>
                  
                    <?php

                    
                    
                    $get_product="select * from products";
                    $result=mysqli_query($conn,$get_product);
                    while($row=mysqli_fetch_array($result))
                    {
                      $p_id=$row['pid'];
                      $p_name=$row['pname'];
                      $p_image=$row['pimage'];
                      $p_price=$row['price'];

                      
                      echo '<tr class="text-center">';
                      
                      echo '<td>' . $p_id . '</td>';
                    
                      echo '<td class="seller-name">
                          <h3>' . $p_name . '</h3>
                      
                           </td>';
                    
                      echo '<td class="total"><img class="img-fluid" src=images/'.$p_image.' height="100" width="100" alt="Colorlib Template"></td>';
                    
                    
                      echo '<td class="quantity">
                            
                      <div class="input-group mb-3">
                        <form action="" method="post">
                        <input type="text" class="form-control" placeholder="Enter your stock" name="quantity" value="" required>
                        
                      </div>
                    </td>';

                      echo '<td>
                      
                      <input type="hidden" name="pppid" value=' . $row["pid"] . '>
                      <input type="hidden" name="ppp" value=' .$row["pname"] .'>
                      <input type="submit" class="btn btn-primary py-3 px-4" name="update" value="Update"></td>
                      </form>';
                      echo "</tr>";                      # code...
                    }

                    
                    ?>

                </tbody>
              </form>
              </table>
            </div>
          </div>
        </div>
    </div>
  </section>







	  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

    
  

    <footer class="ftco-footer ftco-section">
      <div class="container">
        
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