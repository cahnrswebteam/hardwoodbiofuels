<?php
$resp = "";
$formtype = $_POST['formtype'];
$email = strip_tags(trim($_POST['addr']));
$submit = $_POST["submit"];

/*
&describes=Agricultural+landowner
&interests=New+business+opportunities
&newsletter=Yes
&interests=
&name=
&address1=
&address2=
&address3=
&city=
&state=
&zip=
&email=
&phone=
&organization=
&title=
&comments=
*/

if($formtype == "newsletter"){
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$title = "Mailing List Newsletter Signup";
		$subtitle = "New User Signup for Newsletter";
		$content .= "<p>Please add the following user to the AHB Newsletter mailing list:</p>\n";
		$content .= "<p style=\"style: margin-left: 25px;\"><strong>" . $email . "</strong></p>\n";
		$content .= "<br /><br />\n";
		
		include("email_templ.php");
		
		$subject_line = "AHB : " . $title;
		$headers = "From: ahb@wsu.edu\r\nErrors-to: ahb@wsu.edu\r\nMime-version: 1.0\r\nContent-Type: text/html; charset=\"ISO-8859-1\"\r\n";
		$send_email = "nora.haider@wsu.edu";
		//$send_email = "danial.bleile@wsu.edu";
		//$send_email = "heinsius@uw.edu";
		if(mail($send_email, $subject_line, $email_template, $headers)){
			$resp .= "<p>Thank You! You'll soon be receiving our newsletter. If we have any questions before starting your subscription, we will be in contact.</p>";
			}
		else{
			$resp .= "<p>We are unable to process this request at this time (email server is unresponsive). Please try again later.</p>";
			}
		}
	else{
		$resp .= "<p>Sorry, this does not appear to be a valid email. Please try again.</p>";
		}
	}

// RETURNING PROOF ON QUESTIONNAIRE FORM
elseif($formtype == "questionnaire"){
	$proof = array();
	foreach($_POST as $k =>$v){
		if($k != "formtype"){ 
			if(($k == "interests") or ($k == "receiveinfo")){
				$v = implode(", ",$v);
				}
			$proof[$k] = preg_replace("/\r\n?/", "<br>", trim($v)); 
			}
		}
	foreach($proof as $formItem => $display){
		$resp .= "::" . $formItem . "|" . $display;
		}
	$resp = "PROOF|TRUE" . $resp;
	}

// FINISHING THE QUESTIONNAIRE FORM	
elseif($formtype == "questionnaire_submit"){
	// FOR OUTPUT OF TABLE TO MAKE READABLE
	$wording = array(	"describes" => "What best describes you?",
						"interests" => "What interests you?",
						"newsletter" => "Like to receive newsletter?",
						"receiveinfo" => "How do you prefer information?",
						"name" => "Your Name",
						"address1" => "Address 1",
						"address2" => "Address 2",
						"address3" => "Address 3",
						"city" => "City",
						"state" => "State",
						"zip" => "Zip Code",
						"email" => "Email",
						"phone" => "Phone",
						"organization" => "Your Organization",
						"title" => "Your Title",
						"comments" => "Comments");
	$proof = array();
	foreach($_POST as $k =>$v){
		if($k != "formtype"){ 
			if(($k == "interests") or ($k == "receiveinfo")){
				$v = implode(", ",$v);
				}
			$proof[$k] = preg_replace("/\r\n?/", "<br>", trim($v));
			}
		}
	$title = "Questionnaire - Get Involved with AHB";
	$subtitle = "New Questionnaire Submission";
	$content .= "<p>The following questionnaire response was submitted via the AHB website on<br />" . date("F j, Y, g:i a") . "\n";
	$content .= "<table border='1' cellpadding='4' cellspacing='0'>\n";
	foreach($proof as $emailK => $emailV){
		if($emailK != "formtype") { $content .= "<tr><td>" . $wording[$emailK] . "</td><td>" .  $emailV . "</td></tr>\n";}
		}
	$content .= "</table>";
	
	include("email_templ.php");
		
	$subject_line = "AHB : " . $title;
	$headers = "From: ahb@wsu.edu\r\nErrors-to: ahb@wsu.edu\r\nMime-version: 1.0\r\nContent-Type: text/html; charset=\"ISO-8859-1\"\r\n";
	//$send_email = "danial.bleile@wsu.edu";
	$send_email = "patricia.townsend@wsu.edu";
	//$send_email = "heinsius@uw.edu";
	if(mail($send_email, $subject_line, $email_template, $headers)){
		$resp .= "<p>Thank You for taking the time to answer our questionnaire. If we have any questions regarding your submitted information, we will be in contact.</p>";
		$resp = "FINISHED|TRUE" . "::" . "ALERT|" . $resp;
		}
	else{
		$resp .= "<p>We are unable to process this request at this time (email server is unresponsive). Please try again.</p>";
		$resp = "FINISHED|ERROR" . "::" . "ALERT|" . $resp;
		}
	}
echo $resp;
?>