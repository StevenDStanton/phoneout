<?php
    header('Content-type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
 
    echo '<Response>';
 

    $caller_number = (int) $_REQUEST['Digits'];

 
	$number_expanded = implode('-', str_split($caller_number));
	$number_array = explode("-", $number_expanded);
	$number_array_length = count($number_array);

	if($number_array_length > 10){
		echo "<Say>the number is more than 10 digits. Please enter only your 10 digit phone number area code first.</Say>";
		 echo "<Redirect>incoming_call.xml</Redirect>";
	}
	elseif($number_array_length < 10){
		echo "<Say>the number is less than 10 digits. Please enter only your 10 digit phone number area code first.</Say>";
		echo "<Redirect>incoming_call.xml</Redirect>";
	}
	else{

		$to = "steven.stanton@gmail.com";
		$subject = "1$caller_number";
		$body = "IVR cancelation";
		if (mail($to, $subject, $body)) {
			echo "<Say>the number</Say>";
			foreach($number_array as $number){
				echo "<Say>$number</Say>";
				}
			echo "<Say>has been unsubscribed.</Say>";
			}	 
		else {
			echo "<Say>failed please call.</Say>";
			}
	}
 
 
	
	
 
    echo '</Response>';

?>