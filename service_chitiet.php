<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Service Element</title>
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
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
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
	
	<?php 
		$index = $_GET['id'];
		
		$con = mysqli_connect('localhost','root','','myuserinfodata');
        if($con){
        }else{
	    die("No connect");
        }
		$query = "select * from  `servicedata` where `id`=$index;";
        $sq=mysqli_query($con, $query);
        $arr = mysqli_fetch_array($sq);
        if(is_array($arr)){
          $img_src = $arr['img_src'];
          $img_name = $arr['name'];
          $img_profile = $arr['profile'];
        } else {
      	echo 'not';
        }
        mysqli_close($con);
	 ?>
	 <section>
	 <div class="container-fluid m-lg-3">
	 	<div class="text-left text-dark">
	 		<?php echo strtoupper($img_name); ?>
	 	</div>
	 </div>
	 <div class="container-fluid">
	 	<div class="row">
	 		<div class="col-lg-4 col-md-4 col-12">
	 			<img src="<?php echo 'img/'.$img_src; ?>" alt="<?php echo $img_name; ?>" style="width: 400px; height: 250px">
	 		</div>
			
	 		<div class="col-lg-4 col-md-4 col-12">
	 			<div class="text-info">
	 				<textarea rows="7" cols="100" disabled><?php echo $img_profile; ?> </textarea>
	 			</div>
	 		</div>
	 	</div>
	 </div>
	 <br>
	 <div class="container-fluid">
	 	<div class="row">
	 		<div class="col-lg-4 col-md-4 col-12">
	 			
	 		</div>

	 		<div class="col-lg-4 col-md-4 col-12">
	 			<div>
	 				
	 				<select name="Select_trip" id="Select_trip" onchange="takevalue()">
	 					<option value="0">Normal</option>
	 					<option value="1">Vip 1</option>
	 					<option value="2">Vip 2</option>
	 				</select>
	 				<script> 
	 					var link = document.location.href;
	 					var url = new URL(link);
	 					var  id=url.searchParams.get("id");
	 					var re_link ="http://localhost:8080/website/payment.php?serviceid="+id+"&type=0";
	 					function takevalue(){
	 					var	select_value = document.getElementById('Select_trip').value;
	 						re_link ="http://localhost:8080/website/payment.php?serviceid="+id+"&type="+select_value;
	 					}
	 					
	 					function redirect() {
	 						window.location= re_link;
	 					}
	 						
	 			    </script>	 				
	 				<input type="submit" name="order" class="btn btn-primary" value="Book A Trip" onclick="redirect();" />
	 			</div>	 			
	 		</div>
	 	</div>
	 </div>
	</section>
	<br>
	<section>
	<div class="container-fluid">
		<div class="">
			
		</div>
	</div>	
	</section>
	<br>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>

