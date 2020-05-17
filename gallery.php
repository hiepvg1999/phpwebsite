<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php 
    $con = mysqli_connect('localhost','root','','myuserinfodata');
    if($con){
    }else{
	  die("No connect");
    }
    ?>
	<div class="container-fluid">
		<div class="row">
		<div class="col-lg-4 col-md-4 col-12">
				<div class="text-center text-uppercase" style="font-size: 25px">Normal Package</div>
		</div>
		<div class="col-lg-4 col-md-4 col-12">
				<div class="text-center text-uppercase" style="font-size: 25px">Vip 1 Package</div>
		</div>
		<div class="col-lg-4 col-md-4 col-12">
				<div class="text-center text-uppercase" style="font-size: 25px">Vip 2 Package</div>
		</div>
		</div>
		<br>
	</div>
	<div class="container-fluid">
		<div class="row">
			<?php for ($i = 1; $i <= 3; $i++) {
				$query = "select `img_src`,`price_normal` as `price_0`,`price_vip` as `price_1`,`price_vip2` as `price_2` from `servicedata` where id=$i";
				$sq=mysqli_query($con, $query);
                $arr = mysqli_fetch_array($sq);
                if(is_array($arr)){
                    $img_src = $arr['img_src'];
                    $price = array();
                    $price[] = $arr['price_0'];
                    $price[] = $arr['price_1'];
                    $price[] = $arr['price_2'];
                 }
				for ($j = 0; $j < 3; $j++) {
			?>
			<div class="col-lg-4 col-md-4 col-12">
				<img src="<?php echo 'img/'.$img_src; ?>" class="img-fluid pb-4" style ="width: 400px;height: 250px">	
				<p><?php echo 'Price: '.number_format($price[$j]).' VND'; ?> <a href="<?php echo 'payment.php?serviceid='.$i.'&type='.$j; ?>"><button style='font-size:24px;border: none; background-color: white'><i class='fas fa-cart-plus'></i></button></a></p>
			</div>
			<?php }} ?>
		</div>
	</div>
	<?php mysqli_close($con);?>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</body>
</html>