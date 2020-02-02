<?php 
$con = mysqli_connect('localhost','root');
if($con){
	echo 'Connect successfully';
}else{
	echo 'No connect';
}
mysqli_select_db($con,'myuserinfodata');

$user = $_POST['user'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$comment = $_POST['comment'];

$query = "insert into userdata(user,email,mobile,comment) values('$user','$email','$mobile','$comment')";

mysqli_query($con, $query);
mysqli_close($con);
//header('location:index.php');
?>

