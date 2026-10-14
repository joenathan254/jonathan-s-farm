<?php

include "db.php";

$fullname=$_POST['fullname'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$visitors=$_POST['visitors'];
$visit_date=$_POST['visit_date'];
$visit_time=$_POST['visit_time'];
$purpose=$_POST['purpose'];
$notes=$_POST['notes'];

$sql="INSERT INTO farm_visits
(fullname,phone,email,visitors,visit_date,visit_time,purpose,notes)

VALUES

('$fullname','$phone','$email','$visitors','$visit_date','$visit_time','$purpose','$notes')";

if(mysqli_query($conn,$sql)){

echo "<h2>Booking Successful</h2>";

echo "<p>Thank you <b>$fullname</b>.</p>";

echo "<p>Your farm visit request has been received.</p>";

echo "<a href='home.php'>Back Home</a>";

}else{

echo mysqli_error($conn);

}

?>