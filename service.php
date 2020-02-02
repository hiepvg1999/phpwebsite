<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php 
$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'myuserinfodata');
$query = "select count(id) as `sl` from `servicedata`;";
$scount=mysqli_query($con, $query);
$arr = mysqli_fetch_array($scount);
if(is_array($arr)){
  $count = $arr['sl'];
}
?>

<?php for ($i = 1; $i <=$count ; $i++) { 
      $query = "select `img_src`,`name`,`profile` from  `servicedata` where `id`=$i;";
      $sq=mysqli_query($con, $query);
      $arr1 = mysqli_fetch_array($sq);
      if(is_array($arr1)){
          $img_src = $arr1['img_src'];
          $img_name = $arr1['name'];
          $img_profile = $arr1['profile'];
          $img_id = substr($img_src, 0,-4);
      }
      else{
        echo 'Not';
      }
?>
      <div class="col-lg-4 col-md-4 col-12">
        <div class="card" style="width:400px">
          <a href="<?php echo 'service_chitiet.php?id='.$i ?>" target="_blank">
            <img class="card-img-top" src="<?php echo 'img/'.$img_src; ?>" alt="<?php echo 'Card image '.$i ?>">
          </a>
          <div class="card-body">
            <h4 class="card-title"><?php echo $img_name; ?></h4>
            <p class="card-text" id="<?php echo $img_id; ?>"><?php echo 'Beautiful Place in VietNam .<br>'.substr($img_profile, 0,75).'<b>...</b>'; ?></p>
            <a href="<?php echo 'service_chitiet.php?id='.$i ?>" target="_blank" class="btn btn-primary" >See Profile</a>      
            </div>
            </div>
      </div>
<?php } mysqli_close($con);?>
</body>
</html>
