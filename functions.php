<?php

// Display arrays() in a readable way
function printr($var, $bPrint=true){
	ob_start();
	if(is_array($var)){ echo '<pre>'; print_r($var); echo '</pre>';
	}else echo $var;
	$sMessage = ob_get_contents();
	ob_end_clean();
	if($bPrint == true) echo $sMessage;
	return ($bPrint == true) ? true : $sMessage;
}

// Timer Functions for debuging execution times
// Usage: $var = TimerStart(); // Starts the Timer and saves the time
// Usage: echo TimerStop($var); // Calculates 'now - StartTime'
function TimerStart(){ list($usec, $sec) = explode(" ", microtime()); return ((float)$usec + (float)$sec); }
function TimerStop ($iTimeStart){
	if(empty($iTimeStart) || is_string($iTimeStart)) return false;
	list($usec, $sec) = explode(" ", microtime());
	return ((float)$usec + (float)$sec) - $iTimeStart;
}

// String 2 Array
function string2array($string)
{
    $return = array();
    $string = (string) $string;
    $length = strlen($string);

    for ($i = 0; $i < $length; $i++) {
        $return[] = $string[$i];
    }

    return $return;
}


/*
   * @return string
   * @param string $url
   * @desc Return string content from a remote file
   * @author Luiz Miguel Axcar (lmaxcar@yahoo.com.br)
*/
function get_content($url){
	$ch = curl_init();
	
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_HEADER, 0);
	
	ob_start();
	
	curl_exec ($ch);
	curl_close ($ch);
	$string = ob_get_contents();
	
	ob_end_clean();
	
	return $string;
}

?>