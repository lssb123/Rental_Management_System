<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: home_page.php");
    exit;
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
</head>
<body>
    <header>
        <div class="nav container">
            <a href="user_homepage.php" class="logo"><i class='bx bx-home'> </i>Dream House</a>
            <input type="checkbox" name="" id="menu">   
            <label for="menu"> <i class="bx bx-menu" id="menu-icon"></i></label>
            <ul class="navbar">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="complaints.php">Complaints</a></li>
                <li><a href="admin_msg.php">Msg from admin</a></li>
                <li><a href="#properties">Properties</a></li>
                <li><a href="profile.php">Profile</a></li>
            </ul>
            <a href="ajax.php?action=logout" class="btn">Log out</a>
        </div>
    </header>

    <section class="home container" id="home">
        <div class="home-text">
                <h1>Find Your Next<br>Perfect Place To<br>Live.</h1>
        </div>
    </section>
    
    <section class="about container" id="about">
        <div class="about-img">
            <img src="about.jpg" height="350px" alt="About Us">
        </div>
        <div class="about-text">
            <span>About Us</span>
            <h2>We Provide The Best <br>Room For You!!</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos recusandae, cumque eius consectetur omnis voluptatum.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore atque itaque magnam blanditiis esse dolorem.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, magni!</p>
            <a href="#" class="btn">Learn More</a>
        </div>
    </section>

    <section class="sales container" id="sales">
        <div class="box">
            <i class="bx bx-user"></i>
            <h3>Make your Dream True</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, eum.</p>
        </div>

        <div class="box">
            <i class="bx bx-desktop"></i>
            <h3>Lorem ipsum dolor sit amet.</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, eum.</p>
        </div>

        <div class="box">
            <i class="bx bx-home-alt"></i>
            <h3>Enjoy Your New Home</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, eum.</p>
        </div>
    </section>

    <section class="properties container" id="properties">
        <div class="heading">
            <span>Recent</span>
            <h2>Our Featured Properties</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, consequuntur!</p>
        </div>
        <div class="properties-container container">

            <div class="box">
                <img src="bedroom.jpg" alt="">
                <h3>Bed Room</h3>
                <div class="content">
                    <div class="text">
                        <h3>Lorem ipsum dolor sit amet.</h3>
                        <p>Lorem, ipsum.</p>
                    </div>
                    <div class="icon">
                        <i class="bx bx-bed" ></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <img src="kitchen.jpg" alt="">
                <h3>Kitchen</h3>
                <div class="content">
                    <div class="text">
                        <h3>Lorem ipsum dolor sit amet.</h3>
                        <p>Lorem, ipsum.</p>
                    </div>
                    <div class="icon">
                        <i class="bx bx-cookie" ></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <img src="bathroom.jpg" alt="">
                <h3>Bath Room</h3>
                <div class="content">
                    <div class="text">
                        <h3>Lorem ipsum dolor sit amet.</h3>
                        <p>Lorem, ipsum.</p>
                    </div>
                    <div class="icon">
                        <i class="bx bx-bath" ></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <img src="tv hall.jpg" alt="">
                <h3>TV hall</h3>
                <div class="content">
                    <div class="text">
                        <h3>Lorem ipsum dolor sit amet.</h3>
                        <p>Lorem, ipsum.</p>
                    </div>
                    <div class="icon">
                        <i class="bx bx-tv" ></i>
                    </div>
                </div>
            </div>

        </div>
    </section>

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