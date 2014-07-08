<?php 
        // create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, "http://api.dribbble.com/players/".$username); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // Output Json string and decode to php Array
        $json = curl_exec($ch); 
        $dribbble = json_decode($json, true);

        // close curl resource to free up system resources 
        curl_close($ch);      
        
        //echo "<pre>";
        // print_r($dribbble);
        // echo "</pre>";
?>
