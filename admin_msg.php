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
    table {
        border-collapse: collapse;
        width: 100%;
        display: flex;
        align-items:center;
        justify-content: center;
        margin-bottom: 30px;
    }
    th, td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #4CAF50;
        color: white;
    }
    tr:hover {
        background-color: #f5f5f5;
    }
    p {
        margin-bottom: 65px;

    }
    .hi {
        margin-top: 70px;
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


    <!-- <section class="complaints container">
        <div class="complaints">
        <h1>For any complaints type here ....</h1><br>
        <form action="compaction.php" name="comp1" method="POST">
        <textarea name="complaint" id="complaint" cols="140" rows="10"></textarea><br><br>
        <input type="submit" class="btn">
        </form>
        </div>
</section> -->
<center><div class="msg" style="width:100px; height:100px;"></div></center>
<?php     
    session_start();
    include('./db_connect.php');   
?>
<?php 
$username = $_SESSION['username'];
// echo $username;
$sql = "SELECT * FROM messages WHERE username='$username'";
$check = mysqli_query($conn, $sql) or die ("err $username " . mysqli_error ($conn));
$check2 = mysqli_num_rows($check);
if($check2 !=0){

    echo "<center><table>";
    echo "<tr><th>User Name</th><th>Message</th><th>Date & Time</th></tr>";
    while ($row = mysqli_fetch_assoc($check)) {
        echo "<tr><td>" . $row["username"] . "</td><td>" . $row["msg"] . "</td><td>" . $row["date_time"] . "</td></tr>";
    }
    echo "</table></center>";

    // while ($row = mysqli_fetch_assoc($check)) {
    //     // $data = $row['username']." ".$row['msg']." ".$row['date_time']."<br>";
    //     echo "<tbody>
    //         <tr>
    //             <td>$row['username']</td>
    //             <td>$row['msg']</td>
    //             <td>$row['date_time']</td>
    //         </tr>
    //     </tbody>
    // </table>";
    //     echo "<br>";
    //     // $data="";
    //     // repeat for all db columns you want
    // }
}
else {
    echo "<center><p><h1>no messages from admin</h1></p></center>";
}
?>





    <section class="footer ">
        <div class="footer-container container hi">
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




</head>