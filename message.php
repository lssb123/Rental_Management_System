<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>List of Tenants</b>
						<!-- <span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_tenant">
					<i class="fa fa-plus"></i> New Tenant
				</a></span> -->
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">User Name</th>
									<th class="">First Name</th>
									<th class="">Email</th>
								</tr>
							</thead>
                            <tbody>
								<?php 
								$i = 1;
								$tenant = $conn->query("SELECT * FROM tenants;");
								while($row=$tenant->fetch_assoc()):
									// $sno = $row['sno'];
                                    // $username = $row['username'];
                                    // $house_no = $row['house_no'];
                                    // $complaint = $row['complaint'];
								?>
								<tr>
									<td class="text-center"><p><b><?php echo $i++ ?></b></p></td>
									<td>
										<p><b><input type="checkbox" id="<?php echo $row['username']; ?>" /> <?php echo $row['username'] ?></b></p>
									</td>
                                    <td class="">
										 <p> <b><?php echo $row['firstname'] ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['email'] ?></b></p>
									</td>
								</tr>
								<?php endwhile; ?>
                                </tbody>
                                </table>
                                <textarea name="" id="msg" cols="70" rows="3"></textarea>
                                <button class="btn btn-sm btn-outline-success" id='msg1' name='button1' onclick='buttonmsg()'>Message</button>

					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>
<script>
    
    const msgbox=document.getElementById('msg1');
    function buttonmsg() {
        const checkboxList = document.querySelectorAll('input[type="checkbox"]');
        var textarea = document.getElementById("msg");
        var value = textarea.value;
        let l=[];
        if(value=="" || value=="NULL") {
            alert('Message Box Should not be empty');
        }
        console.log(value);
        
        checkboxList.forEach(checkbox => {
            if (checkbox.checked) {
            const userId = checkbox.id;
                l.push(userId);
                // console.log(l);
            }
            // console.log(l);
        });
        // console.log(l);
		// create a new `Date` object
		var today = new Date();
		
		// get the date and time
		var now = today.toLocaleString();
		// console.log(now);
        const data={
            persons:l,
            msg:value,
			time:now 
        }
        // console.log(data.persons[0]);
        start_load();
		$.ajax({
            
			url:'ajax.php?action=msg_tenant',
			method:'POST',
			data:data,
			success:function(resp){
				if(resp==1){
					alert_toast("Message successfully sent",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
    }
//     const checkboxList = document.querySelectorAll('input[type="checkbox"]');
//     // console.log(checkboxList)
//  let l=[];
// checkboxList.forEach(checkbox => {
//   checkbox.addEventListener('click', () => {
//     if (checkbox.checked) {
//       const userId = checkbox.id;
//         l.push(userId);
//         // console.log(l);
//     }
//     else {
//         let c=0;
//         const userId = checkbox.id;
//         for(let i=0;i<l.length;i++) {
//             if(l[i]==userId){
//                 c+=1;
//             }
//         }
//         if(c==1){
//             let newA = [];
//             for(let i=0;i<l.length;i++) {
//                 if(l[i]!=userId) {
//                     newA.push(l[i]);
//                 }
//             }
//             l=newA;
//         }
//         else {
//             l.push(userId);
//         }
//     }
//     console.log(l);
//   });
 
// });
// const text = document.getElementById('msg');
// x="";
// text.forEach(checkbox => {
//   textarea.addEventListener('click', () => {
//     x+=
//   })
// });

// 

</script>


<script>
//     var btn = document.getElementById('clickMe');
// // console.log(btn);
// btn.addEventListener('click', ()=> {
//     alert('The button has been clicked!');
// });

// function buttonmsg(){

// alert(“The button has been clicked!”);

// }




    // function buttonmsg() {
    // var textarea = document.getElementById("msg");
    // var value = textarea.value;
    // console.log(value);
    // if(value=="" || value=="NULL") {
    //     alert('Message Box Should not be empty');
    //     //  window.location='message.php';
    // }
    // else {
    //     }
   
    // }
</script>

<!-- 
    // console.log(l);
    // else {
    
    // <?php 
    //     for($j=0;$j<l.length;$j++){
    //     $i = 1;
    //     echo "<script>alert("$l[j]")</script>";
    //     $tenant = $conn->query("SELECT * FROM tenants where username = ".$l[j]);
    //     echo "<script type='text/javascript'>alert($tenant); window.location='complaints.php'</script>";


    //     // $check3 = mysqli_query($conn, $tenant) or die ("err $l[j] " . mysqli_error ($conn));
    //     $check4 = mysqli_num_rows($check3);
    //     if($check4!=0) {
    //         while($row1 = mysqli_fetch_assoc($check3)){
    //             $email = $row1['email'];
    //         }
    //     }
    //     $f = "INSERT INTO message (username,email,msg) VALUES ('$l[j]','$email','$value')";
    //     $f1 = mysqli_query($conn,$f);
    //     if ($f1) {
    //         echo "<script type='text/javascript'>alert('Message Successfully sent to admin'); window.location='complaints.php'</script>";
    //       } else {
    //         echo "<script type='text/javascript'>alert('OOPS! Message not sent'); window.location='complaints.php'</script>";
    //       }
    //     } 
    // ?>
//     }
// } -->
