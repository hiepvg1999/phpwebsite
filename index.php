<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Test</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"  >
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"><b>Kate</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#service">Services</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="#about">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#contact">Contact</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/la.jpg" alt="Los Angeles" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Los Angeles</h3>
        <p>We had such a great time in LA!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="img/chicago.jpg" alt="Chicago" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Chicago</h3>
        <p>Thank you, Chicago!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="img/ny.jpg" alt="New York" width="1100" height="500">
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>We love the Big Apple!</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<section class="my-5">
	<div class="py-5">
		<h2 class="text-center" id="about">About Us</h2>
	</div>
	<div class="container-fluid">
    <div class="row">
    	<div class="col-lg-6 col-md-6 col-12">
    		<img src="img/dog.jpg" class="img-fluid aboutimg">
    	</div>
    	<div class="col-lg-6 col-md-6 col-12">
    	<h2 class="display-4">Introduce</h2>
    	<p class="py-3">My name is Hiep.I live in Van Giang town,Hung Yen.I am <?php echo date("Y")-1999; ?> years old.I am a student at Ha Noi university of science and technology.My favorite sports are table tennis and china chess.The countries which I want to come are Japan and Israel and so on.Specially, I want to work in Japan's companies so that get the eperiences.</p>
    	<a href="about.php" target="_blank" class="btn btn-success">check More</a>
    	</div>
    </div>
    </div>
</section>
<section class="my-5">
	<div class="py-5">
		<h2 class="text-center" id="service">Our services</h2>
	</div>	

	<div class="container-fluid">
		<div class="row">
			<?php include("service.php"); ?>
		</div>
	</div>
</section>

<section class="my-5">
	<div class="py-5">
		<h2 class="text-center" id="gallery">Our Gallery</h2>
	</div>
	<?php include("gallery.php"); ?>
</section>
<section class="my-5" >
	<div class="py-5">
		<h2 class="text-center" id="contact">Our Contact</h2>
	</div>	
	<div class="w-50 m-auto">
		<form action="userinfo.php" method="post" accept-charset="utf-8">
			<div class="form-group">
				<label>Username: </label>
				<input type="text" id="user" name="user" autocomplete="off" class="form-control" placeholder="Nguyen Van A">
			</div>
			<div class="form-group">
				<label>Email: </label>
				<input type="text" id="email" name="email" autocomplete="off" class="form-control" placeholder="test@test.com">
			</div>
			<div class="form-group">
				<label>Mobile: </label>
				<input type="text" id="mobile" name="mobile" autocomplete="off" class="form-control" placeholder="0123456789">
			</div>
			<div class="form-group">
				<label>Comment: </label>
				<textarea id="comment" name="comment" class="form-control" rows="5"></textarea>
			</div>
			<div>
				<button type="submit" class="btn btn-primary" name="submit" id="submit" onclick="save()">Submit</button>
			</div>
		</form>
	</div>
</section>
<footer>
	<p class="p-3 bg-dark text-center text-white">@hiepkateboy</p>
</footer>
    <script src="js/validate_form.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src='https://cdn.jsdelivr.net/g/lodash@4(lodash.min.js+lodash.fp.min.js)'></script>
</body>
</html>