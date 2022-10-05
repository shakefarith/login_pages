<?php

session_start();
$con = mysqli_connect('localhost','root','rootadmin','guvi');
mysqli_select_db($con, 'guvi');
$name = $_POST['user'];
$pass = $_POST['password'];
$s = "select * from users where email = '$name' && password = '$pass'";
$result = mysqli_query($con,$s);
$num = mysqli_num_rows($result);
jsonInsertData($email,$pass);
header("Location: login.html");
    
jsonloginvalidation($email,$pass);
header("Location: login.html");

include("inset_json.php");
$response =[];
$response["success"] =false;
$ret = specialCharcheck($db);
$email = $ret['email'];
$password = md5($ret['password']);
if($email == ""){
	$response["msg"] ="Enter valid Email address";
}
if($password == ""){
	$response["msg"]="Invalid Password";
}
if(!isset($response['msg'])){
	$query = "SELECT * FROM sampletable WHERE Email=? and Password=?;";
	$stmt = $db->prepare($query);
	if($stmt){
		if($stmt->bind_param('ss',$email,$password)){
			if($stmt->execute()){
				$smt = $stmt->get_result();
				if($smt->num_rows > 0){
					$results = $smt -> fetch_array(MYSQLI_ASSOC);
					$respData=[];
                    $respData["Email"]=$results['Email']; 
					$respData["pass"]=$results['pass'];
				
				
					include('redis.php');
					$redis->set("Email",$results['Email']);
					include("session.php");
				}
				else{
					$response["msg"]="Invalid Userid and password";
					echo json_encode($response);
				}
			}
		}
	}
	$smt -> free_result();
	$db -> close();
}
else{
	echo json_encode($response);
}
    ?>

