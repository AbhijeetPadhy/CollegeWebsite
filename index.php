<?php
	function redirect_to($url)
	{
		header('Location: '.$url);
	}
	ini_set('display_errors', 1 );
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	session_start();

?>
<html>
<head>
<style>

body{
	background-image:url("chess.jpg");
}

table{
	color:white;
}


div.transbox {
    margin: 5 px;
    background-color: white;
    border: 1px solid black;
    opacity: 0.4;
    border-radius: 25px;
}

div.transbox p {
    margin: 1%;
    font-weight: bold;
    color: red;
    font-size:1000 px;
    text-align: center;
 }
nav ul ul {
	display: none;
}

nav ul li:hover > ul {
		display: block;
	} 



nav ul {
	background: #efefef; 
	background: linear-gradient(top, #efefef 0%, #bbbbbb 100%);  
	background: -moz-linear-gradient(top, #efefef 0%, #bbbbbb 100%); 
	background: -webkit-linear-gradient(top, #efefef 0%,#bbbbbb 100%); 
	box-shadow: 0px 0px 9px rgba(0,0,0,0.15);
	padding: 0 5px;
	border-radius: 10px;  
	list-style: none;
	position: relative;
	display: inline-table;
	width:100%;
}
	nav ul:after {
		content: ""; clear: both; display: block;
	}

nav ul li {
	float: left;
}
	nav ul li:hover {
		background: #4b545f;
		background: linear-gradient(top, #4f5964 0%, #5f6975 40%);
		background: -moz-linear-gradient(top, #4f5964 0%, #5f6975 40%);
		background: -webkit-linear-gradient(top, #4f5964 0%,#5f6975 40%);
	}
		nav ul li:hover a {
			color: #fff;
		}
	
	nav ul li a {
		display: block; padding: 10px 10px;
		color: #757575; text-decoration: none;
	}


nav ul ul {
	background: #5f6975; border-radius: 0px; padding: 0;
	position: absolute; top: 100%;
}
	nav ul ul li {
		float: none; 
		border-top: 0px solid #6b727c;
		border-bottom: 1px solid #575f6a;
		position: relative;
	}
		nav ul ul li a {
			padding: 10px 10px;
			color: #fff;
		}	
			nav ul ul li a:hover {
				background: #4b545f;
			}

nav ul ul ul {
	position: absolute; left: 100%; top:0;
}



</style>
</head>
<body bgcolor="black">

<nav>
<ul>
  <li><a class="active" href="http://localhost/lib/index.php#home">Home</a></li>
  <li><a href="http://localhost/lib/history.html">History</a></li>
  <li><a href="http://localhost/lib/aboutus.html">About Us</a></li>
  <li><a href="http://localhost/lib/department.html">Department</a>
	<ul>
	<li><a href="#news">BIO TECHNOLOGY</a></li>
  	<li><a href="#contact">CHEMICAL ENGINEERING</a></li>
	<li><a href="#news">ELECTRONICS AND COMMUNICATION</a></li>
 	 <li><a href="#contact">iNFORMATION TECHNOLOGY</a></li>
	</li></ul>
  <li><a href="http://localhost/lib/contact.html">Contact</a></li>
  <li><a href="#">Register</a>
	<ul>   	
	<li><a href="http://localhost/lib/admin_form.php">Admin </a></li>
	<li><a href="http://localhost/lib/stu_form.php">Student </a></li>
   	</li></ul>
<?php
	if(isset($_SESSION["email"])){
		echo "<li><a href='#'>".$_SESSION['email']."</a></li>";
		echo "<li><a href='logout.php'>LOG OUT</a></li>";
	}
	else
  		echo '<li><a href="signin1.php">Log In</a></li>';
?>
	<!--<ul>   	
	<li><a href="#about">Teacher </a></li>
	<li><a href="#about">Student </a></li>
   	</ul>-->
</ul>
</nav>


<!--<div class="background">
  <div class="transbox">-->
    <font size="5" color="white" align="center"><p><h1><u>National Institute of Technology , Durgapur</u></h1></p></font>
  <!--</div>
</div>-->

<font color="white" >
<?php

// Return date/time info of a timestamp; then format the output
$mydate=getdate(date("U"));
echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";

?>  

</font>

<canvas id="canvas" width="200" height="200" style="float:right"> </canvas>

<script>
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1000);

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, 'red');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, 'black');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = 'red';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}
</script>

<form method="POST" action="register.php">

<!--<img id="ig" src="8.jpg" align="middle" alt="look"/>-->
<table border="1">
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Register</th>
	</tr>

<?php
	

	if(isset($_SESSION["type"]) && $_SESSION["type"] == "admin"){
		$servername = "localhost";
		$username = "abhijeet";
		$password = "abhijeet";
		$dbname = "project";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
	
		$sql = "select * from mytable where registered = 0;";
		echo $sql;
		$result=$conn->query($sql);
		$no=0;
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){
				$no++;
				echo "
						<tr>
							<td>".$row['fname']." ".$row['lname']."</td>
							<td>".$row['email']."</td>
							<td><input type='checkbox' id='yes' value='".$row['email']."' name='toRegister[]'/></td>
						</tr>";
			}
		}
?>
		<script>
			function ret_yes(){
			var reg=getElementbyId("yes").value;
			return reg;
			}
		</script>
<?php
		//if (ret_yes() == 1){
		//	$row['registered']=1;
		//}	
	}
?>
</table>
<input type="submit">
<input type="hidden" name="no" value="<?php echo $no;?>">
</form>
</body>
</html>