<?PHP
######################################################
#                                                    #
#             Forms To Go Lite  4.5.4                #
#             http://www.bebosoft.com/               #
#                                                    #
######################################################







error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('track_errors', true);

function DoStripSlashes($fieldValue)  { 
// temporary fix for PHP6 compatibility - magic quotes deprecated in PHP6
 if ( function_exists( 'get_magic_quotes_gpc' ) && get_magic_quotes_gpc() ) { 
  if (is_array($fieldValue) ) { 
   return array_map('DoStripSlashes', $fieldValue); 
  } else { 
   return trim(stripslashes($fieldValue)); 
  } 
 } else { 
  return $fieldValue; 
 } 
}

function FilterCChars($theString) {
 return preg_replace('/[\x00-\x1F]/', '', $theString);
}



if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
 $clientIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
 $clientIP = $_SERVER['REMOTE_ADDR'];
}

$FTGfname = DoStripSlashes( $_POST['fname'] );
$FTGlname = DoStripSlashes( $_POST['lname'] );
$FTGemail = DoStripSlashes( $_POST['email'] );
$FTGcomments = DoStripSlashes( $_POST['comments'] );
$FTGsubmit = DoStripSlashes( $_POST['submit'] );



$validationFailed = false;


# Include message in error page and dump it to the browser

if ($validationFailed === true) {

 $errorPage = '<html><head><meta http-equiv="content-type" content="text/html; charset=utf-8" /><title>Error</title></head><body>Errors found: <!--VALIDATIONERROR--></body></html>';

 $errorPage = str_replace('<!--FIELDVALUE:fname-->', $FTGfname, $errorPage);
 $errorPage = str_replace('<!--FIELDVALUE:lname-->', $FTGlname, $errorPage);
 $errorPage = str_replace('<!--FIELDVALUE:email-->', $FTGemail, $errorPage);
 $errorPage = str_replace('<!--FIELDVALUE:comments-->', $FTGcomments, $errorPage);
 $errorPage = str_replace('<!--FIELDVALUE:submit-->', $FTGsubmit, $errorPage);


 $errorList = @implode("<br />\n", $FTGErrorMessage);
 $errorPage = str_replace('<!--VALIDATIONERROR-->', $errorList, $errorPage);



 echo $errorPage;

}

if ( $validationFailed === false ) {

 # Email to Form Owner
  
 $emailSubject = FilterCChars("Form from Freelance Site");
  
 $emailBody = "first name : $FTGfname\n"
  . "last name : $FTGlname\n"
  . "email : $FTGemail\n"
  . "comments : $FTGcomments\n"
  . "submit : $FTGsubmit\n"
  . "";
  $emailTo = 'Webmaster <ali.cand@yahoo.com>';
   
  $emailFrom = FilterCChars("ali.cand@yahoo.com");
   
  $emailHeader = "From: $emailFrom\n"
   . "MIME-Version: 1.0\n"
   . "Content-type: text/plain; charset=\"UTF-8\"\n"
   . "Content-transfer-encoding: 8bit\n";
   
  mail($emailTo, $emailSubject, $emailBody, $emailHeader);
  
  
# Include message in the success page and dump it to the browser

$successPage = '<html><head><meta http-equiv="content-type" content="text/html; charset=utf-8" /><title>Success</title></head><body>Thank you. Your form has been submitted successfully. It will be reviewed soon.</body></html>';

$successPage = str_replace('<!--FIELDVALUE:fname-->', $FTGfname, $successPage);
$successPage = str_replace('<!--FIELDVALUE:lname-->', $FTGlname, $successPage);
$successPage = str_replace('<!--FIELDVALUE:email-->', $FTGemail, $successPage);
$successPage = str_replace('<!--FIELDVALUE:comments-->', $FTGcomments, $successPage);
$successPage = str_replace('<!--FIELDVALUE:submit-->', $FTGsubmit, $successPage);

echo $successPage;

}

?>