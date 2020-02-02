<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Payment</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/payment.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"  >
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>
<body>
	<?php 
	$serviceid = $_GET['serviceid'];
	$typetrip = $_GET['type'];
	 ?>
	<?php 
    $con = mysqli_connect('localhost','root');
    mysqli_select_db($con,'myuserinfodata');
    if ($typetrip==0) {
    	$query = "select `name`,`price_normal` as `price` from `servicedata` where `id`=$serviceid;";
    } else if($typetrip==1){
    	$query = "select `name`,`price_vip` as `price` from `servicedata` where `id`=$serviceid;";
    } else if($typetrip==2){
    	$query = "select `name`,`price_vip2` as `price` from `servicedata` where `id`=$serviceid;";
    }
    
    $sq=mysqli_query($con, $query);
    $arr = mysqli_fetch_array($sq);
    if(is_array($arr)){
      $name = $arr['name'];
      $price = $arr['price'];
    }
?>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"><b>Kate</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#service">Services</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#contact">Contact</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="width: 70px">Search</button>
    </form>
  </div>
</nav>
	
	<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="send_mail.php">

        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Information correct ?
        </label>
        <input type="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>

<div class="col-25">
    <div class="container">
      <h4>Cart
        <span class="price" style="color:black">
          <i class="fa fa-shopping-cart"></i>
          <b><input type="number" name="sl" id="sl" placeholder="1" min="1" style="width: 40px" onchange="take_value();"></b>
        </span>
      </h4>
      
    <p>
      	<a href="#">
      		<?php 
      			if($typetrip==0){
      				echo $name.'(Normal Package)';
      			}else if($typetrip==1){
      				echo $name.'(Vip1 Package)';
      			}else if($typetrip==2){
      				echo $name.'(Vip2 Package)';
      			}
      		 ?>
      	</a> 
      	<span class="price">
      	<?php echo number_format($price).' VND'; ?>
        </span>
    </p>
      <hr>
      <script>
      	var sluong = 1;
      	function take_value() {
      		sluong = document.getElementById('sl').value;
      	}
      	function price_total(){
      		var price_a_trip = <?php echo $price; ?>;
      		var price_total = sluong * price_a_trip;
      		//document.getElementById("price_total").innerHTML= price_total;
      		//var b_tag = document.createElement('b');
      		//b_tag.textContent = price_total;
      		return price_total;
      	}
      </script>
      <p><button onclick="price_total();">Total </button><!--<span class="price" id="price_total" style="color:black" ></span>--></p>
    </div>
  </div>
</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src='https://cdn.jsdelivr.net/g/lodash@4(lodash.min.js+lodash.fp.min.js)'></script>
</body>
</html>
