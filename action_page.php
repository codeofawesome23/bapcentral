<?php
if(!isset($_POST['submit'])){
	echo "error; must submit form.";
}

$name = $_POST['customer'];
$email = $_POST['cust_email'];
$phone = $_POST['xxx_xxx-xxxx'];
$date = $_POST['shoot_date'];
$time = $_POST['shoot_time'];
$duration = $_POST['Dura'];
$location = $_POST['locations'];
$type = $_POST['Media_Type'];
$cameras = $_POST['Cams'];
$crew = $_POST['Crew_mems'];
$comments = $_POST['extra_comments'];

if(IsInjected($email)){
	echo "Invalid email.";
	exit;
}

$email_from = 'Zack@taylorshots.com';
$email_subject = "New Customer Sign Up!";
$email_body = "You have a shoot request from $name.\n".
    "Here are the details:\n 
    Customer Name: $name\n
    Customer Email: $email\n
    Customer Phone Number: $phone\n
    Preferred Date: $date\n
    Preferred Time: $time\n
    Duration: $duration\n
    Location: $location\n
    Shoot Type: $type\n
    Number of Cameras: $cameras\n
    Crew Required: $crew\n
    Additional Comments: $comments\n".

//echo "$email_body";

$to = "Zack@taylorshots.com";//<== update the email address
//Send the email!
mail($to,$email_subject,$email_body);


function IsInjected($str){
	$injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
?>
</body>
</html>