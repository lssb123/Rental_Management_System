<?php      
session_start();
    include('./db_connect.php');  
    $complaint = $_POST['complaint'];  
?>

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
    // echo $complaint;
    if($complaint=="" || $complaint==NULL){
        echo "<script type='text/javascript'>alert('Complaint Box Should not be empty'); window.location='complaints.php'</script>";
    }
    else{
    $f = "INSERT INTO complaints (username,house_no,complaint) VALUES ('$username','$houseno','$complaint')";
    $f1 = mysqli_query($conn,$f);
    if ($f1) {
        echo "<script type='text/javascript'>alert('Message Successfully sent to admin'); window.location='complaints.php'</script>";
      } else {
        echo "<script type='text/javascript'>alert('OOPS! Message not sent'); window.location='complaints.php'</script>";
      }
}
}

 ?>