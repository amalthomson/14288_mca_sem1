<?php 
include 'database_connection.php';
session_start();
if($_SESSION['login_admin']==""){
    header("location:index.php");
}
$su_id=$_GET['s_id'];

$result=mysqli_query($con,"SELECT * FROM `services_db` join service_type on services_db.service_type=service_type.type_id where service_type='$su_id'");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="stylesheet.css" rel="stylesheet">
    <link rel="icon" href="favicon.png" type="image/png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Details</title>
    <style>
        h3{
            font-family: "Raleway", Helvetica, sans-serif;
        }
        a{
          text-decoration:none;
        }
        .card-detail{
            background-color: rgb(240, 74, 56);
            font-family: verdana;
            width:350px;
            padding:3px;
            color:white;
        }
        .card-detail-two{
            font-family: verdana;
            width:350px;
            margin-top:-30px;
            padding:3px;
            background:white;
        }
        .blah{
            margin-right:20px;
        }
        </style>
</head>
<body>
<?php include 'side.php';?>


<div class="common-div">    
<h3>Service Detail</h3>
<div id="block_container">
<?php 
            $count=0;
            while ($row = mysqli_fetch_assoc($result)) {  ?>
            
<div class="blah">
<div class="card-detail">
<h3 style="margin-left:10px;"><?php echo $row['service_name'];?></h3>
<p style="margin-top:-12px; margin-left:10px;"><?php echo $row['service_price'];?></p>
</div>
<div class="card-detail-two">
<p style="margin-left:10px; margin-bottom:-20px;">Type: <?php echo $row['type'];?></p><br>
<p style="margin-bottom:-5px; margin-left:10px;">Description: <?php echo $row['service_desc'];?></p><br>
<a href="edit_service.php?s_id=<?php echo $row['services_id'];?>"><input type="button" value="Edit" name="btn_add"></a
><a href="delete_service.php?s_id=<?php echo $row['services_id'];?>"><input type="reset" value="Delete"></a>
</div></div>
<?php } ?>
</div></div>
</body>
</html>