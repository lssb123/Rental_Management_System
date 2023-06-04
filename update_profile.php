<?php
session_start(); 
include './db_connect.php';
if(isset($_GET['house_id'])){
    $qry = $conn->query("SELECT * FROM tenants where house_id= ".$_GET['house_id']);
    foreach($qry->fetch_array() as $k => $val){
        $$k=$val;
    }
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="frontstyles.css">
    <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <title>House Rental Collection Website</title>
    <style>
        .profile-box {
        border: 1px solid #ccc;
        padding: 20px;
        max-width: 500px;
        margin: 0 auto;
        margin-bottom: 30px;
        }

        .profile-heading {
        text-align: center;
        }

        .profile-details {
        margin-top: 20px;
        }

        .profile-label {
        font-weight: bold;
        margin-bottom: 5px;
        }

        .profile-value {
        margin-bottom: 10px;
        }

        .alert-box {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border: 1px solid #ccc;
        background-color: #fff;
        padding: 20px;
        z-index: 9999;
        }

        .alert-box input[type="text"] {
        display: block;
        margin-bottom: 10px;
        }

        .alert-box button[type="submit"] {
        margin-top: 10px;
        }
        .hello {
            margin-top: 100px;
        margin-bottom: 50px;
        display:flex;
        align-items: center;
        justify-content: center;        
        }
        .hi {
            margin-bottom: 20px;
        }

    </style>
    </head>
<body>

    <header>
        <div class="nav container">
            <a href="user_homepage.php" class="logo"><i class='bx bx-home'> </i>Dream House</a>
            <input type="checkbox" name="" id="menu">   
            <label for="menu"> <i class="bx bx-menu" id="menu-icon"></i></label>
            <ul class="navbar">
                <li><a href="user_homepage.php">Home</a></li>
                <li><a href="user_homepage.php">About</a></li>
                <li><a href="complaints.php">Complaints</a></li>
                <li><a href="admin_msg.php">Msg from admin</a></li>
                <li><a href="user_homepage.php">Properties</a></li>
                <li><a href="profile.php">Profile</a></li>
            </ul>
            <a href="ajax.php?action=logout" class="btn">Log out</a>
        </div>
    </header>




    <div class="container hello">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <h1 class="hi">Update Profile</h1>
		<!-- <label for="username">User Name:</label>
		<input type="text" name="username" value="" required><br><br> -->
		<label for="password">Password:</label>&nbsp;&nbsp;
		<input type="password" name="password" value="<?php echo isset($pass)? $pass :'' ?>" required><br><br>
		<label for="email">Email:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="email" name="email" value="<?php echo isset($email)? $email :'' ?>" required><br><br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" class="btn" value="Update Profile">
	</form>
    </div>



 



    <section class="footer">
        <div class="footer-container container">
            <h2>Dream House</h2>
            <div class="footer-box">
                <h3>Quick Links</h3>
                <a href="#">Agency</a>
                <a href="#">Building</a>
                <a href="#">Rates</a>
            </div>
            <div class="footer-box">
                <h3>Location</h3>
                <a href="#">VSKP</a>
                <a href="#">VIJ</a>
                <a href="#">RJY</a>
            </div>
            <div class="footer-box">
                <h3>Contact</h3>
                <a href="#">+91 (0)800 123 4567</a>
                <a href="#">your@gmail.com</a>
                <div class="social">
                    <a href="#"><i class="bx bxl-facebook"></i></a>
                    <a href="#"><i class="bx bxl-twitter"></i></a>
                    <a href="#"><i class="bx bxl-instagram"></i></a>
                </div>
            </div>
        </div>
    </section>

    <div class="copyright">
        <p>@ All Rights are Reserved.</p>
    </div>
</body>
</html>
<?php
$username = $_SESSION['username'];



$sql1 = "SELECT * FROM tenants WHERE username='$username'";
$check = mysqli_query($conn, $sql1) or die ("err $username " . mysqli_error ($conn));
$check2 = mysqli_num_rows($check);
if ($check2 != 0) {
    while ($row = mysqli_fetch_assoc($check)) {
        $houseid=$row['house_id'];
        $pass = $row['password'];
        $email = $row['email'];
    }
}
// echo $houseid;
// echo $pass;


$sql = "SELECT * FROM tenants WHERE house_id = $houseid";
$result = mysqli_query($conn, $sql) or die ("err $houseid " . mysqli_error ($conn));
$row = mysqli_fetch_assoc($result);

if ($row) {
	// Validate and sanitize input data
	$new_pass = mysqli_real_escape_string($conn, $_POST['password']);
	$new_email = mysqli_real_escape_string($conn, $_POST['email']);

    if (($new_pass==""||$new_pass==null)||($new_email==""||$new_email==null)){
        return false;
    }

	// Update user profile information
	$sql = "UPDATE tenants SET password = '$new_pass',  email = '$new_email' WHERE house_id = $houseid";
	$r=mysqli_query($conn, $sql);

	// Display success message
    if($r){
	echo "<script>alert('Profile updated successfully.');</script>";
    }
} else {
	// Display error message
	echo "Invalid user ID.";
}

?>