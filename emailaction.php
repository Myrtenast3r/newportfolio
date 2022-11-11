<?php declare(strict_types=1); //strict requirement

 //declare variables and set to empty values
 //form variables
 $name = $visitor_email = $message = "";
 //email variables
 $email_from = $email_subject = $email_body = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $visitor_email = test_input($_POST["email"]);
  $message = test_input($_POST["message"]);
}

function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

//secure against email injection
function isInjected($str){
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

echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $message;
echo "<br>";


// check if is infected
/*if (isInjected($visitor_email, $email_from)) {
	echo "Bad email value!";
	exit;
}

 $email_from = "petteri.rasanen2@gmail.com";
 $email_subject = "New form submission on portfolio page";
 $email_body = "You have received a new message from $name: \n". "Message:\n $message".

 $to = "petteri.rasanen2@gmail.com";
 $headers = "From: $email_from \r\n";
 $headers .= "Reply to: $visitor_email \r\n";
 mail($to, $email_subject, $email_body, $headers);*/


?>