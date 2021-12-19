<?php include 'config.php';
$siteurl = get_option('siteurl');

function get_option($option_name)
{
	global $db_con;
	$sql = "SELECT option_value FROM options WHERE option_name='$option_name'";
	$query = $db_con->query($sql);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$res = $query->fetch();

	return $res['option_value'];
}


function showdetails($email)
{
	global $db_con;
	$sql = "SELECT * FROM `users` WHERE `email`='$email'";
	$query = $db_con->query($sql);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$res = $query->fetch();

	return $res;
}


function checkpassword($email, $currentpass, $newpass)
{
	global $db_con;
	$sql = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$currentpass'";
	$query = $db_con->query($sql);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$res = $query->fetch();
	//var_dump($res);
	if ($res['password'] == $currentpass) {
		$statement = $db_con->prepare("UPDATE `users` SET `password` = '$newpass' WHERE `users`.`email` = '$email';");
		$statement->execute();
		return true;
	} else {
		return false;
	}
}



function edituser($id)
{
	global $db_con;
	if ($res['id'] == $id) {
		$sql = "UPDATE `users` SET `firstname` = '', `lastname` = '', `email` = '', `mobile` = '', `username` = '', `password` = '', `type` = '', `created_on` = '' WHERE `users`.`id` = 4";
		$query = $db_con->query($sql);
		if ($query == true) {
			return true;
		}
		else return false;
	}	
	
}


function deleteuser($id)
{
	global $db_con;
	$sql = "DELETE FROM `users` WHERE `users`.`id` = 9";
	$query = $db_con->query($sql);
}



?>