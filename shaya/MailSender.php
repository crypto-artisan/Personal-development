<?php
require('PHPMailer/PHPMailerAutoload.php');
if($_REQUEST["Name"]==""||$_REQUEST["Email"]=="")
{
echo "Fill All Fields..";
header("Location: contactus.html");
die();
}
else
{

$mail = new PHPMailer();
$Name = $_REQUEST["Name"];
$Email = $_REQUEST["Email"];
$WebSite = $_REQUEST["WebSite"];
$Coments = $_REQUEST["Coments"];

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "mail.shaya-solutions.com";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "support@shaya-solutions.com";  // SMTP username
$mail->Password = "***"; // SMTP password

$mail->From = "support@shaya-solutions.com";
$mail->FromName = "support@shaya-solutions.com";
$mail->AddAddress("support@shaya-solutions.com", "support@shaya-solutions.com");
if ($_REQUEST["SendCopy"]==1){$mail->AddAddress($Email, $Name);}
$mail->WordWrap = 50;                                 // set word wrap to 50 characters
$mail->IsHTML(true);                                  // set email format to HTML

$Body = "Name:" . $Name;
$Body .= "<br>Email:" . $Email;
if ($WebSite != "") {$Body .= "<br>WebSite:" . $WebSite;}
if ($Coments != "") {$Body .= "<br>Coments:" . $Coments;}

$mail->Subject = "Contact Form";
$mail->Body    = $Body;
$mail->AltBody = $Body;

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}
header("Location: Thankyou.html");
die();
//echo "Message has been sent";
}

?>