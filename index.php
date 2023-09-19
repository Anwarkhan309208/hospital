<?php 
include('../admin panel/config.php');
session_start();
if(isset($_SESSION["hos_id"])){

	$id = $_SESSION["hos_id"];
	
	$fetch = "SELECT * FROM `tbl_users` WHERE `id` = $id";
	$res = mysqli_query($conn, $fetch);
	$user = mysqli_fetch_array($res);
}

if(isset($_GET['logout'])){
	$abc = $_GET['user_id'];
	session_destroy();
	header('location:login.php');
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">
 <style>

@import url('https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap');

*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	list-style: none;
	font-family: 'Jost', sans-serif;
}

.navbar{
	
	width: 100%;
	height: 60px;
	display: flex;
	justify-content: space-between;
	align-items: center;
	padding: 0 80px;
    
}

.navbar .logo a{
	display: block;
	text-decoration: none;
	color: #fff;
	font-weight: 700;
	letter-spacing: 2px;
	font-size: 25px;
	text-transform: uppercase;
}

.navbar .nav_right > ul{
	display: flex;
	align-items: center;
}

.navbar .nav_right ul li.nr_li{
	margin-left: 25px;
	cursor: pointer;
	color: #fff;
	font-size: 20px;
	position: relative;
}

.navbar .nav_right ul li.nr_li:hover {
    color: #cefffc;
}

.navbar .nav_right ul li img{
	width: 35px;
	vertical-align: middle;
}

.navbar .dd_menu {
    position: absolute;
    right: -25px;
    top: 47px;
    display: flex;
    background: #fff;
    border-radius: 15px;
    box-shadow: 0px 0px 3px rgba(0,0,0,0.25);
    display: none;
}

.navbar .dd_menu .dd_left{
	background: #74ded8;
	padding: 15px 20px;
	border-top-left-radius: 15px;
	border-bottom-left-radius: 15px;
}

.navbar .dd_menu .dd_left li{
	color: #fff;
}

.navbar .dd_menu .dd_right{
	padding: 15px 20px;
}

.navbar .dd_menu li{
	margin-bottom: 10px;
	color: #868686;
}

.navbar .dd_menu:before{
	content: "";
	position: absolute;
	top: -20px;
	right: 30px;
	border: 10px solid;
	border-color: transparent transparent #fff transparent;
}

.navbar .dd_main.active .dd_menu{
	display: flex;
}
 </style>
    <title>VAX HEAVEN</title>
</head>
<body>
<header class="header">

<a href="index.php" class="logo"> <strong>VAX</strong>HEAVEN </a>

<nav class="navbar">
    <a href="index.php">home</a>
    <a href="#about">about</a>
    <a href="#contact">contact</a>
    <a href="#doctors">doctors</a>
        <a href="appoinment.php">appointment</a>
	<?php 
			if(!isset($_SESSION["hos_id"])){
	?>
    <a href="signup.php">signup</a>
    <a href="login.php">login</a>
<?php 
}
?>
    <div class="nav_right">
		
		<ul>
			<li class="nr_li dd_main">
				<?php 
			if(isset($_SESSION["hos_id"])){
				?>       
					<div class="user">
						<a href="edit_profile.php"><?php echo @$user['username']?></a>
                    <img src="image/<?php echo $user['image']?>" alt="profile-img" style="border-radius: 50%; width: 50px; height: 50px;">
                       </div>
					<?php 
				}
				?>
			
					<div class="dd_menu">
						<div class="dd_left"><br>
						
						</div>
						<div class="dd_right">
							<ul>
								<a href="child.php"><li>Child Form</li></a>
								<a href="appoinment.php"><li>Appointment_Form</li></a>
								<a href="vax_book.php"><li>Vaccine Book</li></a>
								<a href="vax_report.php"><li>VaccineReport</li></a>
						
								<a href="edit_profile.php?id=<?php echo $user['id']?>"><li>EditProfile</li></a>
								<a href="nav.php?logout=<?php echo $user['id']; ?>"><li>logout</li></a>
							</ul>
						</div>
					</div>
				</li>
				<?php 
			if(isset($_SESSION["hos_id"])){
			?>
				<li class="nr_li">
					<a href="#Contact Us"><i class="fas fa-envelope-open-text"></i></a>
				</li>
				<?php
			}
			?>
			</ul>
		</div>
</nav>
<script src="js/script.js"></script>
<div id="menu-btn" class="fas fa-bars"></div>

</header>
<script>
	var dd_main = document.querySelector(".dd_main");

	dd_main.addEventListener("click", function(){
		this.classList.toggle("active");
	})
</script>
</body>
</html>