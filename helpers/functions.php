<?php 


class AllFunctions {
	private $front = 'GMSA-';
	
	public function generate_identity_number($id) {
		$thisYr = date("y");
		$thisYr = substr($thisYr, -2);
		$output = $this->front . $thisYr . '-';
		$output = $output . str_pad($id, 5, "0", STR_PAD_LEFT);
		return $output;
	}
}


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
	return (($statement->rowCount() > 0) ? $row[0] : '');
}

// find contact by id
function find_contact_by_id($id) {
	global $conn;

	$query = "
		SELECT * FROM gmsa_contacts 
		WHERE gmsa_contacts.message_id = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$id]);
	$count_rows = $statement->rowCount();

	$row = $statement->fetchAll();
	return (($statement->rowCount() > 0) ? $row[0] : '');
}

// find subscriber by id
function find_subscriber_by_id($id) {
	global $conn;

	$query = "
		SELECT * FROM gmsa_subscribers 
		WHERE gmsa_subscribers.subscriber_id = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$id]);
	$count_rows = $statement->rowCount();

	$row = $statement->fetchAll();
	return (($statement->rowCount() > 0) ? $row[0] : '');
}


// find activity by id
function find_activity_by_id($id) {
	global $conn;

	$query = "
		SELECT * FROM gmsa_activities 
		WHERE gmsa_activities.activity_id = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$id]);
	$count_rows = $statement->rowCount();

	$row = $statement->fetchAll();
	return (($statement->rowCount() > 0) ? $row[0] : '');
}


// find member by student id
function find_member_by_studentID($conn, $studentid) {

	$query = "
		SELECT * FROM gmsa_members 
		WHERE gmsa_members.member_studentid = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$studentid]);
	$count_rows = $statement->rowCount();

	$row = $statement->fetchAll();
	return (($statement->rowCount() > 0) ? $row[0] : '');
}

//
function get_amount_to_pay_using_level($conn, $studentid, $level) {
	global $site_row;

	// $query = "
	// 	SELECT *, SUM(transaction_amount) AS amt FROM gmsa_dues 
	// 	INNER JOIN gmsa_members 
	// 	WHERE gmsa_members.member_studentid = gmsa_dues.student_id
	// 	WHERE gmsa_dues.student_id = ? 
	// 	ORDER BY gmsa_dues.id DESC 
	// 	LIMIT 1
	// ";
	$query = "
		SELECT *, SUM(transaction_amount) AS amt FROM gmsa_dues 
		WHERE gmsa_dues.student_id = ? 
		ORDER BY gmsa_dues.id DESC 
		LIMIT 1
	";
	$statement = $conn->prepare($query);
	$statement->execute([$studentid]);
	$count_rows = $statement->rowCount();
	$row = $statement->fetchAll();

	$levelAmount = 0;
	if ($count_rows > 0) {
		// code...
		if ($row[0]['level'] == 100 && $row[0]['amt'] >= $site_row['dues_for_fresher']) {
			$levelAmount = $site_row['dues_for_continue'];
		} else {
			$levelAmount = $site_row['dues_for_fresher'] - $row[0]['amt'];
		}

		if ($row[0]['level'] == 200 && $row[0]['amt'] >= $site_row['dues_for_continue']) {
			$levelAmount = $site_row['dues_for_continue'];
		} else {
			$levelAmount = $site_row['dues_for_continue'] - $row[0]['amt'];
		}

		if ($row[0]['level'] == 300 && $row[0]['amt'] >= $site_row['dues_for_continue']) {
			$levelAmount = $site_row['dues_for_continue'];
		} else {
			$levelAmount = $site_row['dues_for_continue'] - $row[0]['amt'];
		}

		if ($row[0]['level'] == 400 && $row[0]['amt'] >= $site_row['dues_for_continue']) {
			$levelAmount = $site_row['dues_for_continue'];
		} else {
			$levelAmount = $site_row['dues_for_continue'] - $row[0]['amt'];
		}
	} else {
		if ($level == 100) {
            // code...
            $levelAmount = $site_row['dues_for_fresher'];
        } else {
            $levelAmount = $site_row['dues_for_continue'];
        }
	}

	return $levelAmount;
}

// count members by status
function count_members($conn, $status) {

	$query = "
		SELECT * FROM gmsa_members 
		WHERE gmsa_members.status = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$status]);
	return $statement->rowCount();
}

// count news by status
function count_news($conn, $status) {
	
	$query = "
		SELECT * FROM gmsa_news 
		WHERE gmsa_news.status = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$status]);
	return $statement->rowCount();
}

// count activities by status
function count_activities($conn, $status) {
	
	$query = "
		SELECT * FROM gmsa_activities 
		WHERE gmsa_activities.status = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$status]);
	return $statement->rowCount();
}

// count activities by status
function total_dues_this_year($conn) {
	$thisYear = date('Y');
	$query = "
		SELECT SUM(transaction_amount) AS amt FROM gmsa_dues 
        WHERE YEAR(createdAt) = ? 
        AND transaction_intent = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute(['paid', $thisYear]);
	$row = $statement->fetchAll();

	return money($row[0]['amt']);
}
