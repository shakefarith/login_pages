<?php 

function jsonData($email,$password,$phone,$LastName,$FirstName,$dob,$age){
    
$jsonData= array('FirstName'=> $FirstName,'LastName'=> $LastName,
				'email'=> $email, 'password'=>md5($password), 'phone'=>$phone,
				'age'=>$age,'dob'=>$dob);
	$file = "../jsonOut/user.json";
    
        if(file_exists($file)){
            $existingData =	file_get_contents($file);
            $jsonArray = json_decode($existingData, true); 
            $jsonArray[]=$jsonData;
            file_put_contents($file,json_encode($jsonArray));
        }
        if(!file_exists($file)){	
            $jsonArray[]=$jsonData;
            file_put_contents($file,json_encode($jsonArray));
        }
   
   
}
?>