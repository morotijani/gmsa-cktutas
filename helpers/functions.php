<?php 


function find_by_student_id($student_id) {
	global $conn;

	$query = "
		SELECT * FROM gmsa_members 
		WHERE gmsa_members.member_studentid = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$student_id]);

	if ($statement->rowCount() > 0) {
		// code...
		return false;
	} else {
		return $statement->fetchAll();
	}
}


function find_by_student_email($email) {
	global $conn;

	$query = "
		SELECT * FROM gmsa_members 
		WHERE gmsa_members.member_email = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$email]);

	if ($statement->rowCount() > 0) {
		// code...
		return false;
	} else {
		return $statement->fetchAll();
	}
}