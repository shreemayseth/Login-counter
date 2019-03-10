<?php
require "connect.php";

if (isset($_POST["username"])|| isset($_POST["password"])){
  $username = $_POST["username"];
  $password = $_POST["password"];

  $sql = "SELECT * from counter where username='".$username."' AND password='".$password."'";

  $result = $conn->query($sql);
    if (($result->num_rows)==1) {

        $sql2="UPDATE counter SET count=count+1 where username='".$username."' AND password='".$password."'";
        $result2 = $conn->query($sql2);
        echo "<h1><center>Thank you!</center></h1>";
        $sql3="SELECT count from counter where username='".$username."' AND password='".$password."'";
        $result3 = $conn->query($sql3);
        while($row = $result3->fetch_assoc()) {
                $count = $row['count'];
                echo "<center><h3>$username"." you have logged in ". $count . " times</h3></center>";
      }
    exit();
    }
    else {
      echo "Invalid username or password";
    }
  }
 ?>
<html>
<head>
  <title="LOGIN FORM"></title>
  <style>
              body{
              	background-color: lightgreen;

              }

              h1{
              	text-align: center;
              	font_size:50px;
              }
              form{
              	margin: 20px auto;
              	width:320px;
              	color: blue;
              }
              input{
              	padding: 10px;
              	font-size: inherit;
              }
              input[type="text"]{

              	border: 1px solid blue;
              }
              input[type="password"]{

              	border: 1px solid blue;
              }
              input[type="submit"]{
              	width: 80px;
              	height: 40px;
              	background:blue;
              	color:white;
              }
  </style>

</head>
<body>
  <h1>Login Form</h1><br>
<form action="<?php $_PHP_SELF ?>" method="post">
  Username:   <input type="text" name="username"><br><br>
  Password:   <input type="password" name="password"><br><br>
  <input type="submit" value="Login">

</form>
</body>
</html>
