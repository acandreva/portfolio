<?php

/* Set e-mail recipient */ 
$myemail = "ali.cand@yahoo.com";

/* Check all form inputs using check_input function */ 
$fname = check_input($_POST['fname']); 
$lname = check_input($_POST['lname']);
$name = "$fname " . "$lname";
$email = check_input($_POST['email']);
$message = check_input($_POST['message']);
$subject = "Form from portfolio site";

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
show_error("E-mail address not valid");
}

/* Let's prepare the message for the e-mail */
$message = "Name: $name\n"
    . "E-mail: $email\n"
    . "Message:\n"
    . $message;

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */ 
header('Location: formredirect.html'); exit();

/* Functions we used */ 
function check_input($data, $problem='') {

$data = trim($data);
$data = stripslashes($data); 
$data = htmlspecialchars($data);

if ($problem && strlen($data) == 0) { 
show_error($problem); 
} 
return $data; }

function show_error($myError) { ?>

<html> 
<body> 
<p>Please correct the following error:</p> <strong><?php echo $myError; ?></strong>

<p>Hit the back button and try again</p>

</body> 
</html> 
<?php exit(); } ?>