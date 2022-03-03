<?php
include '../environment.php';
include '../config/database.php';
include '../config/ldap.php';
 
if(isset($_POST['login_button'])) {	
	$username = trim($_POST['user_employeeid']);
	$password = trim($_POST['user_password']);
	
	if(ldap_bind($ds, $username.'@'.$domain, $password)) {
		$filter = "(sAMAccountName=" . $username . ")";
		$attr = array("memberof","givenname","initials", "sn", "mail","samaccountname","department", "title", "company");
		$result = ldap_search($ds, $ldapconfig['basedn'], $filter, $attr) or exit("Unable to search LDAP server");
		$entries = ldap_get_entries($ds, $result);
		$givenname = $entries[0]['givenname'][0];
		ldap_unbind($ds);
        
		$_SESSION['system_username'] = $entries[0]['samaccountname'][0];
		$_SESSION['system_userfirstname'] = $entries[0]['givenname'][0];
		$_SESSION['system_usermiddlename'] = $entries[0]['initials'][0];
		$_SESSION['system_userlastname'] = $entries[0]['sn'][0];
		$_SESSION['system_company'] = $entries[0]['company'][0];
		$_SESSION['system_title'] = $entries[0]['title'][0];
		$_SESSION['system_department'] = $entries[0]['department'][0];
		$_SESSION['system_logged_in'] = true;	
		$_SESSION['timestamp']=time(); //use this timestamp to check if the user was inactive for too long

		$response = "Authenticated";
	} else {
		$response = 999; 
	}
	echo json_encode($response);	
} else{
 
}

//Your logout code write here
if(isset($_POST['logout'])) {
	session_destroy();
	$_SESSION['system_logged_in'] = false;
	echo "string";
}

//New user
if (isset($_POST['newuser_button'])) {
	//Creating Username
	$fiveRandomDigit = mt_rand(10000,99999);
	$uname=date('Y').'-'.$fiveRandomDigit; 
	//End of creating username

	//Password Hasing
	$password=$_POST["user_password"];
	$blowfish_pre='$2a$05$';
	$blowfish_end='$';

	$allowed_chars='ABSCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
	$char_len=63;

	$salt_len=21;
	$salt='';

	for ($i=0; $i<$salt_len ; $i++) { 
		$salt.=$allowed_chars[mt_rand(0,$char_len)];
	}

	$bcrypt_salt=$blowfish_pre.$salt.$blowfish_end;
	$hash_password=crypt($password,$bcrypt_salt);
	//End of password hashing

	$username = $uname;
	$usersalt = $salt;
    $userpass = $hash_password;
	$userfirstname = $_POST["user_firstname"];
    $usermiddlename = $_POST["user_middlename"];
    $userlastname = $_POST["user_lastname"];
    $useremail = $_POST["user_email"];
    $userstatus = "enable";

	$query="INSERT INTO users(
			username,
			usersalt,
            userpass,
			userfirstname,
            usermiddlename,
            userlastname,
            useremail,
            userstatus
			) 
			VALUES (
			'$username',
			'$usersalt',
            '$userpass',
			'$userfirstname',
            '$usermiddlename',
            '$userlastname',
            '$useremail',
            '$userstatus'
			)"; 
		$response = array();
	if (!$result = mysqli_query($db,$query)) {
        //exit(mysqli_error());
        $response=999;
    } else {
		//Reading your data inserted
		$last_id = mysqli_insert_id($db);
		$query = "SELECT * FROM users
			WHERE userid = '$last_id'";
		if (!$result = mysqli_query($db,$query)) {
			exit(mysql_error());
		}
		$response = array();
		if(mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$response = $row;
			}
		}
		else
		{
			$response['status'] = 200;
			$response['message'] = "Data not found!";
		}		
		//End reading your data inserted

		//Sending Email

		//End of sending email

    	$response['insert_status'] = 204;
		$response['insert_message'] = "Data Inserted!";
    }
    echo json_encode($response);	
}

?>