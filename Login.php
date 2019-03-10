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
      echo "<h4>Invalid username or password<h4>";
    }
  }
 ?>

<html>
<head>
  <title="LOGIN FORM"></title>
  <style>
              body{
              	background-image: url(https://weblizar.com/wp-content/uploads/2018/08/background.jpg);
                background-repeat: no-repeat;
                background-size: cover;
              }

              h1{
              	text-align: center;
              	font_size:50px;
                font-style: oblique;
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
              input[type=text]{
                border-radius: 4px;
              	border: 1px solid blue;
                font-style: italic;
                font-family: inherit;
              }
              input[type=password]{
                border-radius: 4px;
              	border: 1px solid blue;
                font-style: italic;
                font-family: inherit;
              }
              input[type=submit]{
              	width: 100px;
              	height: 40px;
              	background:blue;
              	color:white;
                float: center;
                border-radius: 10px;
              }
              input[type=submit]:hover {
                background-color: lightblue;
              }
  </style>

</head>
<body><br>
  <h1><u>LOGIN FORM</u></h1><br>
<form action="<?php $_PHP_SELF ?>" method="post">
  Username:   <input type="text" name="username" placeholder="Enter Username"><br><br>
  Password:   <input type="password" name="password" placeholder="Enter Password"><br><br>
  <input type="submit" value="Login">

</form>
</body>
</html>

