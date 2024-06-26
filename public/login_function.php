<?php
session_start();
include ('./connection.php');

//Functions
function getRandomString($length) {
    return bin2hex(random_bytes($length / 2));
}

function sha512($userpassword, $salt) {
    $hash = hash_hmac('sha512', $userpassword, $salt);
    return array(
        'salt' => $salt,
        'passwordHash' => $hash
    );
}

function saltHashPassword($userPassword) {
    $salt = getRandomString(16);
    $passwordData = sha512($userPassword, $salt);
    return $passwordData;
}


function checkHashPassword($userPassword, $salt) {
    $passwordData = sha512($userPassword, $salt);
    return $passwordData;
}

$email = $_POST['email'];
$password = $_POST['password'];

if(empty($email) || empty($password)){
	header ("Location: ./login_signup.php?error_blank= Please fill up all the blank fields.");
	exit();
}

$sql = "SELECT a.email, a.username, a.password, a.salt, a.date_of_birth, a.date_joined, b.collection_id, b.num_of_titles, b.num_of_entries, COUNT(c.test_id) AS test_count
FROM user_account a
LEFT JOIN user_collection b ON a.email = b.user_email  
LEFT JOIN test c ON b.collection_id = c.collection_id where a.email='$email'
GROUP BY a.email, a.username, a.password, a.salt, a.date_of_birth, a.date_joined, b.collection_id, b.num_of_titles, b.num_of_entries";

$result = $conn->query($sql);

if($result->num_rows > 0 && $result !== FALSE){
	$row = mysqli_fetch_assoc($result);
	if($row['email'] === $email){
	$salt = $row['salt'];
	$encrypted_password = $row['password'];
	$hashed_password = checkHashPassword($password, $salt)['passwordHash'];
	if($hashed_password == $encrypted_password){
		
		$_SESSION['email'] = $row['email'];  
		$_SESSION['username'] = $row['username'];
		$_SESSION['collection_id'] = $row['collection_id'];
		$_SESSION['num_of_titles'] = $row['num_of_titles'];
		$_SESSION['num_of_entries'] = $row['num_of_entries'];
		$_SESSION['test_count'] = $row['test_count'];
		header("Location: ./dashboard.php");
		exit();

	}
	else{
		header ("Location: ./login_signup.php?error= Wrong Credentials Incorrect Password/Email");
		exit();
	}
	}
	else{
		header ("Location: ./login_signup.php?error= Wrong Credentials Incorrect Password/Email");
		exit();
	}
	
}
else{
	header ("Location: ./login_signup.php?error= Wrong Credentials Incorrect Password/Email");
	exit();
}
?>