<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<style>
    .error {color: #FF0000;}
    </style>
</head>
<body>
<script type="text/javascript">
    function openmicrophone(){
    var constraints ={
      audio: true,
      video: false
    }
    navigator.mediaDevices.getUserMedia(constraints).then(function(mediaStream){
      var audio = document.querySelector('audio');
      audio.src= mediaStream;
      audio.play();
    }).catch(function(err){
      console.log('Error: '+err.message);
    })
  }
</script>

<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<?php
$userErr = $emailErr = $mobileErr = "";
$user = $email = $mobile = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["user"])) {
    $userErr = "Name is required";
  } else {
    $user = test_input($_POST["user"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$user)) {
      $userErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["mobile"])) {
    $mobileErr = "Mobile is required";
  } else {
    $mobile = test_input($_POST["mobile"]);
    // check if mobile have length 10 or 11 digits
    if (!preg_match("/^[0-9]{10,11}+$/",$mobile)) {
      $mobileErr = "Phone number have 10 or 11 digits";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
}
?>

<div class="w-50 m-auto">
  <p><span class="error">* required field</span></p>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
      <div class="form-group">
        <label>Username(*): </label>
        <input type="text" id="user" name="user" autocomplete="off" class="form-control" placeholder="Nguyen Van A">
        <span class="error"> <?php echo $userErr;?></span>
      </div>
      <div class="form-group">
        <label>Email(*): </label>
        <input type="text" id="email" name="email" autocomplete="off" class="form-control" placeholder="test@test.com">
        <span class="error"> <?php echo $emailErr;?></span>
      </div>
      <div class="form-group">
        <label>Mobile(*): </label>
        <input type="text" id="mobile" name="mobile" autocomplete="off" class="form-control" placeholder="0123456789" ">
        <span class="error"> <?php echo $mobileErr;?></span>
      </div>
      <div class="form-group">
        <label>Comment: </label> 
        <button onclick="openmicrophone();">
          <i class="fas fa-microphone"></i>
        </button>
        <script>
            window.SpeechRecognition = window.webkitSpeechRecognition || window.SpeechRecognition;
            let finalTranscript = '';
            let recognition = new window.SpeechRecognition();

            recognition.interimResults = true;
            recognition.maxAlternatives = 10;
            recognition.continuous = true;
            recognition.lang = 'ja';
            recognition.onresult = (event) => {
              let interimTranscript = '';
              for (let i = event.resultIndex, len = event.results.length; i < len; i++) {
                let transcript = event.results[i][0].transcript;
                if (event.results[i].isFinal) {
                  finalTranscript += transcript;
                } else {
                  interimTranscript += transcript;
                }
              }

              document.querySelector('textarea').innerHTML = finalTranscript + interimTranscript;
            }
            recognition.start();
        </script>
        <textarea id="comment" name="comment" class="form-control" rows="5"></textarea>
      </div>
      <div>
        <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
      </div>
</form>
<?php 
  if($userErr == "" && $emailErr =="" && $mobileErr ==""){
    $con = mysqli_connect('localhost','root','','myuserinfodata');
    if($con){
    }else{
      die("No connect");
    }

    $query = "insert into userdata(user,email,mobile,comment) values('$user','$email','$mobile','$comment')";

    mysqli_query($con, $query);
    mysqli_close($con);
  }
?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>