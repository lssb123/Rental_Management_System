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

    <center><div class="msg" style="width:100px; height:100px;"></div></center>
<?php 
session_start(); 
include './db_connect.php' ?>
<?php 
$username = $_SESSION['username'];
// echo $username;
$sql = "SELECT * FROM tenants WHERE username='$username'";
$check = mysqli_query($conn, $sql) or die ("err $username " . mysqli_error ($conn));
$check2 = mysqli_num_rows($check);
if ($check2 != 0) {
    while ($row = mysqli_fetch_assoc($check)) {
        $userid = $row['username']; 
        $userfirstname = $row['firstname'];
        $email = $row['email'];
        $houseid=$row['house_id'];
        
        // repeat for all db columns you want
    }
    // echo $userid;
    // echo $userfirstname;
    // echo $houseid."<br>";
    $r = "SELECT * FROM houses WHERE id='$houseid'";
    $check3 = mysqli_query($conn, $r) or die ("err $houseid " . mysqli_error ($conn));
    $check4 = mysqli_num_rows($check3);
    if($check4!=0) {
        while($row1 = mysqli_fetch_assoc($check3)){
            $houseno = $row1['house_no'];
            $description = $row1['description'];
        }
    }
    // echo $houseno. " ". $description;
}


            // $username = $_SESSION['username'];
            // echo $username;
            // $sql = "SELECT * FROM tenants WHERE username = $username";
            // $result = mysqli_query($conn, $sql);
            // $row = mysqli_fetch_assoc($result);

            // if ($row) {
            //     // Validate and sanitize input data
            //     $new_name = mysqli_real_escape_string($conn, $_POST['name']);
            //     $new_pass = mysqli_real_escape_string($conn, $_POST['pass']);

            //     // Update user profile information
            //     $sql = "UPDATE tenants SET username = '$new_name', pass = '$new_email' WHERE username = $username";
            //     mysqli_query($conn, $sql);

            //     // Display success message
            //     echo "<script>alert('Profile updated successfully.')</script>";
            // } else {
            //     // Display error message
            //     echo "<script>alert('Invalid user details.')</script>";
            // }
 ?>

<!-- <?php 
include 'db_connect.php'; 
if(isset($_GET['house_id'])){
$qry = $conn->query("SELECT * FROM tenants where house_id= ".$_GET['house_id']);
foreach($qry->fetch_array() as $k => $val){
	$$k=$val;
}
}
?> -->

<div class="profile-box">
  <div class="profile-heading">
    <h2><?php echo $userfirstname; ?></h2>
  </div>
  <div class="profile-details">
    <div class="profile-label">User Id:</div>
    <div class="profile-value"><?php echo $userid; ?></div>
    <div class="profile-label">House No.</div>
    <div class="profile-value"><?php echo $houseno; ?></div>
    <div class="profile-label">Description</div>
    <div class="profile-value"><?php echo $description; ?></div>
    <div class="profile-label">E-mail</div>
    <div class="profile-value last"><?php echo $email; ?></div>
    <a  href="update_profile.php" class="hello btn">Edit</a>
  </div>
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
<!-- <script>
const editButton = document.querySelector('.edit-button');

editButton.addEventListener('click', function() {
  const confirmEdit = confirm('Are you sure you want to edit?');
  
  if (confirmEdit) {
    const alertBox = document.createElement('div');
    alertBox.classList.add('alert-box');
    alertBox.innerHTML = `
        <h1>Update Profile</h1>
        <form action="" method="POST">
            <label for="username">User Name:</label>
            <input type="text" name="username" required><br><br>
            <label for="name">Name:</label>
            <input type="text" name="name" required><br><br>
            <label for="pass">Password:</label>
            <input type="password" name="pass" required><br><br>
            <input type="submit" value="Update Profile">
        </form>

    `;
    document.body.appendChild(alertBox);

}
});

</script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
</html>