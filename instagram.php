<?php
class InstaMy{

//this function collects the user information that is the user ID and decodes the JSON
    function userID(){
    	$username = strtolower($this->username); // sanitization
	    $token = $this->access_token;
	    $url = "https://api.instagram.com/v1/users/search?q=".$username."&access_token=".$token;
	    $get = file_get_contents($url);
	    $json = json_decode($get);
            

	    foreach($json->data as $user){
	        if($user->username == $username){
	            return $user->id;
	        }
	    }

	    return '00000000'; // return this if nothing is found
    }
//this funtion decodes the user media from the json, that is likes ,comments, image, location 
    function userMedia(){
    	$url = 'https://api.instagram.com/v1/users/'.$this->userID().'/media/recent/?access_token='.$this->access_token;

    	$content = file_get_contents($url);
		  return $json = json_decode($content, true);
    }

}
$insta = new InstaMy();
        $insta->username = $username;
        $insta->access_token = $access_token;
        
        
?>
