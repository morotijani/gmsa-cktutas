<?php 


// find student by student id
function find_by_student_id($student_id) {
	global $conn;

	$query = "
		SELECT * FROM gmsa_members 
		WHERE gmsa_members.member_studentid = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$student_id]);
	$count_rows = $statement->rowCount();

	return $statement->fetchAll();
}


// find student by email
function find_by_student_email($email) {
	global $conn;

	$query = "
		SELECT * FROM gmsa_members 
		WHERE gmsa_members.member_email = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$email]);
	$count_rows = $statement->rowCount();

	return $statement->fetchAll();
}


// find prayer by id
function find_prayer_by_id($id) {
	global $conn;

	$query = "
		SELECT * FROM gmsa_prayer_time 
		WHERE gmsa_prayer_time.prayer_id = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$id]);
	$count_rows = $statement->rowCount();

	$row = $statement->fetchAll();
	return $row[0];
}
